<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    protected function destinationPath()
    {
        return storage_path('app/public/');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'success'   => false,
            'message'   => 'Something went wrong, try after sometime',
            'data' => null,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $RS_Row = Auth::guard('api')->user()->load(['role', 'modules']);
        $RS_Row->avatar = !empty($RS_Row->avatar) && File::exists($this->destinationPath() . $RS_Row->avatar) ? config('app.url') . Storage::url('app/public/' . $RS_Row->avatar) : null;

        return response()->json([
            'success'   => true,
            'message'   => 'Get profile data successfully',
            'data' => $RS_Row,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $RS_Row = Auth::guard('api')->user();

        if (!empty($RS_Row->accessTokens)) {
            $RS_Row->accessTokens()->delete();
        }

        Auth::user()->delete($RS_Row->id);

        return response()->json([
            'success'   => true,
            'message'   => 'Account delete successfully',
            'data' => null,
        ]);
    }
}
