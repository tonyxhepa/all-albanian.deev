<div class="row">
        <form method="get" action="{{ url('/argetim/kerko') }}">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="title">Kerko sipas titullit</label>
                        <input type="text" name="title" class="form-control">
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
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="argetim_cats_id">Kateoria</label>
                        <select name="argetim_cats_id" id="argetim_cats_id" class="form-control">
                            <option value="">--- Kategoria ---</option>
                            @foreach ($categories as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <button type="submit" class="btn btn-default">Search</button>
                </div>
            </div>


        </form>
    @include('includes.form-error')
    <hr>

</div>
