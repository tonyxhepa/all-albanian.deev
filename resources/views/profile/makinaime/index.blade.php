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

    @if($makinat)
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Makinat e mia
                    <span class="badge">{{ count($makinat) }}</span>
                </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Prodhuesi</th>
                                <th>Photo</th>
                                <th>Shteti</th>
                                <th>Titulli</th>
                                <th>Viti</th>
                                <th>Karburanti</th>
                                <th>cmimi</th>
                                <th>Updated</th>
                                <th>editoje</th>
                                <th>Fshije</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($makinat as $post)
                                <tr>
                                    <td> {{ $post->car_make->name }}</td>

                                    @if(count($post->photos) >= 1)
                                        {{--@foreach($user->photos as $photo)--}}

                                        <td><img height ="75" width="75" src ="{{ asset('storage').$post->photos->first()->threezerozero }}" alt=""  class="img-circle"></td>
                                        {{--@endforeach--}}

                                        {{--<td><img height ="50"src ="{{ $photo->path ? $photo->path : 'http://placehold.it/400x400' }}" alt=""></td>--}}

                                    @else
                                        <td><img height ="75"src ="{{ 'http://placehold.it/400x400' }}" alt=""  class="img-circle"></td>
                                    @endif

                                    <td>{{ $post->country->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->viti }}</td>
                                    <td>{{ $post->karburanti }}</td>
                                    <td>{{ $post->price }}</td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                                    <td><a href="{{ url(Auth::user()->slug. '/profile/makinaime/'. $post->id .'/edit') }}"><button class="btn btn-circle btn-primary">edit</button></a> </td>
                                    <td>{!! Form::open(['method'=>'DELETE', 'action'=>['Profile\ProfileMakinaController@destroy', Auth::user()->slug, $post->id]]) !!}

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
            <div class="pagination">{{ $makinat->links() }}</div>

        </div>
    @else
    <h3> nuk keni postuar akoma makinat e tua</h3>
    @endif

@endsection