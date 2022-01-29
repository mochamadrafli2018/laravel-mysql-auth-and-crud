<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
   
    public function getAll()
    {
        // assign users_db to variable users_data
        $users_data = user_db::table('users_db')->get();
        return response()->json([
            'message' => 'success',
            'data' => $users_data
        ], 200);
    }

    public function createNewData()
    {
        //validate data
        $validator = Validator::make($request->all(), 
            [
                'topic' => 'required',
                'title' => 'required','title',
                'link' => 'required','link',
            ],
            [
                'nama.required' => 'topic can not empty!',
                'title.required' => 'title can not empty!',
                'link.required' => 'link can not empty!',
            ]
        );

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'All input data must be filled',
                'data'    => $validator->errors()
            ],401);
        }
        else {
            // create new user data
            $post = Post::create([
                'topic'     => $request->input('topic'),
                'title'   => $request->input('title'),
                'link' => $request->input('link'),
            ]);
            // if create new user success
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'New user data have been saved',
                ], 200);
            } 
            else {
                return response()->json([
                    'success' => false,
                    'message' => 'Fail to save new data',
                ], 500);
            }
        }
    }

    public function findById($id)
    {
        $post=user_db::find($id);
    }

    public function findandUpdateById()
    {
        
    }

    public function findandRemoveById()
    {
        
    }

}
