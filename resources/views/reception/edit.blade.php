@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Reception
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-primary-soft border-0 p-3">
                <div class="card-header bg-transparent border-0">
                    <div class="d-flex justify-content-between align-items-center">

                        <h4 id="card_title" class="text-primary text-uppercase">
                            <span class="mdi--note-edit"></span> Recepción
                        </h4>
                    </div>
                </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('receptions.update', $reception->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('reception.form')

                        </form>
                    </div>
                    <div class="card-header bg-transparent border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 id="card_title" class="text-primary text-uppercase">
                                <span class="mdi--mechanic"></span> Trabajos
                            </h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form method="POST" onsubmit="NewEntry()" role="form" enctype="multipart/form-data"
                            id="NewWork">
                            @csrf

                            @include('work.form')

                        </form>
                    </div>
                    <div class="card-body" id="DisplayRedSheet">
                        <h5 id="card_title" class="text-primary text-uppercase">
                            <span class="ic--twotone-pets"></span> RESUMEN TRABAJOS REALIZADOS
                        </h5>
                        <div id="table-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        
        var Reception_Id = {{ $reception->id }};
        
    </script>
    <script src="{{ asset('js/works.js') }}" defer></script>
@endpush