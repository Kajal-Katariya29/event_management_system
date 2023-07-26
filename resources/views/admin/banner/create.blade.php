@extends('admin.app')

@section('title')
    Add Banner Detail
@endsection

@section('body')
    <div class="container-fluid m-5">
        <h1 class="mt-4"> Add Banner </h1>
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
        {!! Form::open(['route' => 'banner.store', "method" => "post", 'enctype' => 'multipart/form-data']) !!}
        {!! Form::token() !!}
            @include('admin.banner.form', ['bannerData' => null])
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')

@endsection
