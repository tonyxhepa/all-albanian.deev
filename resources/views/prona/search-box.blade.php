<div class="row" xmlns="http://www.w3.org/1999/html">
        <form method="get" action="{{ url('/prona/kerko') }}">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="title">Kerko sipas titullit</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <label for="title">Select cats:</label>
                    <select name="prona_cats_id" id="prona_cats_id" class="form-control" v-model="country_id" v-on:change="getCountryModel()" v-bind:disabled="disableWhenSelect">
                        <option value="">--- Select cats ---</option>
                        @foreach ($categories as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
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
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="min_price">Min Price</label>
                        <input type="number" name="min_price" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="max_price">Max Price</label>
                        <input type="number" name="max_price" class="form-control">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-default">Search</button>
        </form>
    @include('includes.form-error')
    <hr>

</div>
