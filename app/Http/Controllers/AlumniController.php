<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAlumniNotification;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all alumni with their user
        $alumni = Alumni::with('user')->get();
        return view('alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'graduation_year' => 'required',
            'program' => 'required',
        ]);

        $alumni = Alumni::create([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'graduation_year' => $request->graduation_year,
            'program' => $request->program,
            'job' => $request->job,
            'company' => $request->company,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        // ✅ Send notification email
        Mail::to($alumni->user->email)->queue(new NewAlumniNotification($alumni));


        return redirect()->route('alumni.index')->with('success', 'Alumni added successfully and email sent!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumnus)
    {
        return view('alumni.edit', ['alumni' => $alumnus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumni $alumnus)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'graduation_year' => 'required',
            'program' => 'required',
        ]);

        $alumnus->update([
            'full_name' => $request->full_name,
            'graduation_year' => $request->graduation_year,
            'program' => $request->program,
            'job' => $request->job,
            'company' => $request->company,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('alumni.index')->with('success', 'Alumni updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumnus)
    {
        $alumnus->delete();
        return redirect()->route('alumni.index')->with('success', 'Alumni deleted successfully!');
    }
}
