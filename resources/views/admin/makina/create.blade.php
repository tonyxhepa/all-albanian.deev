@extends('layouts.admin')


@section('content')
        <h1>Create Post</h1>
        @if(session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
        <form method="POST" action="{{ url('admin/makina') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label  for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div id="app">
                <div class="form-group">
                    <label for="car_make_id">Car Make</label>
                    <select name="car_make_id" id="car_make_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                        <option value="">--- Select Car ---</option>
                        @foreach($carmake as $item => $value)
                            <option value="{{ $item }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    <div class="form-group" v-show="modelShow">
                        <label for="car_model_id">Car Model</label>
                        <select name="car_model_id" class="form-control" v-model="carModel">
                        </select>
                    </div>

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
                <label for="email">email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">phone</label>
                <input type="number" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="viti">Viti</label>
                <input type="date" name="viti" class="form-control">
            </div>
            <div class="form-group">
                <label for="karburanti">Karburanti</label>
                <input type="text" name="karburanti" class="form-control">
            </div>
            <div class="form-group">
                <label for="kamio">kamio</label>
                <input type="text" name="kamio" class="form-control">
            </div>
            <div class="form-group">
                <label for="dogana">dogana</label>
                <input type="text" name="dogana" class="form-control">
            </div>

            <div class="form-group">
                <label for="ngjyra">Ngjyra</label>
                <input type="text" name="ngjyra" class="form-control">
            </div>

            <div class="form-group">
                <label for="km">KM</label>
                <input type="number" name="km" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control">
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
            $('select[name="car_make_id"]').on('change', function() {
                var car_make_idID = $(this).val();
                if(car_make_idID) {
                    $.ajax({
                        url: '/mycarform/ajax/'+car_make_idID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {


                            $('select[name="car_model_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="car_model_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="car_model_id"]').empty();
                }
            });
        });
    </script>
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
        var app = new Vue({
            el: "#app",
            data: {
                disableWhenSelect: false,
                car_make_id: "",
                carModel: "",
                modelShow: false,
            }, methods: {
                getCarModel: function () {
                    if (this.car_make_id !== '') {
                        this.modelShow = true;
                    } else {
                        this.modelShow = false;
                    }

                }
            }
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