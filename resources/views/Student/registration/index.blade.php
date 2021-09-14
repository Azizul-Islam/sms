@extends('layouts.master')

@section('title' , 'Registration')
@section('master_content')
<div class="card">
    <div class="card-header">
        <h3>Registration <a href="{{ route('student.course-registration.create') }}" class="btn btn-success float-right" >Add</a></h3>
        
    </div>
    <div class="card-body">
        <table class="table table-borderd text-center table-striped">
            <tr>
                <th>SL</th>
                <th>Session</th>
                <th>Semester</th>
                <th>Status</th>
            </tr>
            <tbody>
                @forelse ($registrations as $i=>$item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->session->name ?? '' }}</td>
                    <td>{{ $item->semester->name ?? '' }}</td>
                    <td>
                        <span class="badge {{ $item->status == 'pending' ? 'bg-info' : 'bg-primary' }}" style="padding: 10px">{{ ucfirst($item->status) }}</span>
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
