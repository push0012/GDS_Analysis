<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\UserRole;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(ProfileRequest $request)
    {
        DB::beginTransaction();

        try {
        $request->request->add([

            'password' => Hash::make($request['new_password'])

        ]);
        $result = auth()->user()->create($request->all());
        //return $result;

        $userArr = [
            'role_id' => $request['role_id'],
            'user_id' => $result->id,
        ];

        UserRole::create($userArr);
        DB::commit();
        return back()->withStatus(__('Profile successfully Inserted.'));
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
            return back()->withStatus(__('Profile Insertion Unsuccessfull.'));
        }
        
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }
}
