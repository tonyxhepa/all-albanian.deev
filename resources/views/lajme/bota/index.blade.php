@extends('layouts.lajme')

@section('menu')
    @include('layouts.lajme-menu')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach($lajmet_bota as $lajme)
                <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24">
                    <article>
                        <div class="row">
                            <div class="col-sm-12 col-md-8">
                                <figure>
                                    @if(count($lajme->photos) >= 1)
                                        <img class="img-responsive" src="{{ asset('storage'). $lajme->photos->first()->threezerozero }}">
                                    @endif
                                </figure>
                            </div>
                            <div class="col-sm-12 col-md-16">
                                {{--<span class="label label-default pull-right"><i class="glyphicon glyphicon-comment"></i>50</span>--}}
                                <h4>{{ $lajme->title }}</h4>
                                <p>{{ $lajme->pershkrimi }}</p>
                                <section>
                                    <i class="glyphicon glyphicon-folder-open"></i>{{ $lajme->publikuesi }}
                                    {{--<i class="glyphicon glyphicon-user"></i>RaymondDragon--}}
                                    <i class="glyphicon glyphicon-calendar"></i>{{ $lajme->updated_at->diffForHumans() }}
                                    {{--<i class="glyphicon glyphicon-eye-open"></i>10000--}}
                                    <a href="{{ url('/lajme/'.$lajme->slug) }}" class="btn btn-default btn-sm pull-right">More ... </a>
                                </section>
                            </div>
                        </div>
                    </article>
                </div>

            @endforeach
                <span class="pagination">{{ $lajmet_bota->links() }}</span>
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
@section('footer')
    @include('layouts.footer')
    @endsection
