<div class="row mt-5">
    <div class="col-6 mt-2">
        {!! Form::label("role_id", "Select Role : ") !!}
        {!! Form::select('role_id',$role_id, null, ['placeholder' => 'Select Role...', 'class' => 'form-select mt-2']) !!}
        {!! $errors->first("role_id",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="col-6 mt-2">
        {!! Form::label("user_id", "Select Permission : ") !!}
        {!! Form::select('user_id',$user_id, null, ['placeholder' => 'Select User...', 'class' => 'form-select mt-2']) !!}
        {!! $errors->first("user_id",'<span class="text-danger">:message</span>') !!}
    </div>
    <div class="mt-3">
        <div class="d-flex flex-row bd-highlight mb-3">
            <a class="btn btn-outline-warning edit-delete-button me-2" href="{{ route('role-user.index') }}">Cancel</a>
            {!! Form::submit('save',['type' => 'submit', 'class' => 'btn btn-outline-warning px-4 edit-delete-button']) !!}
        </div>
    </div>
</div>
