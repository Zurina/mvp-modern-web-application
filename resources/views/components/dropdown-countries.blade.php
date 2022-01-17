<div class="form-group">
    <label for="country_id" class="col-md-4 control-label">Select a country</label>
    <div class="col-md-6">

        <select class="form-control" name="country_id" id="country_id">
            <option value="">Select a country</option>
            @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ ucfirst($country->label) }}</option>
            @endforeach
        </select>
        @if ($errors->has('countries'))
        <span class="help-block">
            <strong>{{ $errors->first('countries') }}</strong>
        </span>
        @endif
    </div>
</div>