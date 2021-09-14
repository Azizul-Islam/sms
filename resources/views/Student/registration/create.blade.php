@extends('layouts.master')

@section('title', 'Registration')
@section('master_content')

    <div class="row no-gutters justify-content-center">
        <div class="col-12 col-md-8 mt-5">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4 class="text-info">Registration</h4>
                    </div>
                    <div class="">
                    <a href="{{ route('student.course-registration.index') }}" class=" btn btn-sm btn-success">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.course-registration.store') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ auth()->user()->id }}" name="student_id">
                        <input type="hidden" value="{{ auth()->user()->department->id }}" name="department_id">
                        <div class="form-group row">
                            <label for="session" class="col-md-2 col-form-label">Session <span class="text-red">*</span></label>
                            <div class="col-md-10">
                                <select name="session_id" required id="" class="form-control @error('session_id') is-invalid @enderror">
                                    <option value="">Select One</option>
                                    @foreach ($sessions as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('session_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="session" class="col-md-2 col-form-label">Semester <span class="text-red">*</span></label>
                            <div class="col-md-10">
                                <select name="semester_id" required id="semester_id" class="form-control @error('semester_id') is-invalid @enderror">
                                    <option value="">Select One</option>
                                    @foreach ($semesters as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('semester_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-none" id="course-div">
                            <label for="inputPassword" class="col-md-2 col-form-label">Select Course <span class="text-red">*</span></label>
                            <div class="col-md-10" id="course_content">
                                
                                  
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-2 col-form-label"></label>
                            <div class="col-md-3">

                                <input type="submit" class="btn btn-success" value="Register">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('script')
    <script>
        $(document).ready(function(){
            $(document).on('change','#semester_id',function(){
                var semester_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-course') }}",
                    methos: 'GET',
                    dataType: 'JSON',
                    data: {
                        _token: "{{ csrf_token() }}",
                        semester_id: semester_id
                    },
                    success: function(data){
                       $('#course-div').removeClass('d-none');
                       html = '';
                       $.each(data,function(k,v){
                           html +='<div class="form-check"><input name="course_id[]" required class="form-check-input" type="checkbox" value="'+v.id+'" id="'+v.id+'"><label class="form-check-label" for="'+v.id+'">'+v.name+'</label></div>'
                       });
                       $('#course_content').html(html);
                    }
                });
            });
        });
    </script>
@endpush
