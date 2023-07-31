@extends('admin.app')

@section('title')
    Add Event Detail
@endsection

@section('body')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Event</h1>
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-12 py-3 ">
                @can('event.create')
                    <div class="float-end mb-3 mt-3">
                        <a class="btn px-3 btn-outline-warning fs-6 edit-delete-button" href="{{route('event.create')}}">
                            <i class="fas fa-plus"></i> Add
                        </a>
                    </div>
                @endcan
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Event
            </div>
            <div class="card-body table-responsive ">
                <table class='table table-hover' id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Event Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Event Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $newDate = date('d/m/Y', strtotime($event->start_date)) }}</td>
                                <td>{{ $newDate = date('d/m/Y', strtotime($event->end_date)) }}</td>
                                <td>
                                    <div class="d-flex flex-row mb-3">
                                        <a class="btn btn-outline-warning edit-delete-button me-2" href="{{ route('event.edit',$event->event_id ) }}" id="edit{{ $event->event_id  }}">Edit</a>
                                        {!! Form::open(['route' => ['event.destroy',$event->event_id ], 'method' => 'DELETE']) !!}
                                            {!! Form::submit('Delete',['class'=> 'btn btn-outline-warning edit-delete-button', 'dusk' => "delete_{$event->event_id }" ]) !!}
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
