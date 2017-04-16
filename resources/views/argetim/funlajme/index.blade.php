@extends('layouts.app')

@section('menu')
    @include('layouts.app-menu')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-24">
                <div class="row">
                    @if($fun_lajme)
                        @foreach($fun_lajme as $fun)
                            <div class="col-sm-6">
                                <a href="{{ url('/argetim/funlajme/'. $fun->slug) }}">
                                    @if(count($fun->photos) >= 1)
                                        <img class="img-responsive" src="{{ asset('storage').$fun->photos->first()->threezerozero }}">
                                    @endif
                                    {{ $fun->title }}
                                    <p>{{ $fun->pershkrimi }}</p>
                                    <span>{{ $fun->publikuesi }}</span>
                                </a>

                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
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
