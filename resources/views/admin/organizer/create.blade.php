@extends('admin.app')

@section('title')
    Add Organizer Detail
@endsection

@section('body')
    <div class="container-fluid m-5">
        <h1 class="mt-4"> Add Organizer </h1>
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
        {!! Form::open(['route' => 'organizer.store', "method" => "post"]) !!}
        {!! Form::token() !!}
            @include('admin.organizer.form', ['organizerData' => null])
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')

@endsection
