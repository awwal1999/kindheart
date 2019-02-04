<?php

namespace App\Http\Controllers;

use App\Referrer;
use Illuminate\Http\Request;
use App\PotentialPatient;

class ReferralsController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $patient = request()['patient'];
        $referrer = request()['referrer'];
        $patient = PotentialPatient::create($patient);
        $referrer['potential_patients_id'] = $patient->id;
        $referrer = Referrer::create($referrer);
        return redirect()->back();
        return $referrer;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Referrer  $referrer
     * @return \Illuminate\Http\Response
     */
    public function show(Referrer $referrer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Referrer  $referrer
     * @return \Illuminate\Http\Response
     */
    public function edit(Referrer $referrer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Referrer  $referrer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referrer $referrer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Referrer  $referrer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referrer $referrer)
    {
        //
    }
}
