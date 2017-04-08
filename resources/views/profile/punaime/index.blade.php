@extends('layouts.profile')
@section('menu')
    @include('layouts.profile-menu')
    @endsection
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

        @if($puna)
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Punet e mia
                        <span class="badge">{{ count($puna) }}</span>
                    </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Profesioni</th>
                            <th>Photo</th>
                            <th>orari</th>
                            <th>Shteti</th>
                            <th>Titulli</th>
                            <th>Rroga</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Kompania</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>editoje</th>
                            <th>Fshije</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($puna as $post)
                            <tr>
                                <td> {{ $post->profesioni->name }}</td>

                                @if(count($post->photos) >= 1)
                                    {{--@foreach($user->photos as $photo)--}}

                                    <td><img height ="75" width="75" src ="{{ asset('storage').$post->photos->first()->threezerozero }}" alt=""  class="img-circle"></td>
                                    {{--@endforeach--}}

                                    {{--<td><img height ="50"src ="{{ $photo->path ? $photo->path : 'http://placehold.it/400x400' }}" alt=""></td>--}}

                                @else
                                    <td><img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle"></td>
                                @endif
                                <td>{{ $post->orari->name }}</td>
                                <td>{{ $post->country->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->price }}</td>
                                <td>{{ $post->email }}</td>
                                <td>{{ $post->phone }}</td>
                                <td>{{ $post->kompania }}</td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>{{ $post->updated_at->diffForHumans() }}</td>
                                <td><a href="{{ url(Auth::user()->slug. '/profile/punaime/'. $post->id .'/edit') }}"><button class="btn btn-circle btn-primary">edit</button></a> </td>
                                <td>{!! Form::open(['method'=>'DELETE', 'action'=>['Profile\ProfilePunaController@destroy', Auth::user()->slug, $post->id]]) !!}

                                    <div class="form-group">
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-circle']) !!}
                                    </div>
                                    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>

        @else
    <h3>Nuk keni publikuar asgje</h3>
@endif




@endsection