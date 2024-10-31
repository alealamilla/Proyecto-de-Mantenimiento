<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="reception_id" class="form-label">{{ __('Reception Id') }}</label>
            <select name="reception_id" class="form-control @error('reception_id') is-invalid @enderror" id="reception_id">
                <option value="">Seleccione la recpción</option>
                @foreach ($receptions as $reception)
                    <option value="{{ $reception->id }}" name="reception_id"
                        {{ old('reception_id', $work?->reception_id) == $reception->id ? 'selected' : '' }}>
                        {{ $reception->id }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('reception_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="service_id" class="form-label">{{ __('Service Id') }}</label>
            <select name="service_id" class="form-control @error('service_id') is-invalid @enderror" id="service_id">
                <option value="">Seleccione el servicio</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" name="service_id"
                        {{ old('service_id', $work?->service_id) == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('service_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sparepart_id" class="form-label">{{ __('Sparepart Id') }}</label>
            <select name="sparepart_id" class="form-control @error('sparepart_id') is-invalid @enderror" id="sparepart_id">
                <option value="">Seleccione la refacción</option>
                @foreach ($spareparts as $sparepart)
                    <option value="{{ $sparepart->id }}" name="sparepart_id"
                        {{ old('sparepart_id', $work?->sparepart_id) == $sparepart->id ? 'selected' : '' }}>
                        {{ $sparepart->name}}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('sparepart_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="time" class="form-label">{{ __('Time') }}</label>
            <input type="datetime-local" name="time" class="form-control @error('time') is-invalid @enderror" value="{{ old('time', $work?->time) }}" id="time" placeholder="Time">
            {!! $errors->first('time', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                <option value="">Seleccione al empleado lo realizo</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" name="user_id"
                        {{ old('user_id', $work?->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>