@extends('layouts.app')

@section('template_title')
    Reception
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reception') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('receptions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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
                                        <th>No</th>
                                        
										<th>Owner Id</th>
										<th>Car Id</th>
										<th>Reason</th>
										<th>Reception Date</th>
										<th>Status Id</th>
										<th>Next Reception</th>
										<th>User Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($receptions as $reception)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reception->owner_id }}</td>
											<td>{{ $reception->car_id }}</td>
											<td>{{ $reception->reason }}</td>
											<td>{{ $reception->reception_date }}</td>
											<td>{{ $reception->status_id }}</td>
											<td>{{ $reception->next_reception }}</td>
											<td>{{ $reception->user_id }}</td>

                                            <td>
                                                <form action="{{ route('receptions.destroy',$reception->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('receptions.show',$reception->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('receptions.edit',$reception->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $receptions->links() !!}
            </div>
        </div>
    </div>
@endsection
