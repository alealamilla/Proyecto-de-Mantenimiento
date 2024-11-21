<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20" hidden>
            <label for="owner_id" class="form-label">{{ __('Owner Id') }}</label>
            <input type="text" name="owner_id" class="form-control @error('owner_id') is-invalid @enderror" 
            value="{{ old('owner_id', $owner?->id) }}" id="owner_id" placeholder="owner_id">
            {!! $errors->first('owner_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="color_id" class="form-label">Color:</label>
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
            <label for="brand_id" class="form-label">Marca:</label>
            <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror" id="brand_id"
            onchange="getTypes(this.value)">
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
            <label for="type_id" class="form-label">Modelo:</label>
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
            <label for="placas" class="form-label">Placas: </label>
            <input type="text" name="placas" class="form-control @error('placas') is-invalid @enderror"
                value="{{ old('placas', $car?->placas) }}" id="placas" placeholder="Placas">
            {!! $errors->first('placas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="year" class="form-label">Año:</label>
            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror"
                value="{{ old('year', $car?->year) }}" id="year" placeholder="Year">
            {!! $errors->first('year', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-12 mt-2 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary btn-sm text-uppercase rounded-4"><i class="fas fa-check"></i>
            Guardar Vehículo</button>
    </div>
</div>
