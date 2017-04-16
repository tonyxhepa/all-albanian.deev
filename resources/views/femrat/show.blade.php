@extends('layouts.app')
@section('header')
    <title>{{ $shiko_femrat->title }}</title>
    <link href="{{ asset('css/lightgallery.css') }}" rel="stylesheet">
    <script src="{{ asset('js/lightgallery.js') }}"></script>
@endsection
@section('menu')
        @include('layouts.app-menu')
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-24 col-sm-12 col-md-18">
                <div class="row">
                    <div class="pull-right">Publikuar: {{ $shiko_femrat->created_at->format('d M Y - H:i:s') }}</div>
                </div>
                <div class="row">
                    @if(count($shiko_femrat->photos) >=1)

                        <div id="aniimated-thumbnials">
                            @foreach($shiko_femrat->photos as $photo)
                                <a class="col-sm-6" href="{{ asset('storage').$photo->thumbnail }}" data-lightbox="roadtrip" data-title="{{ $shiko_femrat->title }}">
                                    <img class="thumbnail img-responsive" src="{{ asset('storage').$photo->threezerozero }}">
                                </a>
                            @endforeach
                        </div>


                    @endif
                </div>

                <div class="">
                    <h3> {{ $shiko_femrat->title }}</h3>
                    <div class="">{{ $shiko_femrat->pershkrimi }}</div>
                </div>
            </div>
            <div class="col-xs-24 col-sm-12 col-md-6">
                <h3>Te fundit</h3>
                @foreach($mnm as $mdm)
                    <div class="card-style-sm botom-solid">
                        <a href="{{ url('magazina/'. $mdm->slug) }}">
                            <div class="media">
                                <div class="media-left">
                                    @if(count($mdm->photos) >= 1)
                                        <img class="media-object card-img-sm" src="{{ asset('storage').$mdm->photos->first()->threezerozero }}">
                                    @else
                                        <img class="media-object card-img-sm" src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle">
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ str_limit($mdm->title, $limit = 12, $end = '...') }}</h4>
                                    <div class="members pull-left">{{ str_limit($mdm->pershkrimi, $limit = 45, $end = '...') }}</div>
                                </div>
                            </div>

                        </a>
                    </div>
                @endforeach
            </div>
            @include('includes.form-error')
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57f1735ebcfa6c0d"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script>
        $('#aniimated-thumbnials').lightGallery({
            thumbnail:true
        });
    </script>
@endsection
@section('footer')
    @include('layouts.footer')
    @endsection