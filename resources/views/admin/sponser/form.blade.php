<div class="col-12 mt-3">
    {!! Form::label("sponser_name", "Sponser Name :") !!}
    {!! Form::text("sponser_name", null, ['class' => 'form-control sponser_name', 'id' => 'sponser_name']) !!}
    {!! $errors->first("sponser_name",'<span class="text-danger">:message</span>') !!}
</div>
<div class="col-12 mt-3">
    {!! Form::label("sponser_level", "Sponser Level :") !!}
    {!! Form::text("sponser_level", null, ['class' => 'form-control sponser_level', 'id' => 'sponser_level']) !!}
    {!! $errors->first("sponser_level",'<span class="text-danger">:message</span>') !!}
</div>
<div class="col-12 mt-3">
    {!! Form::label("contact_info", "Contact Phone Number :") !!}
    {!! Form::text("contact_info", null, ['class' => 'form-control contact_info', 'id' => 'contact_info']) !!}
    {!! $errors->first("contact_info",'<span class="text-danger">:message</span>') !!}
</div>
<div class="mt-3">
    <div class="d-flex flex-row bd-highlight mb-3">
        <a class="btn btn-outline-warning edit-delete-button me-2" href="{{ route('sponser.index') }}">Cancel</a>
        {!! Form::submit('save',['type' => 'submit', 'class' => 'btn btn-outline-warning px-4 edit-delete-button']) !!}
    </div>
</div>
