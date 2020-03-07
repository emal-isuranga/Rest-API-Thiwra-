<?php

namespace App\Http\Controllers;

use App\Model\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $doc = new Student;
               $doc->name = $request->name;
               $doc->nic = $request->nic;
               $doc->email = $request->email;
               $doc->password = $request->password;
               $doc->status =  $request->status;
               $doc->profession = $request->profession;
               $doc->type = $request->type;
               $doc->affiliation = $request->affiliation;
               $doc->category_id = $request->category_id;
               $doc->qualifications_id = $request->qualifications_id;
               
               $doc->save();
               $student_id = $doc->id;

               return response()->json([
                'message' => 'uploaded successfully.',
                'status' =>true,
                'error'  => 'no',
            ], 200);
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return response()->json([
                    'message' => 'Duplicate Entry',
                    'status' => false,
                    'error'  => 'no',
                ], 400);
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student =  Student::find($student);

        return response()->json([
            'message' => 'successfully.',
            'status' =>true,
            'error'  => 'no',
            'student' => $student
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
    
        return  $doc = Student::find($student);
          $doc->name = $request->name;
               $doc->nic = $request->nic;
               $doc->email = $request->email;
               $doc->password = $request->password;
               $doc->status =  $request->status;
               $doc->profession = $request->profession;
               $doc->type = $request->type;
               $doc->affiliation = $request->affiliation;
               $doc->category_id = $request->category_id;
               $doc->qualifications_id = $request->qualifications_id;
          $doc->save();
          $student_id = $doc->id;

               return response()->json([
                'message' => 'update successfully.',
                'status' =>true,
                'error'  => 'no',
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $share = Student::find($student);
        $share->delete();
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;

        $user = Student::where('email',$email)
        ->where('password',$pass)
        ->get();

        if(count($user) != 0){
            return response()->json([
                'message' => 'successfully.',
                'status' =>true,
                'error'  => 'no',
                'student_list' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'login Fail.',
                'status' =>false,
                'error'  => 'no',
                'student_list' => $user
            ], 200); 
        }

       

    }

    public function registerStudent()
    {
        $student_list = Student::where('status','APPROVED')
                        ->orderBy('name','ASC')
                        ->get();

                        return response()->json([
                            'message' => 'successfully.',
                            'status' =>true,
                            'error'  => 'no',
                            'student_list' => $student_list
                        ], 200);
    }

    public function withOutRegister()
    {
        $student_list = Student::where('status','REGISTER')
        ->orderBy('name','ASC')
        ->get();

        return response()->json([
            'message' => 'successfully.',
            'status' =>true,
            'error'  => 'no',
            'student_list' => $student_list
        ], 200);
    }

    public function filter(Request $request)
    {
        // return $request;
        $key = $request->key;
        $value = $request->value;

        $student_list = Student::where($key,$value)
        ->where('status','REGISTER')
        ->orderBy('name','ASC')
        ->get();

        return response()->json([
            'message' => 'successfully.',
            'status' =>true,
            'error'  => 'no',
            'student_list' => $student_list
        ], 200);
    }
}
