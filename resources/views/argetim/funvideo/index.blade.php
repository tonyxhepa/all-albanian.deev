@extends('layouts.app')

@section('header')


@endsection
@section('menu')
    @include('layouts.argetim-menu')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-18 col-xs-24">
                    @foreach($fun_video_1->embeds as $embeds)
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $embeds->url }}" frameborder="no" scrolling="no"></iframe>
                </div>
                        <article>{{ $fun_video_1->title }}</article>
                    @endforeach

            </div>


                    <div class="col-sm-6">

                        <ul class="media-list">
                            <li class="media">
                                @foreach($fun_video as $video)
                                <a href="{{ url('/argetim/funvideo/'. $video->slug) }}">
                                <div class="media-left">
                                    @foreach($video->embeds as $embeds)
                                        <img class="media-object" src="http://i1.ytimg.com/vi/{{ $embeds->url }}/default.jpg">
                                     @endforeach
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $video->title }}</h4>
                                   <p>{{ $video->pershkrimi }}</p>
                                </div></a>
                                @endforeach
                            </li>
                        </ul>
                        {{ $fun_video->links() }}
                    </div>


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