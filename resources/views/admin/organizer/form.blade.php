<div class="col-12 mt-3">
    {!! Form::label("name", "Name :") !!}
    {!! Form::text("name", null, ['class' => 'form-control name', 'id' => 'name']) !!}
    {!! $errors->first("name",'<span class="text-danger">:message</span>') !!}
</div>
<div class="col-12 mt-3">
    {!! Form::label("contact_email", "Contact Email :") !!}
    {!! Form::text("contact_email", null, ['class' => 'form-control contact_email', 'id' => 'contact_email']) !!}
    {!! $errors->first("contact_email",'<span class="text-danger">:message</span>') !!}
</div>
<div class="col-12 mt-3">
    {!! Form::label("contact_phone", "Contact Phone Number :") !!}
    {!! Form::text("contact_phone", null, ['class' => 'form-control contact_phone', 'id' => 'phone_number']) !!}
    {!! $errors->first("contact_phone",'<span class="text-danger">:message</span>') !!}
</div>
<div class="mt-3">
    <div class="d-flex flex-row bd-highlight mb-3">
        <a class="btn btn-outline-warning edit-delete-button me-2" href="{{ route('organizer.index') }}">Cancel</a>
        {!! Form::submit('save',['type' => 'submit', 'class' => 'btn btn-outline-warning px-4 edit-delete-button']) !!}
    </div>
</div>
