@extends('layouts.app')
@section('header')

    @endsection
@section('menu')
    @include('layouts.app-menu')
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-24">
                @if($filmet)
                    @foreach($filmet as $barsoleta)
                        <div class="col-sm-6">
                            <a href="{{ url('/magazina/'. $barsoleta->slug) }}">
                                @if(count($barsoleta->photos) >= 1)
                                    <img class="img-responsive" src="{{ asset('storage').$barsoleta->photos->first()->threezerozero }}">
                                @else
                                    <img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                                @endif
                                {{ $barsoleta->title }}
                            </a>

                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    @endsection
@section('scripts')

    @endsection
@section('footer')
    @include('layouts.footer')
    @endsection