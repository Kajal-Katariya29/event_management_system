@extends('admin.app')

@section('title')
    Event Category Listing
@endsection

@section('body')
<div class="container-fluid px-4">
    <h1 class="mt-4">Event Category</h1>
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-12 py-1 ">
                <div class="float-end mb-3 mt-3">
                    <a class="btn px-3 btn-outline-warning fs-6 edit-delete-button" href="{{route('event-categories.create')}}">
                        <i class="fas fa-plus"></i> Add
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-12 py-1 ">
                @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
            </div>
        </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Event Category
        </div>
        <div class="card-body table-responsive ">
            <table  class='table table-hover' id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Event Category Name </th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Event Category Name</th>
                        <th class="">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ( $categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="d-flex flex-row mb-3">
                                <a class="btn btn-outline-warning edit-delete-button me-2" href="{{ route('event-categories.edit',$category->event_category_id) }}" id="edit{{ $category->event_category_id }}">Edit</a>
                                {!! Form::open(['route' => ['event-categories.destroy',$category->event_category_id], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Delete',['class'=> 'btn btn-outline-warning edit-delete-button', 'dusk' => "delete_{$category->event_category_id}" ]) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(".alert").delay(2300).slideUp(1000);
    </script>
@endsection
