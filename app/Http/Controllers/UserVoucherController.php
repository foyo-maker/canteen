<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\User_Voucher;
use Illuminate\Http\Request;

class UserVoucherController extends Controller
{

    public function index()
    {
        return User_Voucher::all();
    }
    public function store(Request $request)
    {

        //validation
        $request->validate([
            'user_email' => 'required',
            'voucher_id' => 'required',

        ]);


        return User_Voucher::create([
            'user_email' => $request->user_email,
            'voucher_id' => $request->voucher_id,
            'current_used' => 'N'       
         ]);
    }

    public function update(Request $request, $id)
    {
        $voucher = User_Voucher::find($id);
        $voucher->update($request->all());
        return $voucher;
    }

    public function show($id)
    {
        return User_Voucher::find($id);
    }
    public function destroy($id)
    {
        return User_Voucher::destroy($id);
    }



    
}
