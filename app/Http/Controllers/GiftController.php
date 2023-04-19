<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    
    public function index()
    {
        return Gift::all();
    }

    public function update(Request $request, $id)
    {
        $gift = Gift::find($id);
        $gift->update($request->all());
        return $gift;
    }
    public function show($id)
    {
        return Gift::find($id);
    }


}
