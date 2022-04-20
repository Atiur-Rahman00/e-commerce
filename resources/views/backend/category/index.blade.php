@extends('layouts.backend_master')
@section('category') active @endsection
<base rer="/public"></a>
@section('content')

<div class="">
    <div class="row">
        <div class="col-lg-12 m-auto">
        <div class="card">
                <div class="card-header">
                    <h2>Category List</h2>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                            <th>sl</th>
                            <th>category_name</th>
                            <th>creatated_at</th>
                            <th>Action</th>
                       </thead>
                       <tbody>
                            @forelse ($all_categories as $categories)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $categories->category_name }}</td>
                                    <td>{{ $categories->created_at ->format('d-M-Y') }}</td>
                                    <td>
                                        <a class="btn btn-success btn sm" href="{{ url('/category/edit') }}/{{ $categories->id }}">edit</a>
                                        <a class="btn btn-danger btn sm" href="{{ url('/category/delete') }}/{{ $categories->id }}">delete</a>
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


<div class="row">
    <div class="col-lg-12 m-auto">
    <div class="card">
            <div class="card-header">
                <h2>Category List</h2>
            </div>
            <div class="card-body">
               <table class="table table-bordered">
                   <thead>
                        <th>sl</th>
                        <th>category_name</th>
                        <th>creatated_at</th>
                        <th>Action</th>
                   </thead>
                   <tbody>
                        @forelse ($all_trashed as $trashed)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $trashed->category_name }}</td>
                                <td>{{ $trashed->created_at ->format('d-M-Y') }}</td>
                                <td>
                                    <a class="btn btn-success btn sm" href="{{ url('/category/restore') }}/{{ $trashed->id }}">Restore</a>
                                    <a class="btn btn-danger btn sm" href="{{ url('/category/permanent/delete') }}/{{ $trashed->id }}">Permanent delete</a>
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


@endsection