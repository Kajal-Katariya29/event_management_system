@extends('admin.app')

@section('titile')
    Edit Organizer Detail
@endsection

@section('body')

<div class="container-fluid m-5">
    <h1 class="mt-4"> Edit Organizer </h1>
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
    {!! Form::model($organizerData, ['route' => ['organizer.update', $organizerData->organizer_id], 'method' => 'PATCH']) !!}
    {!! Form::token() !!}
        @include('admin.organizer.form')
    {!! Form::close() !!}
</div>

@endsection

@section('scripts')

@endsection
