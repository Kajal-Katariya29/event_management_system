<div class="col-12 mt-3">
    {!! Form::label("name", "Country:") !!}
    {!! Form::text("name", null, ['class' => 'form-control name', 'id' => 'name']) !!}
    {!! $errors->first("name",'<span class="text-danger">:message</span>') !!}
</div>
<div class="mt-3">
    <div class="d-flex flex-row bd-highlight mb-3">
        <a class="btn btn-outline-warning edit-delete-button me-2" href="{{ route('countries.index') }}">Cancel</a>
        {!! Form::submit('save',['type' => 'submit', 'class' => 'btn btn-outline-warning px-4 edit-delete-button']) !!}
    </div>
</div>
