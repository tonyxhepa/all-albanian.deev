@extends('layouts.admin')


@section('content')

    <h1>Edit Post</h1>

    <div class="row">

        @if(count($post->photos) >= 1)
            @foreach($post->photos as $photo)
                <div class="col-sm-2">
                    <div class="thumbnail">
                        <form method="post" action="/photos/{{ $photo->id }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit">delete</button>
                        </form>
                        <img height ="100"src ="{{ asset('storage').$photo->threezerozero }}" alt=""class ="img-rounded
                            ">
                    </div>
                </div>
            @endforeach

            {{--<td><img height ="50"src ="{{ $photo->path ? $photo->path : 'http://placehold.it/400x400' }}" alt=""></td>--}}

        @else
            <td><img height ="50"src ="{{ 'http://placehold.it/200x200' }}" class ="img-responsive img-rounded" alt=""></td>
        @endif

    </div>
    @if(count($post->photos) <= 5)
    <div class="form-group">
        <form id="addPhotosForm" action="{{ action('Admin\ArgetimController@addPhoto', $post->id) }}"
              class="dropzone"
              id="my-awesome-dropzone">
            {{ csrf_field() }}
        </form>
    </div>
    @endif

    @if($post->argetim_cats->id == 3)
    <form method="post" action="{{ action('Admin\ArgetimController@addEmbed', $post->id) }}">
        {{ csrf_field() }}
        <label for="url">Url</label>
        <input type="text" name="url">
        <button type="submit" class="bn btn-primary">Add Url</button>
    </form>
    @endif
    <form method="POST" action="{{ route('argetim.update', $post->id) }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label  for="title">Title</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control">
        </div>
        <div id="app">
            <div class="form-group">
                <label for="argetim_cats_id">argetim category</label>
                <select name="argetim_cats_id" id="argetim_cats_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                    <option value="{{ old('argetim_cats_id', $post->argetim_cats->id) }}">{{ old('argetim_cats_id', $post->argetim_cats->name) }}</option>
                    @foreach($argetim_cats as $item => $value)
                        <option value="{{ $item }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="pershkrimi">Pershkrimi</label>
            <textarea name="pershkrimi" class="form-control" rows="10">{{ old('pershkrimi', $post->pershkrimi) }}</textarea>
        </div>
        <div class="form-group">
            <label for="publikuesi">publikuesi</label>
            <input type="text" name="publikuesi" value="{{ old('publikuesi', $post->publikuesi) }}" class="form-control">

        </div>

        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary">
        </div>

    </form>



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

    @endsection