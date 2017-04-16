@extends('layouts.lajme')

@section('menu')
    @include('layouts.lajme-menu')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach($lajmet_mk as $lajme)
                <div class="col-lg-12 col-md-12 col-sm-24 col-xs-24">
                    <article>
                        <div class="row">
                            <div class="col-sm-12 col-md-8">
                                <figure>
                                    @if(count($lajme->photos) >= 1)
                                        <img class="img-responsive" src="{{ asset('storage'). $lajme->photos->first()->threezerozero }}">
                                    @endif
                                </figure>
                            </div>
                            <div class="col-sm-12 col-md-16">
                                {{--<span class="label label-default pull-right"><i class="glyphicon glyphicon-comment"></i>50</span>--}}
                                <h4>{{ $lajme->title }}</h4>
                                <p>{{ $lajme->pershkrimi }}</p>
                                <section>
                                    <i class="glyphicon glyphicon-folder-open"></i>{{ $lajme->publikuesi }}
                                    {{--<i class="glyphicon glyphicon-user"></i>RaymondDragon--}}
                                    <i class="glyphicon glyphicon-calendar"></i>{{ $lajme->updated_at->diffForHumans() }}
                                    {{--<i class="glyphicon glyphicon-eye-open"></i>10000--}}
                                    <a href="{{ url('/lajme/'.$lajme->slug) }}" class="btn btn-default btn-sm pull-right">More ... </a>
                                </section>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
            <span class="pagination">{{ $lajmet_mk->links() }}</span>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/vue.js')}}"></script>
    {{--<script type="text/javascript" href="js/app.js"></script>--}}



@endsection
@section('footer')
    @include('layouts.footer')
    @endsection
