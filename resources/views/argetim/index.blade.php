@extends('layouts.app')

@section('menu')
    @include('layouts.app-menu')
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="news-row-menu">
                <ul class="list-inline">
                    <li>
                        <a style="color: #eb9316" href="{{ url('/argetim/barsoleta') }}">Barsoleta</a>
                    </li>

                    <li class="pull-right hidden-xs">
                        <a href="{{ url('/argetim/barsoleta') }}">Te gjitha</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($argetimet_barsoleta as $al)
                <div class="col-xs-16 col-sm-8 col-md-4">
                    <a href="{{ url('/argetim/barsoleta/'. $al->slug) }}">
                        @if(count($al->photos) >= 1)
                            <img class="img-responsive" src="{{ asset('storage'). $al->photos->first()->threezerozero }}">
                        @endif
                        <p>{{ $al->title }}</p>
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
