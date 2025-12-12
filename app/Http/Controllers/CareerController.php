<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        return view('career.index');
    }

    public function job()
    {
        return view('career.job');
    }

    public function internship()
    {
        return view('career.internship');
    }

    public function apply(Request $request)
    {
        // Fake save - just show success message
        return back()->with('success', '✅ Your application was sent successfully!');
    }
}
