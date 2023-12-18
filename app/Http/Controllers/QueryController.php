<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\marks;
use App\Models\Requests;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueryController extends Controller
{
public function index()
{
    $user = auth()->user(); // Get the currently authenticated user
    $teacherId = Auth::id();

    if ($user->role === 'teacher') {
        // If the user is a teacher, get only their own teacher record
        $teachers = Teacher::where('id', $teacherId)->where('status', 'active')->get();
    } else {
        // If the user is not a teacher, get all active teachers
        $teachers = Teacher::where('status', 'active')->get();
    }

    return view('query.index', ['teachers' => $teachers]);
}

    public function Chat($teacherId) {
        $user = auth()->user();
        $marks=marks::all();
        $teacherDetails = Teacher::find($teacherId);
        $ch_messages = ChMessage::where('teacher_id', $teacherId)->latest()->get();

        // Check if the user has the role of a student
        if ($user->role === 'student') {
            // Check for active requests from the current student for the specified teacher and course
            $stdrequest = Requests::where('status', 'active')
                ->where('teacher_id', $teacherDetails->id)
                ->where('student_id', $user->id)
                ->where('course', $teacherDetails->course)
                ->get();
    
            // Use isEmpty() to check if the collection is empty
            if ($stdrequest->isEmpty()) {
                // No active request found, redirect with alert using JavaScript
                return redirect('/query')->with('alert', 'No active request found.');
            }
    
            // Active request found, proceed with showing the chat
            return view('query.chat', ['ch_messages' => $ch_messages, 'teacherDetails' => $teacherDetails]);
        } else {
            // Redirect with an alert if the user does not have the role of a student
            return view('query.chat', ['ch_messages' => $ch_messages, 'teacherDetails' => $teacherDetails,'marks'=>$marks]);
        }
    }
    
        // Retrieve messages where teacher_id matches the provided $teacherId
    
    
    

public function postMessage(Request $request, $teacherId)
{
    $user = auth()->user();
    $teacherDetails = Teacher::find($teacherId);
    $userDetails = $user;
    
    ChMessage::create([
        "teachername" => $teacherDetails->name,
        "course" => $teacherDetails->course,
        "studentname" => $userDetails->name,
        'body' => $request->input('content'),
        'teacher_id' => $teacherDetails->id, // Use $teacherDetails->id instead of $teacher
        'student_id' => $user->id,
    ]);

    return redirect()->back()->with('success', 'Message sent successfully');
}









}
