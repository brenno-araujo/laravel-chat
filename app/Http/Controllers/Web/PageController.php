<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PageController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome',[
                    'canLogin' => Inertia::render('login'),
                    'canRegister' => Inertia::render('register')
                ]);
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }

    public function chat()
    {
        return Inertia::render('Chat');
    }
}
