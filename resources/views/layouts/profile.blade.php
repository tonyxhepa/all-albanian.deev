<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'all-albanian') }}</title>

    <!-- Styles -->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="/css/profile.css" rel="stylesheet">
    <link href="/css/menu.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
    <link href="/css/dropzone.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ url('js/jquery.js') }}"></script>
    <script src="{{ url('js/bootstrap.js') }}"></script>


    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
@yield('menu')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    @if(Auth::user()->profile)
                        <div class="img-responsive">
                            @if(empty(Auth::user()->profile->avatar))
                                @if(Auth::user()->profile->gjinia == 'mashkull')
                                    <img src="{{ asset('storage/profile/male.jpg') }}">
                                @elseif(Auth::user()->profile->gjinia == 'femer')
                                    <img class="img-responsive" src="{{ asset('storage/profile/female.png') }}">
                                @endif
                            @else
                                <img class="img-responsive" src="{{ asset('storage'). Auth::user()->profile->avatar }}">
                            @endif
                        </div>
                        <div class="form-group" style="text-align: center">
                            <form action="{{ action('Profile\ProfileController@addPhoto', [Auth::user()->slug, Auth::user()->profile->id]) }}"
                                  method="POST" enctype="multipart/form-data">
                                <input type="file" name="avatar" class="form-control">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-sm btn-danger">
                            </form>

                        </div>
                    @else
                        <img class="img-responsive" src="{{ asset('storage/profile/cuple.jpg') }}" alt="">
                    @endif
                </div>
                    <div class="list-group panel">
                        <a href="#demo3" class="list-group-item active" data-toggle="collapse" data-parent="#MainMenu">Profili
                            im
                        <i class="fa-arrow-down"></i> </a>
                        <div class="collapse" id="demo3">
                            @if(!Auth::user()->profile)
                                <a href="{{ route('profile.create', Auth::user()->slug) }}" class="list-group-item">create</a>
                            @else
                                <a href="{{  url(Auth::user()->slug. '/profile/'. Auth::user()->profile->id) }}"
                                   class="list-group-item">Shikoje</a>
                                <a href="{{  url(Auth::user()->slug. '/profile/'. Auth::user()->profile->id .'/edit') }}"
                                   class="list-group-item">Editoje</a>
                            @endif
                        </div>
                        <a href="#demo4" class="list-group-item active" data-toggle="collapse" data-parent="#MainMenu">Makinat
                            e mia</a>
                        <div class="collapse" id="demo4">
                            <a href="{{ route('makinaime.index', Auth::user()->slug) }}" class="list-group-item">Makinat
                                e mia</a>
                            <a href="{{ url(Auth::user()->slug. '/profile/makinaime/create') }}"
                               class="list-group-item">Publiko te re</a>
                        </div>
                        <a href="#demo5" class="list-group-item active" data-toggle="collapse" data-parent="#MainMenu">Prona e
                            mia</a>
                        <div class="collapse" id="demo5">
                            <a href="{{ route('pronaime.index', Auth::user()->slug) }}" class="list-group-item">Pronat e
                                mia</a>
                            <a href="{{ route('pronaime.create', Auth::user()->slug) }}" class="list-group-item">Publiko
                                te re</a>
                        </div>
                        <a href="#demo6" class="list-group-item active" data-toggle="collapse" data-parent="#MainMenu">Puna
                            ime</a>
                        <div class="collapse" id="demo6">
                            <a href="{{ route('punaime.index', Auth::user()->slug) }}" class="list-group-item">Puna
                                ime</a>
                            <a href="{{ route('punaime.create', Auth::user()->slug) }}" class="list-group-item">Publiko
                                te re</a>
                        </div>
                        <a href="#demo7" class="list-group-item active" data-toggle="collapse" data-parent="#MainMenu">Shitjet
                            e mia</a>
                        <div class="collapse" id="demo7">
                            <a href="{{ route('shitjetemia.index', Auth::user()->slug) }}" class="list-group-item">Shitjet
                                e mia</a>
                            <a href="{{ route('shitjetemia.create', Auth::user()->slug) }}" class="list-group-item">Publiko
                                te re</a>
                        </div>
                        <a href="#demo8" class="list-group-item active" data-toggle="collapse" data-parent="#MainMenu">Elektroniket
                            e mia</a>
                        <div class="collapse" id="demo8">
                            <a href="{{ route('elektroniketemia.index', Auth::user()->slug) }}" class="list-group-item">Elektroniket
                                e mia</a>
                            <a href="{{ route('elektroniketemia.create', Auth::user()->slug) }}"
                               class="list-group-item">Publiko te re</a>
                        </div>
                    </div>
                </div>
                <!-- end menu -->
            </div>
        <div class="col-sm-18">
            <div class="profile-content">
                @yield('content')
            </div>
        </div>
    </div>
</div>


@yield('scripts')
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
@yield('footer')
</body>
</html>
