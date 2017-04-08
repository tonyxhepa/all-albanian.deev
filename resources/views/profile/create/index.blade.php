@extends('layouts.profile')

@section('content')
    <h1>Create Post</h1>
    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
    <form method="POST" action="{{ url('proile/' . Auth::user()->slug). '/create' }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label  for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div id="app">
            <div class="form-group">
                <label for="tech_cats_id">argetim category</label>
                <select name="tech_cats_id" id="tech_cats_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                    <option value="">--- Select Category ---</option>
                    @foreach($tech_cats as $item => $value)
                        <option value="{{ $item }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="app-1">
            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="country_id" id="country_id" class="form-control" v-model="country_id" v-on:change="getCountryModel()" v-bind:disabled="disableWhenSelect">
                    <option value="">--- Select State ---</option>
                    @foreach ($countries as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" v-show="cityModelShow">
                <label for="title">Select City:</label>
                <select name="city_id" class="form-control" v-model="cityModel">
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="pershkrimi">Pershkrimi</label>
            <textarea name="pershkrimi" class="form-control" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="publikuesi">publikuesi</label>
            <input type="text" name="publikuesi" class="form-control">

        </div>

        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary">
        </div>

    </form>

    @include('includes.form-error')

@endsection
@section('scripts')
    <script src="{{asset('js/vue.js')}}"></script>
    {{--<script type="text/javascript" href="js/app.js"></script>--}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="country_id"]').on('change', function() {
                var country_idID = $(this).val();
                if(country_idID) {
                    $.ajax({
                        url: '/mycityform/ajax/'+country_idID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {


                            $('select[name="city_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="city"]').empty();
                }
            });
        });
    </script>


    <script>
        var app1 = new Vue({
            el: "#app-1",
            data: {
                disableWhenSelect: false,
                country_id: "",
                cityModel: "",
                cityModelShow: false,
            }, methods: {
                getCountryModel: function () {
                    if (this.country_id !== '') {
                        this.cityModelShow = true;
                    } else {
                        this.cityModelShow = false;
                    }

                }
            }
        });
    </script>


@endsection