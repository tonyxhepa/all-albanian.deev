@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

            </div>
        </div>
        <div id="app">
            <example></example>
        </div>
        <form id="addPhotosForm" action="/"
              class="dropzone"
              id="my-awesome-dropzone">
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script>
            Dropzone.options.addPhotosForm = {
                paramName: 'photo',
                maxFilesize: 3,
                maxFiles: 5,
                acceptedFiles: '.jpg, .jpeg, .png, .bmp'
            };

</script>
@endsection