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
                    Posto shitjen tende
                </div>
                <div class="panel-body" style="background-color: #7da8c3">
    <form method="POST" action="{{ url(Auth::user()->slug. '/profile/shitjetemia') }}" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label  for="title" class="col-sm-4 control-label">Title</label>
            <div class="col-sm-18 col-sm-offset-2">
                <input type="text" name="title" class="form-control">
            </div>
        </div>
        <div id="app">
            <div class="form-group">
                <label for="shitje_cats_id" class="col-sm-4 control-label">Kategoria</label>
                <div class="col-sm-18 col-sm-offset-2">
                    <select name="shitje_cats_id" id="shitje_cats_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                        <option value="">--- Select Category ---</option>
                        @foreach($shitje_cats as $item => $value)
                            <option value="{{ $item }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
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
                <label for="title" class="col-sm-4 control-label">Zgjidh Qytetin</label>
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
                <input type="submit" name="create" class="btn btn-primary">
            </div>
        </div>

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