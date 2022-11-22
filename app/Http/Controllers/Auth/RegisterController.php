<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Traits\DialCodeTrait;
use App\Traits\GuruListTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Session, Redirect;

class RegisterController extends Controller
{
    use DialCodeTrait, GuruListTrait;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $dialCodes = $this->dialCodes();
        $guruLists = $this->guruList();

        return view('auth.register', compact('dialCodes', 'guruLists'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // return redirect()->back()->with('success', 'You have been successfully registered!. Please wait for the admin approval');
        Session::flash('messageType', 'success');
        Session::flash('message', 'You have been successfully registered!. Please wait for the admin approval.');

        return redirect::route('login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'numeric', 'unique:users'],
            'gender' => ['required', 'string', 'max:10'],
            'birth_date' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:25'],
            'country' => ['required', 'string', 'max:25'],
            'occupation' => ['required', 'string', 'max:100'],
            'guru' => ['required', 'string', 'max:100'],
            'reference_person' => ['required', 'string', 'max:150'],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'avatar.max' => 'The :attribute must not be greater than 5MB'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $filePath = null;
        if (!empty($data['avatar'])) {

            $image = $data['avatar'];
            $fileName = Str::slug($data['first_name'] . '-' . $data['last_name']) . '-' . time();

            $filePath = $fileName . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public', $filePath);
        }

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'dial_code' => $data['dial_code'],
            'mobile_number' => $data['mobile_number'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'occupation' => $data['occupation'],
            'guru' => $data['guru'],
            'reference_person' => $data['reference_person'],
            'avatar' => $filePath,

        ]);

        $user->role()
            ->attach(
                Role::where('slug', 'user')->first()
            );

        return $user;
    }
}
