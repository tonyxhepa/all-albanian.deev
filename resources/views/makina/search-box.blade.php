<div class="row" >
        <form method="get" action="{{ url('/makina/kerko') }}">

                <div class="col-xs-24">
                    <div class="form-group">
                        <label for="title">Kerko sipas titullit</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="col-xs-24">
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
                <div class="col-xs-24">
                    <div id="app">
                        <div class="form-group">
                            <label for="car_make_id">Car Make</label>
                            <select name="car_make_id" id="car_make_id" class="form-control" v-model="car_make_id" v-on:change="getCarModel()" v-bind:disabled="disableWhenSelect">
                                <option value="">--- Select Car ---</option>
                                @foreach($car_make as $item => $value)
                                    <option value="{{ $item }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-24">
                    <div class="form-group">
                        <label for="karburanti">Karburanti</label>
                        <select name="karburanti" id="karburanti" class="form-control">
                            <option value="">--- Karburanti ---</option>
                            <option value="diesel">Diesel</option>
                            <option value="benzine">Benzine</option>
                            <option value="gaz">Gaz</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-24">
                    <div class="form-group">
                        <label for="min_price">Min Price</label>
                        <input type="number" name="min_price" class="form-control">
                    </div>
                </div>
                <div class="col-xs-24">
                    <div class="form-group">
                        <label for="max_price">Max Price</label>
                        <input type="number" name="max_price" class="form-control">
                    </div>
                </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
    @include('includes.form-error')
    <hr>

</div>
