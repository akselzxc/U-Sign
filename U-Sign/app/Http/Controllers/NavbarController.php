<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NavbarController extends Controller
{

//    public function index()
//    {
//        if (auth()->check()) {
//            if (auth()->user()->isAdmin()) {
//                return Inertia::render('Frontend/secDashboard');
//            }
//
//            if (auth()->user()->isGuard()) {
//                return Inertia::render('Frontend/Ghome');
//            }
//        }
//
//        return redirect()->route('login');
//    }

    public function home()
    {
        return Inertia::render('Frontend/Home');
    }

    public function tutorial()
    {
        return Inertia::render('Frontend/Tutorial');
    }

    public function faqs()
    {
        return Inertia::render('Frontend/Faqs');
    }

    public function user()
    {
        return Inertia::render('Frontend/UserOption');
    }

    public function studentInput()
    {
        return Inertia::render('Frontend/StudentInput');
    }

    public function guestInput()
    {
        return Inertia::render('Frontend/GuestInput');
    }

    public function queries()
    {
        return Inertia::render('Frontend/Queries');
    }

    public function deafUI()
    {
        return Inertia::render('Frontend/DeafUI');
    }

    public function login_frontline()
    {
        return Inertia::render('Frontend/Login_Frontline');
    }


}
