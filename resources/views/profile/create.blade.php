@extends('layouts.profile')
@section('menu')
    @include('layouts.profile-menu')
    @endsection

@section('content')
    <h1>Create Post</h1>
    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
    <form method="POST" action="{{ url(Auth::user()->slug. '/profile') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

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
            <label for="gjinia_id">Select Gjinia:</label>
            <select name="gjinia_id" class="form-control">
                <option value="">--- Select Gjinia ---</option>
                @foreach($gjinia as $item => $value)
                    <option value="{{ $item }}">{{ $value }}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="arsimi">Arsimi</label>
            <input type="text" name="arsimi" class="form-control" rows="10"></input>
        </div>

        <div class="form-group">
            <label for="adresa">Adresa</label>
            <input type="text" name="adresa" class="form-control" rows="10"></input>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" rows="10"></input>
        </div>

        <div class="form-group">
            <label for="cel">Celulari</label>
            <input type="text" name="cel" class="form-control" rows="10"></input>
        </div>

        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary">
        </div>

    </form>

    @include('includes.form-error')

@endsection
@section('scripts')
    <script>
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