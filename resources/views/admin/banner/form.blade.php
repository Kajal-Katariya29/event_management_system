<div class="col-12 mt-3">
    {!! Form::label("title", "Title :") !!}
    {!! Form::text("title", null, ['class' => 'form-control title', 'id' => 'title']) !!}
    {!! $errors->first("title",'<span class="text-danger">:message</span>') !!}
</div>
<div class="col-12 mt-3">
    {!! Form::label("description", "Description :") !!}
    {!! Form::textarea("description", null, ['class' => 'form-control description', 'id' => 'description']) !!}
    {!! $errors->first("description",'<span class="text-danger">:message</span>') !!}
</div>
<div class="col-12 mt-3">
    {!! Form::label("image", "Image :") !!}
    {!! Form::file("image",  ['class' => 'form-control image', 'id' => 'image']) !!}
    {!! Form::hidden("old_image", $bannerData ? $bannerData->image : '') !!}

    @if(!empty($bannerData) && !empty($bannerData->image))
        <img src="{{asset('admin/images/banners/'.$bannerData->banner_id.'/'.$bannerData->image)}}" alt="{{$bannerData->image}}" class="img-fluid pt-2" height="500" width="500" />
    @endif

    {!! $errors->first("image",'<span class="text-danger">:message</span>') !!}
</div>
<div class="mt-3">
    <div class="d-flex flex-row bd-highlight mb-3">
        <a class="btn btn-outline-warning edit-delete-button me-2" href="{{ route('banner.index') }}">Cancel</a>
        {!! Form::submit('save',['type' => 'submit', 'class' => 'btn btn-outline-warning px-4 edit-delete-button']) !!}
    </div>
</div>
