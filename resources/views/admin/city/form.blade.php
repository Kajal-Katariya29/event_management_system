<div class="row mt-5">
    <div class="col-6 mt-2">
        {!! Form::label("country_id", "Select Country Name: ") !!}
        {!! Form::select('country_id',$country_id, null, ['placeholder' => 'Select Country...', 'class' => 'form-select mt-2']) !!}
        {!! $errors->first("country_id",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-2">
        {!! Form::label("name", "City :") !!}
        {!! Form::text("name", null, ['class' => 'form-control name mt-2', 'id' => 'name']) !!}
        {!! $errors->first("name",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="mt-3">
        <div class="d-flex flex-row bd-highlight mb-3">
            <a class="btn btn-outline-warning edit-delete-button me-2" href="{{ route('cities.index') }}">Cancel</a>
            {!! Form::submit('save',['type' => 'submit', 'class' => 'btn btn-outline-warning px-4 edit-delete-button']) !!}
        </div>
    </div>
</div>
