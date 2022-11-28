<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\DialCodeTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Repositories\UserRepository;

class ProfileController extends Controller
{
    private $userRepository;
    use DialCodeTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->userRepository = new UserRepository;
    }

    /**
     * Display a listing of the resource form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dialCodes = $this->dialCodes();
        $RS_Row = $this->userRepository->getByID(Auth::user()->id);

        return view('auth.profile', compact('dialCodes', 'RS_Row'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function profileUpdate(Request $request)
    {
        $validated = $request->validate([
            // 'first_name' => ['required', 'string', 'max:255'],
            // 'last_name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255'],
            // 'mobile_number' => ['required', 'numeric'],
            // 'dial_code' => ['required', 'string', 'max:5'],
            'gender' => ['required', 'string', 'max:10'],
            'birth_date' => ['required', 'string', 'max:5'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:25'],
            'country' => ['required', 'string', 'max:25'],
            'occupation' => ['required', 'string', 'max:100'],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,svg|max:100000',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->gender = $request->gender;
        $user->birth_date = $request->birth_date;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->occupation = $request->occupation;
        $user->profile_update = '1';

        // Check if a profile image has been uploaded
        if ($request->has('avatar')) {

            $destinationPath = storage_path('app/public/');

            if (!empty($user->avatar) && File::exists($destinationPath . $user->avatar)) {
                File::delete($destinationPath . $user->avatar);
            }

            $image = $request->file('avatar');
            $fileName = Str::slug(Auth::user()->first_name . '-' . Auth::user()->last_name) . '-' . time();

            $filePath = $fileName . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public', $filePath);

            // Set user profile image path in database to filePath
            $user->avatar = $filePath;
        }

        $user->save();

        if ($user->id > 0) :
            Session::flash('messageType', 'success');
            Session::flash('message', 'Pofile updated successfully.');

            return redirect::route('profile');
        else :
            Session::flash('messageType', 'error');
            Session::flash('message', 'Can\'t update user.');

            return redirect::back()->withInput();
        endif;
    }
}
