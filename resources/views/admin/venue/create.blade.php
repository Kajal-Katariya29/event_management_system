@extends('admin.app')

@section('title')
    Add Venue Detail
@endsection

@section('body')
    <div class="container-fluid m-5">
        <h1 class="mt-4"> Add Venue </h1>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row m-5">
        {!! Form::open(['route' => 'venue.store', "method" => "post"]) !!}
        {!! Form::token() !!}
            @include('admin.venue.form', ['venueData' => null])
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')

<script>
    $(document).ready(function(){
        $("#selectCountry").on("change", function() {
            var countryId = this.value;
            var homeUrl = document.location.origin;
            $("#city").html("");
            $.ajax({
                url: homeUrl + "/admin/fetch-cities",
                type: "POST",
                data: {
                    country_id: countryId,
                },
                success: function(result) {
                    $("#city").html('<option value="">Select City</option>');
                    $.each(result.cities, function(key, value) {
                        $("#city").append(
                            '<option value="' +
                            value.city_id +
                            '">' +
                            value.name +
                            "</option>"
                        );
                    });
                },
                error: function(msg) {
                    console.log(msg);
                },
            });
        });
    });
</script>
@endsection
