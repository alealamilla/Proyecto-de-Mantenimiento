<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="row">
            <div class="col-3 form-group mb-2 mb20">
                <label for="owner_id" class="form-label">Propietario</label>
                <select name="owner_id" class="form-control @error('owner_id') is-invalid @enderror" id="owner_id">
                    <option value="">Seleccione al dueño</option>
                    @foreach ($owners as $owner)
                        <option value="{{ $owner->id }}" name="owner_id"
                            {{ old('owner_id', $reception?->owner_id) == $owner->id ? 'selected' : '' }}>
                            {{ $owner->name }}
                        </option>
                    @endforeach
                </select>
                {!! $errors->first('owner_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="col-3 form-group mb-2 mb20">
                <label for="car_id" class="form-label">Vehículo</label>
                <select name="car_id" class="form-control @error('car_id') is-invalid @enderror" id="car_id">
                    <option value="">Seleccione el carro</option>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}" name="car_id"
                            {{ old('car_id', $reception?->car_id) == $car->id ? 'selected' : '' }}>
                            {{ $car->placas }} {{ $car->brand->name }} {{ $car->type->name }} {{ $car->color->name }}
                        </option>
                    @endforeach
                </select>
                {!! $errors->first('car_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="col-3 form-group mb-2 mb20">
                <label for="reason" class="form-label">Razón de visita</label>
                <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror"
                    value="{{ old('reason', $reception?->reason) }}" id="reason" placeholder="Razón de visita">
                {!! $errors->first('reason', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="col-3 form-group mb-2 mb20">
                <label for="person" class="form-label">¿Quién trae el vehiculo?</label>
                <input type="text" name="person" class="form-control @error('person') is-invalid @enderror"
                    value="{{ old('person', $reception?->person) }}" id="person" placeholder="person">
                {!! $errors->first('person', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <div class="row">
        <div class="col-3 form-group mb-2 mb20">
            <label for="reception_date" class="form-label">Día de Recepción</label>
            <input type="datetime-local" name="reception_date"
                class="form-control @error('reception_date') is-invalid @enderror"
                value="{{ old('reception_date', $reception?->reception_date) }}" id="reception_date"
                placeholder="Reception Date">
            {!! $errors->first(
                'reception_date',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-3 form-group mb-2 mb20">
            <label for="status_id" class="form-label">Status</label>
            <select name="status_id" class="form-control @error('status_id') is-invalid @enderror" id="status_id">
                <option value="">Seleccione el estado actual</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" name="status_id"
                        {{ old('status_id', $reception?->status_id) == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>

            {!! $errors->first('status_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-3 form-group mb-2 mb20">
            <label for="next_reception" class="form-label">Próximo Servicio</label>
            <input type="datetime-local" name="next_reception"
                class="form-control @error('next_reception') is-invalid @enderror"
                value="{{ old('next_reception', $reception?->next_reception) }}" id="next_reception"
                placeholder="Next Reception">
            {!! $errors->first(
                'next_reception',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-3 form-group mb-2 mb20">
            <label for="user_id" class="form-label">Encargado</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                <option value="">Seleccione al empleado que recibio</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" name="user_id"
                        {{ old('user_id', $reception?->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>

            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

</div>
<div class="col-12 mt-2 d-flex justify-content-end">
    <button type="submit" class="btn btn-primary btn-sm text-uppercase rounded-4"><i class="fas fa-check"></i>
        Guardar Recepción</button>
</div>
</div>
