@extends('layouts.backend_master')
@section('brand') active @endsection
<base rer="/public"></a>
@section('content')

<div class="">
    <div class="row">
        <div class="col-lg-12 m-auto">
        <div class="card">
                <div class="card-header">
                    <h2>Brand List</h2>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                            <th>sl</th>
                            <th>brand_name</th>
                            <th>status</th>
                            <th>creatated_at</th>
                            <th>Action</th>
                       </thead>
                       <tbody>
                            @forelse ($all_brands as $brands)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $brands->brand_name }}</td>
                                    <td>{{ $brands->status == 1 ? 'active' : 'deactive' }}</td>
                                    <td>{{ $brands->created_at ->format('d-M-Y') }}</td>
                                    <td>
                                        <a class="btn btn-success btn sm" href="{{ url('/brand/edit') }}/{{ $brands->id }}">edit</a>
                                        <a class="btn btn-danger btn sm" href="{{ url('/category/delete') }}/{{ $brands->id }}">delete</a>
                                    </td>                            
                                 </tr>
                                 @empty
                                 <td class="text-danger text-center" colspan="10">No data added yet</td>
                            @endforelse
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection