@extends('layouts.app')

@section('menu')
    @include('layouts.app-menu')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                @if(Session::has('message'))
                    <div class="alert alert-danger">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
            <form method="get" action="{{ url('/makina/kerko') }}">
                <input type="text" name="search" class="form-control">
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            @include('includes.form-error')
        </div>
    </div>
    <div class="container">
       @if(count($get_tech) > 0)
            @foreach(array_chunk($get_tech->all(), 4) as $row)
                <div class="row">
                    @foreach($row as $tech)
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            @if(count($tech->photos) >= 1)
                                <img class="img-responsive" src="{{ asset('storage').$tech->photos->first()->threezerozero }}">
                            @else
                                <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                            @endif
                            <div class="pull-left">
                                {{ $tech->title }}
                            </div>

                        </div>
                    @endforeach

                </div>
            @endforeach
            {{ $get_tech->appends(Request::only('search'))->links() }}
       @else
<p>nuk ka makina</p>
        @endif
    </div>
@endsection
