@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Owner
@endsection

@section('content')
<section class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card bg-primary-soft border-0 p-3t">
                <div class="card-header bg-transparent border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 id="card_title" class="text-primary text-uppercase">
                            <span class="fluent--people-list-16-filled"></span> Propietario
                        </h4>
                    </div>
                </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body ">
                        <form method="POST" action="{{ route('owners.update', $owner->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('owner.form')

                        </form>
                    </div>
                    <div class="card-header bg-transparent border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 id="card_title" class="text-primary text-uppercase">
                                <span class="ph--car-profile"></span> Vehículos
                            </h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('cars.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('car.form')

                        </form>
                        <div class="row" id="car-list">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var owner_id = {{$owner->id}};
    </script>
    <script src="{{ asset('js/families/add.js') }}" defer></script>
@endpush