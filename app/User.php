<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'tblcustomer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function updateInsert()
    {
        $data = Input::all();

        DB::table('tblcustomer')
                ->where('id', Auth::id())
                ->update([
                    'fullname' => $data['fullname'],
                    'email' => $data['email'],
                    'phone_no' => $data['phone_no']
                ]);

        if($this->isShippingInfoExists())
        {
            DB::table('tblshipping_address')
                ->where('user_id', Auth::id())
                ->update([
                    'municipality' => $data['municipality'],
                    'brgy' => $data['brgy'],
                    'nearest_landmark' => $data['nearest_landmark']
                ]);
        }else{
            DB::table('tblshipping_address')
                ->insert([
                    'user_id' => Auth::id(),
                    'municipality' => $data['municipality'],
                    'brgy' => $data['brgy'],
                    'nearest_landmark' => $data['nearest_landmark']
                ]);
        }

        Redirect::to('/profile')->with('success', 'Your information was updated succesfully.')->send();
    }
}
