@extends('layouts.master')

@section('title' , 'Assign Course ')
@section('master_content')

<div class="row no-gutters justify-content-center">
    <div class="col-12 col-md-8 mt-5">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Assign Course</h4>
                </div>
                <div class="">
                    <a href="{{ route('d-admin.assign-course.index') }}" class="btn btn-sm btn-success">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('d-admin.assign-course.store') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ auth('dept_admin')->user()->department_id }}" name="department_id">
                   <div class="row">
                       <div class="col-6">
                            <div class="form-group">
                                <label for="">Session : </label>
                                <select name="session_id" id="" class="form-control">
                                    <option value="">Select A Session</option>
                                    @foreach ($sessions as $session)
                                        <option value="{{ $session->id }}">{{ $session->name }}</option>
                                    @endforeach
                                </select>
                                @error('session_id')<span class="text-danger">{{ $message }}</span >@enderror
                            </div>
                       </div>
                       <div class="col-6">
                        <div class="form-group">
                            <label for="">Semester : </label>
                            <select name="semester_id" id="semester_id" class="form-control">
                                <option value="">Select A Semester</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                @endforeach
                            </select>
                            @error('semester_id')<span class="text-danger">{{ $message }}</span >@enderror
                        </div>
                   </div>
                       <div class="col-6">
                        <div class="form-group">
                            <label for="">Teacher : </label>
                            <select name="teacher_id" id="" class="form-control">
                                <option value="">Select A Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')<span class="text-danger">{{ $message }}</span >@enderror
                        </div>
                   </div>

               <div class="col-6">
                <div class="form-group">
                    <label for="">Course : </label>
                    <select name="course_id" id="course_id" class="form-control">
                        
                       
                    </select>
                    @error('course_id')<span class="text-danger">{{ $message }}</span >@enderror
                </div>
           </div>
                   </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-success" value="Assign Course" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','#semester_id',function(){
                let semester_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-course') }}",
                    methos: 'GET',
                    dataType: 'JSON',
                    data: {
                        _token: "{{ csrf_token() }}",
                        semester_id: semester_id
                    },
                    success: function(data){
                       html = '<option value="">Select A Course</option>';
                       $.each(data,function(k,v){
                           html +='<option value="'+v.id+'">'+v.name+'</option>'
                       });
                       $('#course_id').html(html);
                    }
                });
            });
        });
    </script>
@endpush


