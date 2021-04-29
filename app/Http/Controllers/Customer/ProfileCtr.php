<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Auth, Helper, Redirect, Input, BrgyAPI;

class ProfileCtr extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('customer.profile', [
                'verification' => $this->identityVerification(),
                'is_verified' => $this->isAccountVerified()
                ]);
        }
        else{
            return Redirect::to('/customer/customer-login'); 
        }

    }

    public function getBrgyList($municipity)
    {
        return BrgyAPI::getBrgyList($municipity);
    }

    public function getUserBrgy()
    {
        return Helper::getShippingInfo()->brgy;
    }

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
                    'nearest_landmark' => $data['nearest_landmark'],
                    'flr_bldg_blk' => $data['flr_bldg_blk']
                ]);
        }else{
            DB::table('tblshipping_address')
                ->insert([
                    'user_id' => Auth::id(),
                    'municipality' => $data['municipality'],
                    'brgy' => $data['brgy'],
                    'nearest_landmark' => $data['nearest_landmark'],
                    'flr_bldg_blk' => $data['flr_bldg_blk']
                ]);
        }

        Redirect::to('/profile')->with('success', 'Your information was updated succesfully.')->send();
    }

    public function isShippingInfoExists()
    {
        $row=DB::table('tblshipping_address')
                ->where('user_id', Auth::id())->get();

        return $row->count() > 0 ? true : false;
    }

    public function identityVerification()
    {
        return DB::table('tbl_identity_verification')->where('user_id', Auth::id())->get();
    }

    public function isAccountVerified()
    {
        return DB::table('tblcustomer')->where('id', Auth::id())->value('is_verified');
    }

    public function uploadID()
    {
        $data = Input::all();

        DB::table('tblcustomer')
            ->where('id', Auth::id())
            ->update([
                'is_verified' => 2
            ]);

            DB::table('tbl_identity_verification')
            ->insert([
                'user_id' => Auth::id(),
                'id_type' => $data['id_type'],
                'id_number' => $data['id_number']
            ]);

        if(request()->hasFile('image')){
            request()->validate([
                'image' => 'file|image|max:3000',
            ]);
        }

        if(request()->hasFile('selfie_with_id')){
            request()->validate([
                'selfie_with_id' => 'file|image|max:3000',
            ]);
        }

        $this->storeImage(Auth::id());

        return redirect('/profile')->with('success', 'You have successfully uploaded your ID');
    }

    public function storeImage($user_id)
    {
        if(request()->has('image') && request()->has('selfie_with_id'))
        {
            DB::table('tbl_identity_verification')
            ->where('user_id', $user_id)
            ->update([
                'image' => request()->image->store('customer-id-uploads', 'public'),
                'selfie_with_id' => request()->selfie_with_id->store('customer-id-uploads', 'public'),
            ]);
        }
    }
}
