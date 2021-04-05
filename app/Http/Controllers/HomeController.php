<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Student;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    
    
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            return redirect('/admin-dashboard');
        } elseif (auth()->user()->role === 'teacher') {
            return redirect('/teacher-dashboard');
        } elseif (auth()->user()->role === 'operation') {
            return redirect('/operation-dashboard');
        } elseif (auth()->user()->role === 'student') {
            return redirect('/student-dashboard');
        }
    }
    
    public function adminDashboard()
    {
        if (auth()->user()->role === 'admin') {
            return view('dashboard.admin');
        } elseif (auth()->user()->role === 'teacher') {
            return redirect('/teacher-dashboard');
        } elseif (auth()->user()->role === 'operation') {
            return redirect('/operation-dashboard');
        } elseif (auth()->user()->role === 'student') {
            return redirect('/student-dashboard');
        }
    }

    public function teacherDashboard()
    {
        if (auth()->user()->role === 'admin') {
            return redirect('/admin-dashboard');
        } elseif (auth()->user()->role === 'teacher') {
            return view('dashboard.teacher');
        } elseif (auth()->user()->role === 'operation') {
            return redirect('/operation-dashboard');
        } elseif (auth()->user()->role === 'student') {
            return redirect('/student-dashboard');
        }
    }

    public function operationDashboard()
    {
        if (auth()->user()->role === 'admin') {
            return redirect('/admin-dashboard');
        } elseif (auth()->user()->role === 'teacher') {
            return redirect('/teacher-dashboard');
        } elseif (auth()->user()->role === 'operation') {
            return view('dashboard.operation');
        } elseif (auth()->user()->role === 'student') {
            return redirect('/student-dashboard');
        }
    }

    public function studentDashboard(Request $request)
    {
        if (auth()->user()->role === 'admin') {
            return redirect('/admin-dashboard');
        } elseif (auth()->user()->role === 'teacher') {
            return redirect('/teacher-dashboard');
        } elseif (auth()->user()->role === 'operation') {
            return redirect('/operation-dashboard');
        } elseif (auth()->user()->role === 'student') {
            $student = Student::where('user_id', auth()->user()->id)->first();
            $students = Batch::where('class_master_id', $student->class_master_id)->latest()->take(8)->get();
            // buy now || orders table
            // if(Orders::where('user_id', auth()->user()->id)->exists()){
            // return redirect('/session-list');
            // }
            return view('dashboard.student', compact('students'));
        }
    }
    public function sessionList()
    {
        return view('dashboard.session-list');
    }
}
