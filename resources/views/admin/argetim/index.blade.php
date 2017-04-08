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

        @if($argetims)

            @foreach($argetims as $post)

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

                    <td><a href="{{route('argetim.edit', $post->id)}}">{{ $post->user->name }}</a></td>
                    <td>{{ $post->argetim_cats ? $post->argetim_cats->name : 'Uncategorized' }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ str_limit($post->pershkrimi, 20) }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                </tr>

            @endforeach

        @endif

        </tbody>
    </table>

@endsection
@section('scripts')
    <script src="{{asset('js/vue.js')}}"></script>
    {{--<script type="text/javascript" href="js/app.js"></script>--}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="country_id"]').on('change', function() {
                var country_idID = $(this).val();
                if(country_idID) {
                    $.ajax({
                        url: '/mycityform/ajax/'+country_idID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {


                            $('select[name="city_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="city"]').empty();
                }
            });
        });
    </script>

    <script>
        var app1 = new Vue({
            el: "#app-1",
            data: {
                disableWhenSelect: false,
                country_id: "",
                cityModel: "",
                cityModelShow: false,
            }, methods: {
                getCountryModel: function () {
                    if (this.country_id !== '') {
                        this.cityModelShow = true;
                    } else {
                        this.cityModelShow = false;
                    }

                }
            }
        });
    </script>


@endsection