@extends('layouts.profile')
@section('menu')
    @include('layouts.profile-menu')
    @endsection

@section('content')

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
        @else
            <td><img height ="50"src ="{{ 'http://placehold.it/200x200' }}" class ="img-responsive img-rounded" alt=""></td>
        @endif

    </div>
    <hr>
    <div class="row">
        @if(count($post->photos) <= 5)
            <div class="form-group">
                <form id="addPhotosForm" action="{{ url($user->slug. '/profile/elektroniketemia/'. $post->id. '/photos') }}"
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
                    <form method="POST" action="{{ route('elektroniketemia.update', [Auth::user()->slug,$post->id]) }}" enctype="multipart/form-data" class="form-horizontal">
                        {!! csrf_field() !!}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group">
                            <label  for="title" class="col-sm-4 control-label">Title</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="text" id="title" value="{{ old('title', $post->title) }}" name="title" class="form-control">
                            </div>
                        </div>

                        <div id="app">
                            <div class="form-group">
                                <label for="car_make_id" class="col-sm-4 control-label">Category</label>
                                <div class="col-sm-18 col-sm-offset-2">
                                    <select name="elektronik_cats_id" id="elektronik_cats_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                                        <option value="{{ $post->elektronik_cats->id }}">{{ $post->elektronik_cats->name }}</option>
                                        @foreach($elektronik_cats as $item => $value)
                                            <option value="{{ $item }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pershkrimi" class="col-sm-4 control-label">Pershkrimi</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <textarea name="pershkrimi" class="form-control" rows="10">{{ old('pershkrimi', $post->pershkrimi) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="email" name="email" value="{{ old('email', $post->email) }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-4 control-label">Phone</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="number" name="phone" value="{{ old('phone', $post->phone) }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kompania" class="col-sm-4 control-label">Kompania</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="text" name="kompania" value="{{ old('kompania', $post->kompania) }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-4 control-label">Price</label>
                            <div class="col-sm-18 col-sm-offset-2">
                                <input type="number" name="price" value="{{ old('price', $post->price) }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-18 col-sm-offset-6">
                                <input type="submit" name="update" class="btn btn-primary">
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