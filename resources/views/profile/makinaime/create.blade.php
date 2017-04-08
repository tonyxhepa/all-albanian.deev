@inject('years', 'App\Http\Utilities\Year')
@extends('layouts.profile')
@section('menu')
    @include('layouts.profile-menu')
    @endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-24" >
            <div class="panel panel-primary">
                <div class="panel-heading">Posto Makinen tende</div>
                <div class="panel-body" style="background-color: #7da8c3">
                    <form method="POST" action="{{ url( Auth::user()->slug.'/profile/makinaime') }}" enctype="multipart/form-data" class="form-horizontal">

                        {{ csrf_field() }}
                        <fieldset>

                            <div class="form-group">
                                <label  for="title" class="col-sm-4 control-label">Titulli</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <input type="text" name="title" class="form-control">

                                </div>
                            </div>
                            <div id="app">
                                <div class="form-group">
                                    <label for="car_make_id" class="col-sm-4 control-label">Prodhuesi</label>
                                    <div class="col-sm-18 col-sm-offset-2">
                                        <select name="car_make_id" id="car_make_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                                            <option value="">--- Zgjidh Prodhuesin ---</option>
                                            @foreach($car_make as $item => $value)
                                                <option value="{{ $item }}">{{ $value }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group" v-show="modelShow">
                                <label for="car_model_id" class="col-sm-4 control-label">Modeli</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <select name="car_model_id" class="form-control" v-model="carModel">
                                    </select>
                                </div>
                            </div>

                            <div id="app-1">
                                <div class="form-group">
                                    <label for="title" class="col-sm-4 control-label">Shteti</label>
                                    <div class="col-sm-18 col-sm-offset-2">
                                        <select name="country_id" id="country_id" class="form-control" v-model="country_id" v-on:change="getCountryModel()" v-bind:disabled="disableWhenSelect">
                                            <option value="">--- Zgjidh Shtetin ---</option>
                                            @foreach ($countries as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" v-show="cityModelShow">
                                    <label for="title" class="col-sm-4 control-label">Zghidh Qytetin</label>
                                    <div class="col-sm-18 col-sm-offset-2">
                                        <select name="city_id" class="form-control" v-model="cityModel">
                                        </select>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="pershkrimi" class="col-sm-4 control-label">Pershkrimi</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <textarea name="pershkrimi" class="form-control" rows="10"></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-4 control-label">Telefoni</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <input type="number" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="viti" class="col-sm-4 control-label">Viti</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <select name="viti" class="form-control">
                                        @foreach($years::all() as $viti)
                                            <option value="{{ $viti }}">{{ $viti }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="karburanti" class="col-sm-4 control-label">Karburanti</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <select name="karburanti" class="form-control">
                                        <option value="Benzine">Benzine</option>
                                        <option value="Benzine/Gaz">Benzine/Gaz</option>
                                        <option value="Disel">Disel</option>
                                        <option value="Hibrid">Hibrid</option>
                                        <option value="Tjera">Tjera</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kamio" class="col-sm-4 control-label">kamio</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <select name="kamio" class="form-control">
                                        <option value="Manual">Manual</option>
                                        <option value="Automatik">Automatik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dogana" class="col-sm-4 control-label">dogana</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <select name="dogana" class="form-control">
                                        <option value="Shqiperi">Shqiperi</option>
                                        <option value="Kosove">Kosove</option>
                                        <option value="Maqedoni">Maqedoni</option>
                                        <option value="Maliizi">Mali i zi</option>
                                        <option value="tehuaja">Te huaja</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ngjyra" class="col-sm-4 control-label">Ngjyra</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <input type="text" name="ngjyra" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="km" class="col-sm-4 control-label">KM</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <div class="input-group">
                                        <input type="number" name="km" class="form-control">
                                        <span class="input-group-addon">KM</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price" class="col-sm-4 control-label">Price</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <div class="input-group">
                                        <input type="number" name="price" class="form-control">
                                        <span class="input-group-addon">euro</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-18 col-sm-offset-6">
                                    <button type="submit" name="Create" class="btn btn-primary">Posto</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>


    @include('includes.form-error')


@endsection
@section('scripts')
    <script type="text/javascript" src="{{ url('js/vue.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/dropzone.js') }}"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilesize: 3,
            maxFiles: 5,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        };
    </script>
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
            el: "#app2",
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


