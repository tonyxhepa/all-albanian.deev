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

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($shitjet)

            @foreach($shitjet as $post)

                <tr>
                    <td>{{ $post->id }}</td>

                    @if(count($post->photos) >= 1)
                        {{--@foreach($user->photos as $photo)--}}

                        <td><img height ="75" width="75" src ="{{ asset('storage').$post->photos->first()->threezerozero }}" alt=""  class="img-circle"></td>
                        {{--@endforeach--}}

                        {{--<td><img height ="50"src ="{{ $photo->path ? $photo->path : 'http://placehold.it/400x400' }}" alt=""></td>--}}

                    @else
                        <td><img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle"></td>
                    @endif

                    <td><a href="{{route('shitje.edit', $post->id)}}">{{ $post->user->name }}</a></td>
                    <td>{{ $post->lcategory ? $post->lcategory->name : 'Uncategorized' }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ str_limit($post->body, 20) }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                </tr>

            @endforeach

        @endif

        </tbody>
    </table>




@endsection