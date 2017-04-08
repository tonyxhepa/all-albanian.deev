<div class="row" xmlns="http://www.w3.org/1999/html">
        <form method="get" action="{{ url('/femrat/kerko') }}">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="title">Kerko sipas titullit</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Select category:</label>
                        <select name="femrat_cats_id" id="femrat_cats_id" class="form-control" v-model="country_id" v-on:change="getCountryModel()" v-bind:disabled="disableWhenSelect">
                            <option value="">--- Select CAt ---</option>
                            @foreach ($categories as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div id="app-1">
                        <div class="form-group">
                            <label for="title">Select State:</label>
                            <select name="country_id" id="country_id" class="form-control" v-model="country_id" v-on:change="getCountryModel()" v-bind:disabled="disableWhenSelect">
                                <option value="">--- Select State ---</option>
                                @foreach ($countries as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-default">Search</button>
        </form>
    @include('includes.form-error')
    <hr>

</div>
