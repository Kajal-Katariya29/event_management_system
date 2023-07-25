<div class="col-12 mt-3">
    {!! Form::label("first_name", "First Name :") !!}
    {!! Form::text("first_name", null, ['class' => 'form-control first_name', 'id' => 'first_name']) !!}
    {!! $errors->first("first_name",'<span class="text-danger">:message</span>') !!}
</div>
<div class="col-12 mt-3">
    {!! Form::label("last_name", "Last Name :") !!}
    {!! Form::text("last_name", null, ['class' => 'form-control last_name', 'id' => 'last_name']) !!}
    {!! $errors->first("last_name",'<span class="text-danger">:message</span>') !!}
</div>
<div class="col-12 mt-3">
    {!! Form::label("email", "Email :") !!}
    {!! Form::text("email", null, ['class' => 'form-control email', 'id' => 'email']) !!}
    {!! $errors->first("email",'<span class="text-danger">:message</span>') !!}
</div>
@if (empty($userData))
    <div class="col-12 mt-3">
        {!! Form::label("password", "Password :") !!}
        {!! Form::password("password", ['class' => 'form-control password', 'id' => 'password']) !!}
        {!! $errors->first("password",'<span class="text-danger">:message</span>') !!}
    </div>
@endif
<div class="col-12 mt-3">
    {!! Form::label("phone_number", "Phone Number :") !!}
    {!! Form::text("phone_number", null, ['class' => 'form-control phone_number', 'id' => 'phone_number']) !!}
    {!! $errors->first("phone_number",'<span class="text-danger">:message</span>') !!}
</div>
<div class="mt-3">
    {!! Form::submit('save',['type' => 'submit', 'class' => 'btn btn-outline-warning px-4 edit-delete-button']) !!}
</div>
