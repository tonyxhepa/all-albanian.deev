@extends('layouts.profile')
@section('menu')
    @include('layouts.app-menu')
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">Profili im</div>
        <div class="panel-body">
            <ul class="list-group">
                <li class="list-group-item"><span class="label label-primary">Arsimi</span> {{ $profile->arsimi }}</li>
                <li class="list-group-item"><span class="label label-primary">Adresa</span> {{ $profile->adresa }}</li>
                <li class="list-group-item"><span class="label label-primary">Gjinia</span> {{ $profile->gjinia->name }}</li>
                <li class="list-group-item"><span class="label label-primary">Email</span> {{ $profile->email }}</li>
                <li class="list-group-item"><span class="label label-primary">Celulari</span> {{ $profile->cel }}</li>
            </ul>
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