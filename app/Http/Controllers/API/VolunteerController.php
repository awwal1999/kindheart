<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Volunteer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class VolunteerController extends Controller
{
    public function volunteer(){}


    public function storeVolunteer()
    {
        $user = auth('api')->user();
        $validated = $this->validate(request(), [
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'profession' => 'required',
            'volunteerArea' => 'required',
            'whyVolunteer' => 'required',
            'goal' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'heard' => 'required',
            'enjoyedMost' => 'required',
            'enjoyedLeast' => 'required',
            'language' => 'required',
            'channel' => 'required',
        ]);

        $validated['user_id'] = $user->id;

        $validated['id'] = Volunteer::where('user_id', '=', $user->id)->first();
        $volunteerExist = $validated['id'];

        if ($volunteerExist) {
            $volunteerExist->update($validated);
            return 'updated';
        }
        Volunteer::create($validated);
        return ['success' => 'Volunteer created'];
    }

    public function registerVolunteer() {
        // return request()->json('volunteer.name');
        $this->validate(request(), [
            'volunteer.name' => 'required|string|min:3',
            'volunteer.phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:potential_patients,phone',
            'volunteer.email' => 'email|unique:users,email',            
            'volunteer.password' => 'required|string|min:6',            
            'volunteer.c_password' => 'required|same:volunteer.password',            
        ]);
        $user = User::create([
            "name" => request()->json('volunteer.name'),
            "email" => request()->json('volunteer.email'),
            "type" => 'volunteer',
            // "phone" => request()->json('volunteer.phone'),
            "password" => Hash::make( request()->json('volunteer.password')),
        ]);
        return response()->json(['status' => 'Ok', 'success' => 'User Created Successfully', $user], 201);
    }
}
