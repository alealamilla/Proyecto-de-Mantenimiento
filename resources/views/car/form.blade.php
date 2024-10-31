<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="owner_id" class="form-label">{{ __('Owner Id') }}</label>
            <select name="owner_id" class="form-control @error('owner_id') is-invalid @enderror" id="owner_id">
                <option value="">Seleccione al dueño</option>
                @foreach ($owners as $owner)
                    <option value="{{ $owner->id }}" name="owner_id"
                        {{ old('owner_id', $car?->owner_id) == $owner->id ? 'selected' : '' }}>
                        {{ $owner->name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('owner_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="color_id" class="form-label">{{ __('Color Id') }}</label>
            <select name="color_id" class="form-control @error('color_id') is-invalid @enderror" id="color_id">
                <option value="">Seleccione el color</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}" name="color_id"
                        {{ old('color_id', $car?->color_id) == $color->id ? 'selected' : '' }}>
                        {{ $color->name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('color_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="brand_id" class="form-label">{{ __('Brand Id') }}</label>
            <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror" id="brand_id">
                <option value="">Seleccione la marca</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" name="brand_id"
                        {{ old('brand_id', $car?->brand_id) == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            
            {!! $errors->first('brand_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="type_id" class="form-label">{{ __('Type Id') }}</label>
            <select name="type_id" class="form-control @error('type_id') is-invalid @enderror" id="type_id">
                <option value="">Seleccione el modelo</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" name="type_id"
                        {{ old('type_id', $car?->type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('type_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="placas" class="form-label">{{ __('Placas') }}</label>
            <input type="text" name="placas" class="form-control @error('placas') is-invalid @enderror"
                value="{{ old('placas', $car?->placas) }}" id="placas" placeholder="Placas">
            {!! $errors->first('placas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="year" class="form-label">{{ __('Year') }}</label>
            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror"
                value="{{ old('year', $car?->year) }}" id="year" placeholder="Year">
            {!! $errors->first('year', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
