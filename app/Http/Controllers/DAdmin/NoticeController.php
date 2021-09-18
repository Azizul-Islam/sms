<?php

namespace App\Http\Controllers\DAdmin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::latest()->get();
        return view('Admin.DAdmin.notice.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.DAdmin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
            'file' => 'nullable'
        ]);

        if($request->has('file')){
            $file = $request->file('file');
            $name_gen = date('YmdHis').".".$file->getClientOriginalExtension();
            $file->move(public_path('uploads/backend'),$name_gen);
            $data['file'] = $name_gen;
        }
        $data['department_id'] = auth()->user()->department_id;
        $data['user_id'] = auth()->user()->id;

        Notice::create($data);
        return redirect()->route('d-admin.notices.index')->with('success','Notice added success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        return view('Admin.DAdmin.notice.edit',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        $data = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
            'file' => 'nullable'
        ]);

        if($request->has('file')){
            if(!blank($notice->file)){
                unlink(public_path('uploads/backend/'.$notice->file));
            }
            $file = $request->file('file');
            $name_gen = date('YmdHis').".".$file->getClientOriginalExtension();
            $file->move(public_path('uploads/backend'),$name_gen);
            $data['file'] = $name_gen;
        }

        $notice->update($data);
        return redirect()->route('d-admin.notices.index')->with('success','Notice updated success');

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return back()->with('success','Notice deleted success');
    }
}
