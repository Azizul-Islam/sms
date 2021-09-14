<?php

namespace App\Http\Controllers\DAdmin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegisterStudentController extends Controller
{
    public function index()
    {
        $data['registrations'] = Registration::get();
        return view('Admin.DAdmin.registration.index',$data);
    }

    public function approve(Request $request,$id)
    {
        $registration = Registration::findOrFail($id);
        $registration->status = 'approve';
        $registration->save();
        return back()->with('success','Status updated');
    }

    public function show(Registration $registration)
    {
        return view('Admin.DAdmin.registration.show',compact('registration'));
    }
}
