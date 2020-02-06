<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function getUsers(){
        $users=User::all();
        return response()->json($users);
    }

    public function getUserById($id){
        $user=User::find($id);
        return response()->json($user);
    }

    public function insertUser(Request $request){
        $user=new User();
        $user->FirstName=$request->FirstName;
        $user->LastName=$request->LastName;
        $user->EmailId=$request->EmailId;
        $user->MobileNo=$request->MobileNo;
        $user->Address=$request->Address;
        $user->PinCode=$request->PinCode;

        if($user->save()){
            return response()->json(["message"=>"Success"]);
        }
        else{
            return response()->json(["message"=>"error"]);
        }
    }


    public function updateUser(Request $request){
        $user=User::where('id',$request->id)->update([
            'FirstName'=>$request->FirstName,
            'LastName'=>$request->LastName,
            'EmailId'=>$request->EmailId,
            'MobileNo'=>$request->MobileNo,
            'Address'=>$request->Address,
            'PinCode'=>$request->PinCode,

        ]);

        if($user){
            return response()->json(["message"=>"Success"]);
        }
        else{
            return response()->json(["message"=>"failed"]);
        }
    }

    public function deleteUser($id){
        if(User::find($id)->delete()){
            return response()->json(["message"=>"Success"]);
        }
        else{
            return response()->json(["message"=>"failed"]);
        }
    }
}
