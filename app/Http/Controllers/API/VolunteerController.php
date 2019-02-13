<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Volunteer;

class VolunteerController extends Controller
{
    public function volunteer(){}


    public function storeVolunteer()
    {
        $user = auth('api')->user();
        $validated = $this->validate(request(), [
            'phone' => 'required',
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
}
