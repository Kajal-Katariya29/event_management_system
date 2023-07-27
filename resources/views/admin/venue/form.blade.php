<div class="row mt-5">
    <div class="col-6 mt-2">
        {!! Form::label("country_id", "Select Country Name: ") !!}
        {!! Form::select('country_id',$country_id, null, ['placeholder' => 'Select Country...', 'class' => 'form-select mt-2']) !!}
        {!! $errors->first("country_id",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-2">
        {!! Form::label("city_id", "Select City Name: ") !!}
        {!! Form::select('city_id',[], null, ['placeholder' => 'Select City...', 'class' => 'form-select mt-2']) !!}
        {!! $errors->first("city_id",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-12 mt-3">
        {!! Form::label("venue_name", "Venue Name :") !!}
        {!! Form::text("venue_name", null, ['class' => 'form-control venue_name', 'id' => 'venue_name']) !!}
        {!! $errors->first("venue_name",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-12 mt-3">
        {!! Form::label("address", "Address :") !!}
        {!! Form::textarea("address", null, ['class' => 'form-control address', 'id' => 'address']) !!}
        {!! $errors->first("address",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-12 mt-3">
        {!! Form::label("pin_code", "Pin Code :") !!}
        {!! Form::text("pin_code", null, ['class' => 'form-control pin_code', 'id' => 'pin_code']) !!}
        {!! $errors->first("pin_code",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="mt-3">
        <div class="d-flex flex-row bd-highlight mb-3">
            <a class="btn btn-outline-warning edit-delete-button me-2" href="{{ route('venue.index') }}">Cancel</a>
            {!! Form::submit('save',['type' => 'submit', 'class' => 'btn btn-outline-warning px-4 edit-delete-button']) !!}
        </div>
    </div>
</div>
