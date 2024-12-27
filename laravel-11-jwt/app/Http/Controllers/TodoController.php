<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Resources\Todo as TodoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todoList = Todo::all();
        $arr = [
            'status' => true,
            'message'=>'TodoList generated successfully',
            'data' => TodoResource::collection($todoList)
        ];
        return response()->json($arr, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $arr = [
                'status' => false,
                'error'=> $validator->errors()
            ];
            return response()->json($arr, 400);
        }

        $todo = Todo::create($input);
        $arr = [
            'status' => true,
            'message'=>'Todo has been created',
            'data' => new TodoResource($todo)
        ];
        return response()->json($arr, 200);
    }

    public function show(string $id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)){
            $arr = [
                'status' => false,
                'message'=>'Todo not found'
            ];
            return response()->json($arr, 404);
        }
        $arr = [
            'status' => true,
            'message'=>'Todo fetched successfully',
            'data' => new TodoResource($todo)
        ];
        return response()->json($arr, 200);
    }

    public function update(Request $request, Todo $todo)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $arr = [
                'status' => false,
                'error'=> $validator->errors()
            ];
            return response()->json($arr, 400);
        }

        $todo->title = $input['title'];
        $todo->description = $input['description'];
        $todo->save();

        $arr = [
            'status' => true,
            'message'=>'Todo has been updated successfully',
            'data' => new TodoResource($todo)
        ];
        return response()->json($arr, 200);
    }

    public function destroy(string $id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)){
            $arr = [
                'status' => false,
                'message'=>'Todo not found'
            ];
            return response()->json($arr, 404);
        }

        $todo->delete();
        $arr = [
            'status' => true,
            'message'=>'Todo has been deleted'
        ];
        return response()->json($arr, 200);
    }
}
