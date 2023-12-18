<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\teacher;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    public function student_dashboard(){
        return view('student.student-dashboard');

    }
    // This Function gets all Teachers Offered courses
    public function send(){ 
        
       $teachers = Teacher::where('status', 'active')->get();
        return view('student.send-request', ['teachers' => $teachers]);

    }
    public function postRequests(Request $request, $teacher)
    {
        $user = auth()->user();
        $teacherDetails = Teacher::find($teacher);
        $userDetails = $user;
    
        // Check if a request already exists for the current student and teacher
        $existingRequest = Requests::where('teacher_id', $teacher)
            ->where('student_id', $user->id)
            ->where('requested', true)
            ->first();
    
        // If a request already exists, you can handle it as needed (e.g., show an error message)
        if ($existingRequest) {
            return redirect()->back()->with('error', 'Request already sent');
        }
    
        // Create a new request
        Requests::create([
            "teachername" => $teacherDetails->name,
            "course" => $teacherDetails->course,
            "studentname" => $userDetails->name,
            'teacher_id' => $teacher,
            'student_id' => $user->id,
            'requested' => true,
        ]);
    
        return redirect()->back()->with('success', 'Request sent successfully');
    }

}
