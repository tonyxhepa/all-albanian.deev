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
        <div class="col-sm-24">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Posto punen tende
                </div>
                <div class="panel-body" style="background-color: #7da8c3">
                    <form method="POST" action="{{ url(Auth::user()->slug. '/profile/punaime') }}" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <fieldset>
                        <div class="form-group">
                            <label  for="title" class="col-sm-4 control-label">Title</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div id="app">
                            <div class="form-group">
                                <label for="profesioni_id" class="col-sm-4 control-label">Profesioni</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <select name="profesioni_id" id="profesioni_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                                        <option value="">--- Profesioni ---</option>
                                        @foreach($profesioni as $item => $value)
                                            <option value="{{ $item }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="app2">
                            <div class="form-group">
                                <label for="orari_id" class="col-sm-4 control-label">Orari</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <select name="orari_id" id="orari_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                                        <option value="">--- Orari ---</option>
                                        @foreach($orari as $item => $value)
                                            <option value="{{ $item }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="app-1">
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">Select State:</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <select name="country_id" id="country_id" class="form-control" v-model="country_id" v-on:change="getCountryModel()" v-bind:disabled="disableWhenSelect">
                                        <option value="">--- Select State ---</option>
                                        @foreach ($countries as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" v-show="cityModelShow">
                                <label for="title" class="col-sm-4 control-label">Select City:</label>
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
                            <label for="rroga" class="col-sm-4 control-label">Rroga</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="text" name="rroga" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-4 control-label">Phone</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="number" name="phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kompania" class="col-sm-4 control-label">kompania</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="text" name="kompania" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-sm-4 control-label">Price</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="number" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-18 col-sm-offset-6">
                                <button type="submit" class="btn btn-primary">Posto</button>

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