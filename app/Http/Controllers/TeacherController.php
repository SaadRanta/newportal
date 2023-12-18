<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TeacherController extends Controller
{
    public function teacher_dashboard(){
        return view('teacher.teacher-dashboard');
    }

        // This Function gets all Requests of student to join course
      

        // ...
        
        public function accept() {
            // Get the currently authenticated user's ID
            $teacherId = Auth::id();
        
            // Retrieve requests where the teacherId matches the currently authenticated user
            $stdrequest = Requests::where('status', 'inactive')->where('teacher_id', $teacherId)->get();
        
            return view('teacher.accept-request', ['stdrequests' => $stdrequest]);
        }
            
        public function postacceptRequest($requestId)
    {
        // Find the request by ID
        $request = Requests::find($requestId);

        if (!$request) {
            return redirect()->back()->with('error', 'Request not found');
        }

        // Update the status to 'active'
        $request->status = 'active';
        $request->save();

        return redirect()->back()->with('success', 'Request processed successfully');
    }
}
