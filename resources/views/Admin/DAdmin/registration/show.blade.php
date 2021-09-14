@extends('layouts.master')

@section('title' , 'Registration')
@section('master_content')
<div class="card">
    <div class="card-header">
        <h3>Registration view</h3>
        
    </div>
    <div class="card-body">
        <table class="table table-borderd text-center table-striped">
            <tr>
                <th>SL</th>
               <th>Course</th>
            </tr>
            <tbody>
                @forelse ($registration->items as $i=>$item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->course->name ?? '' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2">
                        <span class="text-danger">Data Not Found!!</span>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@stop
