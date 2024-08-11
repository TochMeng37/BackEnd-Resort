<?php

namespace App\Http\Controllers;

use App\Models\payments as ModelsPayments;
use Illuminate\Http\Request;

class payments extends Controller
{
    public function admin(Request $request){
        $data = $request->all();
        if($request->hasFile('QR')){
            $image = $request->file('QR');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPaht = public_path('/Payments');
            $image->move($destinationPaht, $name);
            $data['QRCode'] = $name;
        }
        $Pay = ModelsPayments::create($data);
        return response()->json([
            "data" => $Pay,
            "status" => 201
        ], 201);
    }
}
