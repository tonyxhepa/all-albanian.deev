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
                <div class="embed-responsive embed-responsive-16by9">
                    <blockquote class="embedly-card"><h4><a href="https://www.miniclip.com/games/8-ball-pool-multiplayer/en/#t-w-t-H">8 Ball Pool - A free Sports Game</a></h4><p>Play 8 Ball Pool - Play 8 Ball Pool against other players online!</p></blockquote>

                </div>

                     </div>
        </div>
    </div>
    @endsection
@section('scripts')
    <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
    @endsection
@section('footer')
    @include('layouts.footer')
    @endsection