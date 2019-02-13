<?php

namespace App\Http\Controllers\API;

use App\Occupation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cancer;

class PatientController extends Controller
{
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

    public function storeWork()
    {
        $user = auth('api')->user();
        $validated = $this->validate(request(), [
            'occupation' => 'required',
            'place_of_employment' => 'required',
            'position' => 'required',
            'address' => 'required',
        ]);
        $validated['user_id'] = $user->id;
        $validated['id'] = Occupation::where('user_id', '=', $user->id)->first();
        $workExist = $validated['id'];
        if ($workExist) {
            $workExist->update($validated);
            return 'updated';
        }
        Occupation::create($validated);
        return ['success' => 'work created'];

    }

    public function work()
    {
        $user = auth('api')->user();
        return Occupation::find($user->id);
    }
    
    public function storeCancer()
    {
        $user = auth('api')->user();
        $validated = $this->validate(request(), [
            'type' => 'required',
            'stage' => 'required',
            'hospital' => 'required',
            'hconsultant' => 'required',
            'hconsultant_phone' => 'required',
            'liaison_officer' => 'required',
            'liaison_officer_phone' => 'required',
        ]);
        
         $validated['user_id'] = $user->id;
        //  Cancer::firstOrCreate(['user_id' => $user->id], $validated);
        //  return 'success';
        $validated['id'] = Cancer::where('user_id', '=', $user->id)->first();
        $cancerExist = $validated['id'];
        if ($cancerExist) {
            $cancerExist->update($validated);
            return 'updated';
        }
        Cancer::create($validated);
        return ['success' => 'Cancer created'];

    }

    public function cancer()
    {
        $user = auth('api')->user();
        return Cancer::where('user_id', '=', $user->id)->first();
    }
}
