<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Display the specified profile resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        // return '123';
        return auth('api')->user();
    }

    /**
     * Display the specified profile resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile()
    {
        $user = auth('api')->user();
        $currentPhoto = $user->photo;
        $this->validate(request(), [
            'name' => 'required|string|min:3',
            'email' => 'required|string|email|min:3|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|min:6',
            'sex' => 'required',
            'age' => 'required',
        ]);

        if (request()->photo && request()->photo != $currentPhoto) {
            $fileName = time() . '.' . explode('/', explode(':', substr(request()->photo, 0, strpos(request()->photo, ';')))[1])[1];
            \Image::make(request()->photo)->save(public_path('img/profiles/') . $fileName);
            request()->merge(['photo' => $fileName]);

            $photoPath = public_path('img/profiles/') . $currentPhoto;
            if ( file_exists($photoPath) ) {
                @unlink($photoPath);
            }
        }

        if (!empty(request()->password)) {
            request()->merge(['password' => Hash::make(request()->password)]);
        }

        $user->update(request()->all());
        return ['message' => 'user updated'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
