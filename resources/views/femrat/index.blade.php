@extends('layouts.app')

@section('menu')
    @include('layouts.app-menu')
    @endsection
@section('content')
    <section>
        <div class="container">


            <div class="row header-row">
                <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24">

                    <div class="row header-row">
                        @foreach($bukuri_nje as $epara)

                                <div class="col-sm-12">
                                    @if(count($epara->photos) >= 1)
                                        <img class="img-responsive height-233"  src="{{ asset('storage').$epara->photos->first()->thumbnail }}" alt="">
                                    @endif
                                </div>
                            <a href="{{ url('/femrat/'. $epara->slug) }}">
                                <div class="col-sm-12">
                                    <h3>{{ $epara->title }}</h3>
                                    <p>{{ $epara->pershkrimi }}</p>
                                </div>
                            </a>

                        @endforeach
                    </div>
                    <div class="row header-row">
                        @foreach($familja_kater as $tre)
                            <div class="col-sm-6 hover" >

                                <a href="{{ url('/femrat/'. $tre->slug) }}">
                                    @if(count($tre->photos) >= 1)
                                        <img class="img-responsive" src="{{ asset('storage').$tre->photos->first()->threezerozero }}">
                                    @endif
                                    <p class="max-lines">{{ $tre->title }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 col-sm-24 col-xs-24">
                    <div class="row header-row">
                        @foreach($mode_kater as $katerta)
                            <div class="col-sm-12 col-xs-24">
                                <a href="{{ url('/femrat/'. $katerta->slug) }}">

                                    <div class="imageHolder">
                                        @if(count($katerta->photos) >= 1)
                                            <img class="img-responsive height-233" src="{{ asset('storage').$katerta->photos->first()->thumbnail }}">
                                        @endif
                                        <h3 class="caption-bottom">{{ $katerta->title }}</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="{{ url('/femrat/Mode/') }}">Mode</a>
                    </li>

                    <li class="pull-right hidden-xs">
                        <a href="{{ url('/femrat/mode/') }}">Te gjitha</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($modat as $moda)
                <div class="col-xs-16 col-sm-8 col-md-4">
                    <a href="{{ url('/femrat/'. $moda->slug) }}">
                        @if(count($moda->photos) >= 1)
                            <img class="img-responsive" src="{{ asset('storage'). $moda->photos->first()->threezerozero }}">
                        @endif
                        <p>{{ $moda->title }}</p>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
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
