@extends('layouts.master')

@section('title' , 'Course')
@section('master_content')

<div class="row">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="text-info">Course</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Credit</th>
                            <th>Semester</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody id="currencyTable">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="text-info">Add Course</h4>
            </div>
            <div class="card-body">
                <form id="catAddForm">
                    <div class="form-group">
                        <label for="">Name *</label>
                        <input type="text" class="form-control" name="name" placeholder="Course Name" id="add_cat_name">
                        <span class="text-danger" id="nameError"></span>
                        <div id="response"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Code *</label>
                        <input type="text" class="form-control" name="code" placeholder="Course Code" id="code">
                        <span class="text-danger" id="codeError"></span>
                        <div id="response"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Credit *</label>
                        <input type="text" class="form-control" name="credit" placeholder="Course credit" id="credit">
                        <span class="text-danger" id="creditError"></span>
                        <div id="response"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Semester *</label>
                       <select name="semester_id" id="semester_id" class="form-control" id="">
                           <option value="">Select One</option>
                           @foreach ($semesters as $item)
                               <option value="{{ $item->id }}">{{ $item->name }}</option>
                           @endforeach
                       </select>
                        <span class="text-danger" id="semesterError"></span>
                        <div id="response"></div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-success"><i class="fa fa-plus"></i> Add Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="userCrudModal">Edit Course</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <form id="catUpdateForm" >
                    <input type="hidden" id="e_id" name="id" value="">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" id="edit_cat_name" name="name" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Code</label>
                        <input type="text" id="course_code" name="code" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Credit</label>
                        <input type="text" id="course_credit" name="credit" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                       <select name="semester_id" class="form-control" id="course_semester_id">
                        @foreach ($semesters as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-block btn-info">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@stop

@push('script')
<script type="text/javascript">
    //fetch
    function table_data_row(data) {
            var	rows = '';
            var i = 0;
            $.each( data, function( key, value ) {
                value.id
                rows = rows + '<tr>';
                rows = rows + '<td>'+ ++i +'</td>';
                rows = rows + '<td>'+value.name+'</td>';
                rows = rows + '<td>'+value.code+'</td>';
                rows = rows + '<td>'+value.credit+'</td>';
                rows = rows + '<td>'+value.semester.name+'</td>';
                rows = rows + '<td data-id="'+value.id+'" class="text-center">';
                rows = rows + '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.id+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.id+'" >Delete</a> ';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#currencyTable").html(rows);
    }
        function getAllCourse(){
            axios.get("{{ route('admin.course.fetch') }}")
            .then(function(res){
              //  console.log(res);
                table_data_row(res.data);
              //$('.dataTable').DataTable();
            })
        }
        getAllCourse();
        //delete currency
        $('body').on('click','#deleteRow',function (e) {
            e.preventDefault();
             let id = $(this).data('id')
            let url = base_path + '/admin/course/' + id
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
              axios.delete(url).then(function(r){
                getAllCourse();
                 swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        )
            });
            } else if (
                    /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your file is safe :)',
                    'error'
                )
            }
        })
        });
        //store
        $('body').on('submit','#catAddForm',function(e){
            console.log('ok');
        e.preventDefault();
        let nameError = $('#nameError')
        let codeError = $('#codeError');
        let creditError = $('#creditError');
        let semesterError = $('#semesterError');
        nameError.text('')
        axios.post("{{ route('admin.course.store') }}", {
            name: $('#add_cat_name').val(),
            code: $('#code').val(),
            credit: $('#credit').val(),
            semester_id: $('#semester_id').val()
        })
        .then(function (response) {
            getAllCourse();
            nameError.text('')
            codeError.text('')
            creditError.text('')
            semesterError.text('')
             $('#add_cat_name').val('')
             $('#code').val('')
             $('#credit').val('')
             $('#semester_id').val('')
             setSwalMessage()

        })
        .catch(function (error) {
            if(error.response.data.errors){
                nameError.text(error.response.data.errors.name[0]);
                codeError.text(error.response.data.errors.code[0]);
                creditError.text(error.response.data.errors.credit[0]);
                semesterError.text(error.response.data.errors.semester_id[0]);
            }
        });
    });

    //edit
    $('body').on('click','#editRow',function(){
        let id = $(this).data('id')
        let url = base_path + '/admin/course/' + id
       // console.log(url);
        axios.get(url)
            .then(function(res){
                $('#edit_cat_name').val(res.data.name);
                $('#course_code').val(res.data.code);
                $('#course_credit').val(res.data.credit);
                $('#course_semester_id').val(res.data.semester_id);
                $('#e_id').val(res.data.id);
            })
    })
    //update
    $('body').on('submit','#catUpdateForm',function(e){
        e.preventDefault()
        let id = $('#e_id').val()
        let data = {
            id : id,
            name : $('#edit_cat_name').val(),
            code : $('#course_code').val(),
            credit: $('#course_credit').val(),
            semester_id: $('#course_semester_id').val(),
        }
        let url = base_path + '/admin/course' + '/'  + id
        axios.put(url,data)
        .then(function(res){
            getAllCourse();
             $('#editModal').modal('toggle')
            setSwalMessage('Success','Data Update Successfully!','success',);
            //console.log(res);
        })
    })
</script>
@endpush
