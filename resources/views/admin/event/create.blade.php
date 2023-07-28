@extends('admin.app')

@section('title')
    Add Event Detail
@endsection

@section('body')
    <div class="container-fluid m-5">
        <h1 class="mt-4"> Add Event </h1>
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
        {!! Form::open(['route' => 'event.store', "method" => "post", 'enctype' => 'multipart/form-data']) !!}
        {!! Form::token() !!}
            @include('admin.event.form', ['eventData' => null])
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')

@endsection
