<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
//use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Fr_SidebarController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function Fr_dashboard()
    {
        return Inertia::render('Frontend/Fr_Dashboard');
    }

    public function fr_messages()
    {
        return Inertia::render('Frontend/Fr_Messages');
    }

    public function fr_logs()
    {
        return Inertia::render('Frontend/Fr_Logs');
    }

}
