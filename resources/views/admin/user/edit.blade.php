@extends('admin.app')

@section('titile')
    Edit User Detail
@endsection
P
@section('body')

<div class="container-fluid m-5">
    <h1 class="mt-4"> Edit User </h1>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row m-5">
    {!! Form::model($userData, ['route' => ['user.update', $userData->user_id], 'method' => 'PATCH']) !!}
    {!! Form::token() !!}
        @include('admin.user.form')
    {!! Form::close() !!}
</div>

@endsection

@section('scripts')

@endsection
