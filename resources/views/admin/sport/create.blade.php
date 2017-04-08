@extends('layouts.admin')


@section('content')
    <h1>Create Post</h1>
    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
    <form method="POST" action="{{ url('admin/sport') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label  for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div id="app">
            <div class="form-group">
                <label for="sport_cats_id">argetim category</label>
                <select name="competition_id" id="competition_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                    <option value="">--- Select Category ---</option>
                    @foreach($competitions as $item => $value)
                        <option value="{{ $item }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="app">
            <div class="form-group">
                <label for="sport_cats_id">argetim category</label>
                <select name="team_id" id="team_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                    <option value="">--- Select Category ---</option>
                    @foreach($teams as $item => $value)
                        <option value="{{ $item }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="pershkrimi">Pershkrimi</label>
            <textarea name="pershkrimi" class="form-control" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="publikuesi">publikuesi</label>
            <input type="text" name="publikuesi" class="form-control">

        </div>

        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary">
        </div>

    </form>

    @include('includes.form-error')

@endsection
@section('scripts')
    <script src="{{asset('js/vue.js')}}"></script>
    {{--<script type="text/javascript" href="js/app.js"></script>--}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="competition_id"]').on('change', function() {
                var competition_idID = $(this).val();
                if(competition_idID) {
                    $.ajax({
                        url: '/myteamform/ajax/'+competition_idID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {


                            $('select[name="team_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="team_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="team"]').empty();
                }
            });
        });
    </script>


    <script>
        var app1 = new Vue({
            el: "#app-1",
            data: {
                disableWhenSelect: false,
                competition_id: "",
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