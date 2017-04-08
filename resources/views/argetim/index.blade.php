@extends('layouts.app')

@section('menu')
    @include('layouts.app-menu')
    @endsection
@section('content')
    <div class="container">
        {{--<div class="row">--}}
            {{--@include('argetim.search-box')--}}
        {{--</div>--}}
    </div>
    <div class="container">
        <div class="row">

            @foreach($argetimet as $argetimi)
                @if(count($argetimi->photos) >= 1)
                    <img src="{{ asset('storage').$argetimi->photos->first()->threezerozero }}">
                @else
                    <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                @endif
                {{ $argetimi->title }}
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
