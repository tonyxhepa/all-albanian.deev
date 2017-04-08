@extends('layouts.app')

@section('header')


@endsection
@section('menu')
    @include('layouts.argetim-menu')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach($fun_video as $video)
                @foreach($video->embeds as $embeds)
            <div class="col-sm-18 col-xs-24">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $embeds->url }}" frameborder="no" scrolling="no"></iframe>
                </div>

            </div>
                    <div class="col-sm-6">
                        <ul class="media-list">
                            <li class="media"> <a href="#">
                                <div class="media-left">

                                        <img class="media-object" src="http://i1.ytimg.com/vi/{{ $embeds->url }}/default.jpg">

                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $video->title }}</h4>
                                    ...
                                </div></a>
                            </li>
                        </ul>
                    </div>
                    @endforeach
            @endforeach

        </div>
    </div>
@endsection
@section('scripts')
    {{--<script>--}}
    // script per te reload page
        {{--setTimeout(function(){--}}
            {{--window.location.reload(1);--}}
        {{--}, 10000);--}}
    {{--</script>--}}
@endsection
@section('footer')
    @include('layouts.footer')
@endsection