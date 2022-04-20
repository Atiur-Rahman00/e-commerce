@extends('layouts.backend_master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                   <h2>You are logged in</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
