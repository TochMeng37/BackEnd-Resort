<?php

namespace App\Http\Controllers;

use App\Models\RoomModel;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class RoomController extends Controller
{
    public function RoomRegisted(Request $request){
        $data = $request->all();
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPaht = public_path('/RoomPost');
            $image->move($destinationPaht, $name);
            $data['image'] = $name;
        }
        $RoomPost = RoomModel::create($data);
        return response()->json([
            'status' => 200,
            'data' => $RoomPost
        ]);

    }
    public function getAllRooms(){
        $data = RoomModel::all();
        if($data->isEmpty()){
            return response()->json([
               'status' => 404,
               'message' => 'No rooms found'
            ]);
        }
        return response()->json([
           'status' => 200,
            'data' => $data
        ]);
    }
    public function getRoomById($id) {
        $data = RoomModel::find($id);
        if ($data) {
            return response($data);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Room not found'
            ]);
        }
    }

}
