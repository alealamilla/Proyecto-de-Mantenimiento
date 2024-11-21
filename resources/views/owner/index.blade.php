@extends('layouts.app')

@section('template_title')
    Owner
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-primary-soft border-0 p-3">
                <div class="card-header bg-transparent border-0">
                    <div class="d-flex justify-content-between align-items-center">

                        <h4 id="card_title" class="text-primary text-uppercase">
                            <span class="fluent--people-list-16-filled"></span> Propietarios
                        </h4>

                             <div class="float-right">
                                <a href="{{ route('owners.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Nuevo Propietario
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover responsive w-100">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Telefono</th>
										<th>Email</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($owners as $owner)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $owner->name }}</td>
											<td>{{ $owner->phone }}</td>
											<td>{{ $owner->email }}</td>

                                            <td>
                                                <form action="{{ route('owners.destroy',$owner->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('owners.show',$owner->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('owners.edit',$owner->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $owners->links() !!}
            </div>
        </div>
    </div>
@endsection
