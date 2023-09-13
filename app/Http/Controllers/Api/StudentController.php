<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    public function index()
    {

        $students = Student::all();
        if ($students->count() > 0) {

            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $students

            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'data not found',
                'data' => null

            ], 404);
        }
    }

    public function store(Request $request)
    {
        // echo "$request->name";
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'max:100', 'unique:student'],
                'phone' => ['required', 'string', 'max:100'],
                'course' => ['required', 'string', 'max:100'],
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation failed',
                'errors' => $validator->messages()
            ], 400);
        } else {
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'course' => $request->course,
            ]);
            if ($student) {
                return response()->json([
                    'status' => 200,
                    'message' => 'success',
                    'data' => $student

                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Internal Server Error',
                    'data' => null

                ], 500);
            }
        }
    }
}
