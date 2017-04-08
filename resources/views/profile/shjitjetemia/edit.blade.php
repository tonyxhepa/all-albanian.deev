@extends('layouts.profile')
@section('menu')
    @include('layouts.profile-menu')
    @endsection

@section('content')

    <h1>Edit Post</h1>

    <div class="row">
        @if(count($post->photos) >= 1)
            <div class="panel panel-danger">
                    <div class="panel-heading">
                        Kliko mbi x per te fshire foton
                    </div>
                    <div class="panel-body">
            @foreach($post->photos as $photo)
                <div class="col-sm-6">
                    <div class="alert alert-dismissible alert-warning">
                        <form method="post" action="/photos/{{ $photo->id }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="close" >&times;</button>
                        </form>
                        <img height ="100"src ="{{ asset('storage').$photo->threezerozero }}" alt=""class ="img-rounded
                            ">
                    </div>
                </div>
            @endforeach
            </div>
        </div>
            {{--<td><img height ="50"src ="{{ $photo->path ? $photo->path : 'http://placehold.it/400x400' }}" alt=""></td>--}}

        @else
            <td><img height ="50"src ="{{ 'http://placehold.it/200x200' }}" class ="img-responsive img-rounded" alt=""></td>
        @endif
    </div>
    <hr>
    <div class="row">
        @if(count($post->photos) <= 5)
            <div class="form-group">
                <form id="addPhotosForm" action="{{ url($user->slug. '/profile/shitjetemia/'. $post->id .'/photos') }}"
                      class="dropzone"
                      id="my-awesome-dropzone">
                    {{ csrf_field() }}
                </form>
            </div>
        @endif
        <hr>
    </div>

    <div class="row">
        <div class="col-sm-24">
            <div class="panel panel-primary">
                <div class="panel-heading">Ndryshoje Postimin</div>
                <div class="panel-body" style="background-color: #7da8c3">
    <form method="POST" action="{{ route('shitjetemia.update', [Auth::user()->slug,$post->id]) }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label  for="title">Title</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control">
        </div>
        <div id="app">
            <div class="form-group">
                <label for="shitje_cats_id">argetim category</label>
                <select name="shitje_cats_id" id="shitje_cats_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                    <option value="{{ old('shitje_cats_id', $post->shitje_cats->id) }}">{{ old('shitje_cats_id', $post->shitje_cats->name) }}</option>
                    @foreach($shitje_cats as $item => $value)
                        <option value="{{ $item }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="app-1">
            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="country_id" id="country_id" class="form-control" v-model="country_id" v-on:change="getCountryModel()" v-bind:disabled="disableWhenSelect">
                    <option value="{{ old('country_id', $post->country->id) }}">{{ old('country_id', $post->country->name) }}</option>
                    @foreach ($countries as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" v-show="cityModelShow">
                <label for="title">Select City:</label>
                <select name="city_id" class="form-control" v-model="cityModel">
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="pershkrimi">Pershkrimi</label>
            <textarea name="pershkrimi" class="form-control" rows="10">{{ old('pershkrimi', $post->pershkrimi) }}</textarea>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input value="{{ old('email', $post->email) }}" type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input value="{{ old('phone', $post->phone) }}" type="number" name="phone" class="form-control">
        </div>

        <div class="form-group">
            <label for="kompania">komapnia</label>
            <input value="{{ old('sip', $post->kompania) }}" type="text" name="kompania" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input value="{{ old('prica', $post->price) }}" type="number" name="price" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary">
        </div>

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