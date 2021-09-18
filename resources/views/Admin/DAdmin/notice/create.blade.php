@extends('layouts.master')

@section('title' , 'Notice')
@section('master_content')

<div class="row no-gutters justify-content-center">
    <div class="col-12 col-md-8 mt-5">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Notice</h4>
                </div>
                <div class="text-right pull-right">
                    <a href="{{ route('d-admin.notices.index') }}" class="btn btn-sm btn-success">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('d-admin.notices.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ auth('admin')->id() }}" name="user_id">
                    
                    <div class="form-group">
                        <label for="">Titel : </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title" value="{{ old('title') }}">
                        @error('title')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Date : </label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="date" value="{{ old('date') }}">
                        @error('date')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description : </label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" rows="6">{{ old('description') }}</textarea>
                        @error('description')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">File : </label>
                        <input type="file" name="file" >
                        @error('file')<span class="text-danger">{{ $message }}</span >@enderror
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


