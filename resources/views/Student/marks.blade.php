@extends('layouts.master')

@section('title' , 'Marks')
@section('master_content')
<div class="card">
    <div class="card-header">
        <h3>Marks in my Courses</h3>
    </div>
    <div class="card-body">
       
        <table class="table table-borderd text-center table-striped">
            <tr>
                <th>SL</th>
                <th>Session</th>
                <th>Semester</th>
                <th>Course</th>
                <th>Credit</th>
                <th>Teacher </th>
                <td>Marks</td>
                <td>GPA</td>
                <td>Grade</td>
                {{-- <th>Toal Gpa</th> --}}
            </tr>
            <tbody>
                @php
                    $total_credit = 0;
                    $total_gpa = 0;
                @endphp
                @forelse ($courses as $c)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $c->session->name }}</td>
                    <td>{{ $c->semester->name }}</td>
                    <td>{{ $c->course->name }}</td>
                    <td>{{ $c->course->credit }}</td>
                    <td>{{ $c->teacher->name }}</td>
                    <td>
                    @if ($c->marks === 0)
                        <span class="text-danger">Marks Not Assign Yet!</span>
                        @else
                        {{ $c->marks }}
                    @endif
                    </td>
                    <td>
                    @if ($c->marks === 0)
                    <span class="text-danger">Marks Not Assign Yet!</span>
                    @else
                        {{ $c->gpa }}
                    @endif
                    </td>
                    <td>
                        @if ($c->marks === 0)
                        <span class="text-danger">Marks Not Assign Yet!</span>
                        @else
                            {{ $c->grade }}
                        @endif
                    </td>
                    @php
                        $total_gpa += $c->gpa * $c->course->credit;
                        $total_credit += $c->course->credit; 
                    @endphp
                    {{-- <td>{{ $total_gpa }}</td> --}}
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <span class="text-danger">Marks isn't assign yet!!</span>
                    </td>
                </tr>
                @endforelse
                {{-- <span>{{ $total_credit }}</span> --}}
            </tbody>
        </table>
        <hr>
        @php
            $cgpa = $total_gpa/$total_credit;
        @endphp
        <h3>My Grade : 
            <b class="text-primary">
                @if($cgpa == 4.00)
                A+
                @elseif($cgpa >= 3.75 && $cgpa<=3.99 )
                A
                @elseif($cgpa >= 3.50 && $cgpa<=3.74 )
                A-
                @elseif($cgpa >= 3.25 && $cgpa<=3.49 )
                B+
                @elseif($cgpa >= 3.00 && $cgpa<=3.24 )
                B
                @elseif($cgpa >= 2.75 && $cgpa<=2.99 )
                B- 
                @elseif($cgpa >= 2.50 && $cgpa<=2.74 )
                C+
                @elseif($cgpa >= 2.25 && $cgpa<=2.49 )
                C 
                @elseif($cgpa >= 2.00 && $cgpa<=2.24 )
                D 
                @elseif($cgpa >= 1.99 && $cgpa<=0.00 )
                F 
                @endif
            </b> and Cgpa : 
            <b class="text-primary">{{ $cgpa }}</b></h3>
        
    </div>
</div>

@stop
