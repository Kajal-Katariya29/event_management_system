@extends('admin.app')

@section('titile')
    Edit Event Detail
@endsection

@section('body')

<div class="container-fluid m-5">
    <h1 class="mt-4"> Edit Event </h1>
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
    {!! Form::model($eventData, ['route' => ['event.update', $eventData->event_id ], 'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}
    {!! Form::token() !!}
        @include('admin.event.form')
    {!! Form::close() !!}
</div>

@endsection

@section('scripts')

@endsection
