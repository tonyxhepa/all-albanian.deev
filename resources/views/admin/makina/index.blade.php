@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_post'))

        <p class="alert alert-danger">{{ session('deleted_post') }}</p>

    @endif

    @if(Session::has('created_post'))

        <p class="alert alert-success">{{ session('created_post') }}</p>

    @endif

    @if(Session::has('updated_post'))

        <p class="alert alert-info">{{ session('updated_post') }}</p>

    @endif

    <h1>All Posts</h1>
    <hr>
    @if($makinat)
        {{ $makinat->total() }}
        <p>{{ $makinat->count() }} makina gjithsej</p>
        <div class="row">
        @foreach($makinat as $post)

                <div class="col-md-3">
                    <div class="thumbnail">
                        <h4>
                            Post Thumbnail List
                            <span class="label label-info info">
                        <span data-toggle="tooltip" title="viewed">257 <b class="glyphicon glyphicon-eye-open"></b></span>
                        <span data-toggle="tooltip" title="viewed">3 <b class="glyphicon glyphicon-star"></b></span>
                        <span data-toggle="tooltip" title="Bootstrap version">3.0.3</span>
                    </span>
                        </h4>
                        @if(count($post->photos) >= 1)
                            <div class="count-photos">{{ count($post->photos) }}</div>
                            <img src="{{ asset('storage').$post->photos->first()->threezerozero }}" alt="...">
                        @endif
                        <article>{{ $post->pershkrimi }}</article>
                        <a href="http://bootsnipp.com/snippets/featured/post-thumbnail-list" class="btn btn-primary col-xs-12" role="button">View Snippet</a>
                        <div class="clearfix"></div>
                    </div>
                </div>

        @endforeach{{ $makinat->links() }} </div>
    @else
    <p>Ju nuk keni makina</p>
@endif


@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready( function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    @endsection