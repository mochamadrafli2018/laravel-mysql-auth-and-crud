<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    /**
    * Retrieve all user data from database.
    */
    public function getAllUser()
    {
        // assign users_db to variable users_data
        $users_data = User::all();
        return response()->json([
            'message' => 'success',
            'data' => $users_data
        ], 200);
    }
    /**
    * Get user data by id.
    * @param  \Illuminate\Http\Request  $request, $id
    */
    public function findById(request $request, $id)
    {
        // assign users_db to variable users_data
        $user_data = User::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $user_data
        ], 200);
    }
    /**
    * Edit user data.
    *
    * @param  \Illuminate\Http\Request  $request, $id
    * @return \Illuminate\Http\Response
    */
    public function editUserData(request $request, $id)
    {
        $user_data = User::find($id);
        // update user data
        $user_data->name = $request->name;
        $user_data->email = $request->email;
        $user_data->password = $request->password;
        $user_data->gender = $request->gender;
        $user_data->gender = $request->gender;
        // save updated user data
        $user_data->save();   
        // if create new user success
        if ($user_data) {
            return response()->json([
                'success' => true,
                'user' => $user_data
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Fail to save update user data',
        ], 500);
    }

    public function deleteUserDataById($id)
    {
        $post=user_db::find($id);
        // delete
        $post->delete();
        return "Data berhasil di hapus";
    }

}
