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
    <div class="row">
        <div class="col-sm-24">
            <div class="panel panel-primary">
                <div class="panel-heading">Posto pronen tende</div>
                <div class="panel-body" style="background-color: #7da8c3">
                    <form method="POST" action="{{ url(Auth::user()->slug.'/profile/pronaime') }}" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <fieldset>
                        <div class="form-group">
                            <label  for="title" class="col-sm-4 control-label">Titulli</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group" v-show="cityModelShow">
                            <label for="lloji" class="col-sm-4 control-label">LLoji:</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <select name="lloji" class="form-control">
                                    <option value="shitet">Shitet</option>
                                    <option value="qera">Jepet me qera</option>
                                </select>
                            </div>
                        </div>
                        <div id="app">
                            <div class="form-group">
                                <label for="prona_cats_id" class="col-sm-4 control-label">Kategoria</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <select name="prona_cats_id" id="prona_cats_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                                        <option value="">--- Select Category ---</option>
                                        @foreach ($prona_cats as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
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
                            <label for="rruga" class="col-sm-4 control-label">Rruga</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="text" name="rruga" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sip" class="col-sm-4 control-label">Siperfaqja</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <div class="input-group">
                                    <input type="number" name="sip" class="form-control">
                                    <span class="input-group-addon">M<sup>2</sup></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-sm-4 control-label">Cmimi</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <div class="input-group">
                                    <input type="number" name="price" class="form-control">
                                    <span class="input-group-addon">&euro;</span>
                                </div>
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