@extends('layouts.admin')


@section('content')
        <h1>Create Post</h1>
        @if(session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
        <form method="POST" action="{{ url('admin/femrat') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label  for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div id="app">
                <div class="form-group">
                    <label for="femra_cats_id">argetim category</label>
                    <select name="femra_cats_id" id="femra_cats_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                        <option value="">--- Select Category ---</option>
                        @foreach($femra_cats as $item => $value)
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

@endsection