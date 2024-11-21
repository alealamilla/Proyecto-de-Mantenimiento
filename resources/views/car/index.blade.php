@extends('layouts.app')

@section('template_title')
    Car
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-primary-soft border-0 p-3">
                <div class="card-header bg-transparent border-0">
                    <div class="d-flex justify-content-between align-items-center">

                        <h4 id="card_title" class="text-primary text-uppercase">
                            <span class="ph--car-profile"></span> Vehículos
                        </h4>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Propietario</th>
										<th>Color </th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Placas</th>
										<th>Año</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cars as $car)
                                        <tr>
                                            
											<td>{{ $car->owner->name }}</td>
											<td>{{ $car->color->name }}</td>
											<td>{{ $car->brand->name }}</td>
											<td>{{ $car->type->name }}</td>
											<td>{{ $car->placas }}</td>
											<td>{{ $car->year }}</td>

                                            <td>
                                                <form action="{{ route('cars.destroy',$car->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cars.show',$car->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cars.edit',$car->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cars->links() !!}
            </div>
        </div>
    </div>
@endsection
