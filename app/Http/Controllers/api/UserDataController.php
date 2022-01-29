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
        $users_data = User::all();
        return response()->json([
            'success' => 'true',
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
            'success' => 'true',
            'data' => $user_data
        ], 200);
    }
    /**
    * Edit user data by id.
    * @param  \Illuminate\Http\Request  $request, $id
    * @return \Illuminate\Http\Response
    */
    public function editUserById(request $request, $id)
    {
        $user_data = User::find($id);
        // update user data
        $user_data->name = $request->name;
        $user_data->password = $request->password;
        $user_data->gender = $request->gender;
        $user_data->role = $request->role;
        // save updated user data
        $user_data->update();   
        // if create new user success
        if ($user_data) {
            return response()->json([
                'success' => true,
                'user' => $user_data
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Fail to update user',
        ], 500);
    }
    /**
    * Delete user by id.
    * @param  \Illuminate\Http\Request  $request, $id
    * @return \Illuminate\Http\Response
    */
    public function deleteUserById($id)
    {
        $user_data=User::find($id);
        // delete
        $user_data->delete();
        return response()->json([
            'success' => true,
            'message' => 'Success delete user'
        ], 200);
    }

}
