@extends('layouts.master')

@section('title' , 'Student Create')
@section('master_content')

<div class="row no-gutters justify-content-center">
    <div class="col-12 col-md-8 mt-5">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Student Create</h4>
                </div>
                <div class="text-right pull-right">
                    <a href="{{ route('d-admin.student.index') }}" class="btn btn-sm btn-success">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('d-admin.student.store') }}" method="post">
                    @csrf
                    {{-- <input type="hidden" value="{{ auth('dept_admin')->id() }}" name="admin_id"> --}}
                    <input type="hidden" value="{{ auth('dept_admin')->user()->department_id  }}" name="department_id">
                    <div class="form-group">
                        <label for="">Session : </label>
                       <select name="session_id" id="" class="form-control">
                           <option value="">Select a Session</option>
                           @foreach ($sessions as  $session)
                           <option value="{{ $session->id }}">{{ $session->name }}</option>
                           @endforeach
                       </select>
                        @error('session_id')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Semester : </label>
                       <select name="semester_id" id="" class="form-control">
                           @foreach ($semesters as  $item)
                           <option value="{{ $item->id }}">{{ $item->name }}</option>
                           @endforeach
                       </select>
                        @error('semester_id')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Name : </label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                        @error('name')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email : </label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Registration ID : </label>
                        <input type="text" class="form-control" name="registration" placeholder="Registration ID" value="{{ old('registration') }}">
                        @error('registration')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Roll : </label>
                        <input type="text" class="form-control" name="roll" placeholder="Roll" value="{{ old('roll') }}">
                        @error('roll')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone : </label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                        @error('phone')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password : </label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @error('password')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-success" value="Submit" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop


