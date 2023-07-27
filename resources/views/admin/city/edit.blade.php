@extends('admin.app')

@section('titile')
    Edit City Detail
@endsection

@section('body')

<div class="container-fluid m-5">
    <h1 class="mt-4"> Edit City </h1>
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
    {!! Form::model($cityData, ['route' => ['cities.update', $cityData->city_id], 'method' => 'PATCH',]) !!}
    {!! Form::token() !!}
        @include('admin.city.form')
    {!! Form::close() !!}
</div>

@endsection

@section('scripts')

@endsection
