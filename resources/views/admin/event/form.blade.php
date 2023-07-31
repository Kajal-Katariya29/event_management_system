<div class="row">
    <div class="col-12 mt-3">
        {!! Form::label("name", "Title :") !!}
        {!! Form::text("name", null, ['class' => 'form-control title', 'id' => 'title']) !!}
        {!! $errors->first("name",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-12 mt-3">
        {!! Form::label("description", "Description :") !!}
        {!! Form::textarea("description", null, ['class' => 'form-control description', 'id' => 'description']) !!}
        {!! $errors->first("description",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-3">
        {!! Form::label("event_category_id", "Event Category : ") !!}
        {!! Form::select('event_category_id',$event_category_id , null, ['placeholder' => 'Select Event Category...', 'class' => 'form-select mt-2']) !!}
        {!! $errors->first("event_category_id",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-3">
        {!! Form::label("venue_id", "Event Venue : ") !!}
        {!! Form::select('venue_id',$venue_id , null, ['placeholder' => 'Select Event Venue...', 'class' => 'form-select mt-2']) !!}
        {!! $errors->first("venue_id",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-3">
        {!! Form::label("organizer_id", "Event Organizer : ") !!}
        {!! Form::select('organizer_id',$organizer_id , null, ['placeholder' => 'Select Event Organizer...', 'class' => 'form-select mt-2']) !!}
        {!! $errors->first("organizer_id",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-3">
        {!! Form::label("start_date", "Event Start Date : ") !!}
        {!! Form::date('start_date', $eventData ? date('Y-m-d', strtotime($eventData->start_date)) : null, ['class' => 'form-control start_date']) !!}
        {!! $errors->first("start_date",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-3">
        {!! Form::label("end_date", "Event End Date : ") !!}
        {!! Form::date('end_date', $eventData ? date('Y-m-d', strtotime($eventData->end_date)) : null, ['class' => 'form-control end_date']) !!}
        {!! $errors->first("end_date",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-3">
        {!! Form::label("registration_deadline", "Event Registration Date : ") !!}
        {!! Form::date('registration_deadline', $eventData ? date('Y-m-d', strtotime($eventData->registration_deadline)) : null, ['class' => 'form-control registration_deadline']) !!}
        {!! $errors->first("registration_deadline",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-3">
        {!! Form::label("sponser_id", "Event Sponsers : ") !!}
        {!! Form::select('sponser_id[]',$sponser_id , $selectedSponser , ['multiple' => true ,'placeholder' => 'Select Event Sponsers...', 'class' => 'form-select mt-2']) !!}
        {!! $errors->first("sponser_id",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-2">
        {!! Form::label("status", "Status : ") !!}
        {!! Form::select('status',['1' => 'Active', '0' => 'Inactive'], null, ['placeholder' => 'Select Status...', 'class' => 'form-select mt-2']) !!}
        {!! $errors->first("status",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-3">
        {!! Form::label('images', 'Event Images:') !!}
        {!! Form::file('images[]', ['class' => 'form-control deleteImage', 'id' => 'deleteImage', 'multiple' => true]) !!}
        {!! $errors->first("images",'<span class="text-danger">:message</span>') !!}
        @if (!empty($eventData && $eventData->eventMedia))
            @foreach ($eventData->eventMedia as $media)
                <div class="mt-3 me-3" style="position: relative; display: inline-block;">
                    <img src="{{ asset('admin/images/eventmedia/' .$media->event_id.'/'.$media->media_name) }}" alt="{{ $media->media_path }}" width="100" height="100" class="mt-3">
                    <span class="close deleteImage" style="position: absolute; top: 0; right: 0; z-index: 1; cursor: pointer; font-size: 30px; color:aqua;"
                        data-image-id="{{ $media->event_media_id }}">&times;</span>
                </div>
            @endforeach
        @endif
    </div>
    <div class="mt-3">
        <div class="d-flex flex-row bd-highlight mb-3">
            <a class="btn btn-outline-warning edit-delete-button me-2" href="{{ route('event.index') }}">Cancel</a>
            {!! Form::submit('save',['type' => 'submit', 'class' => 'btn btn-outline-warning px-4 edit-delete-button']) !!}
        </div>
    </div>
</div>
