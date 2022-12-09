<?php

namespace App\Http\Controllers;

use App\Models\verify_user;
use App\Http\Requests\Storeverify_userRequest;
use App\Http\Requests\Updateverify_userRequest;

class VerifyUserController extends Controller
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
     * @param  \App\Http\Requests\Storeverify_userRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeverify_userRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\verify_user  $verify_user
     * @return \Illuminate\Http\Response
     */
    public function show(verify_user $verify_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\verify_user  $verify_user
     * @return \Illuminate\Http\Response
     */
    public function edit(verify_user $verify_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateverify_userRequest  $request
     * @param  \App\Models\verify_user  $verify_user
     * @return \Illuminate\Http\Response
     */
    public function update(Updateverify_userRequest $request, verify_user $verify_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\verify_user  $verify_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(verify_user $verify_user)
    {
        //
    }
}
