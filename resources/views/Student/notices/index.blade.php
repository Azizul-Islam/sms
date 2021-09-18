@extends('layouts.master')

@section('title' , 'Notice')
@section('master_content')

<div class="row no-gutters">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Notice</h4>
                </div>
               
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="currencyTable">
                            @forelse ($notices  as $i=>$item)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                               <td>{{ $item->title }}</td>
                               <td>{{ date('d M Y',strtotime($item->date)) }}</td>
                               <td>{{ Str::limit($item->description, 30, '...') }}</td>
                                <td>
                                  
                                    <a href="" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                  
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Empty!!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


