@extends('layouts.master')

@section('title' , 'Registration')
@section('master_content')
<div class="card">
    <div class="card-header">
        <h3>Registration </h3>
        
    </div>
    <div class="card-body">
        <table class="table table-borderd text-center table-striped">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Registration No</th>
                <th>Roll</th>
                <th>Session</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <tbody>
                @forelse ($registrations as $i=>$item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->student->name ?? '' }}</td>
                    <td>{{ $item->student->registration ?? '' }}</td>
                    <td>{{ $item->student->roll ?? '' }}</td>
                    <td>{{ $item->session->name ?? '' }}</td>
                    <td>{{ $item->semester->name ?? '' }}</td>
                    <td>
                        <span class="badge {{ $item->status == 'pending' ? 'bg-info' : 'bg-primary' }}" style="padding: 10px">{{ ucfirst($item->status) }}</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            @if($item->status !== 'approve')
                            <form action="{{ route('d-admin.register-student.approve',$item->id) }}" method="POST">
                                @csrf 
                                <button class="btn btn-outline-info btn-sm mr-2">Approve</button>
                            </form>
                            @endif
                            <a href="{{ route('d-admin.register-student.show',$item) }}" class="btn btn-sm btn-outline-success rounded"><i class="fa fa-eye"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <span class="text-danger">Data Not Found!!</span>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@stop
