<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $data = PostModel::all();
        return response()->json([
            "data" => $data,
            "status" => 200
        ]);
    }
    public function getRoom($id){
        $data = PostModel::find($id);
        if($data){
            return response()->json([
                "data" => $data,
                "status" => 200
            ]);
        }
        return response()->json([
            "message" => "Room not found",
            "status" => 404
        ], 404);
    }
    public function PostRoom(Request $request){
        $data = $request->all();
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPaht = public_path('/RoomBooking');
            $image->move($destinationPaht, $name);
            $data['image'] = $name;
        }
        $PostData = PostModel::create($data);
        return response()->json([
            "data" => $PostData,
            "status" => 201
        ], 201);
    }
}
