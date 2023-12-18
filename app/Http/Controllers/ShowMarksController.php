<?php

namespace App\Http\Controllers;

use App\Models\marks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowMarksController extends Controller
{
    public function showmarks($student_id, $teacher_id) {
        // Get the authenticated user ID
        $user_id = Auth::id();
    
        // Find the marks record for the authenticated user
        $marks = Marks::where('student_id', $user_id)->first();
    
        // Check if marks record is found for the authenticated user
        if ($marks) {
            // Find the marks record for the specified student and teacher
            $student_marks = Marks::where('teacher_id', $teacher_id)
                ->where('student_id', $student_id)
                ->where('cheating', true)
                ->first();
    
            // Check if marks record is found for the specified student and teacher
            if ($student_marks) {
                // Update the quiz_marks to 0 for the authenticated user
                $marks->quiz_marks = 0;
                $marks->save();
    
                return redirect()->back()->with('success', 'Quiz marks updated successfully');
            }
    
            return redirect()->back()->with('error', 'Marks record not found');
        }
    
        return redirect()->back()->with('error', 'Marks record not found for the authenticated user');
    }
    
}
