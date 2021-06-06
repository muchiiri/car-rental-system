@extends('dashboard.app') @section('title','Registered Vehicles | Cars For You') @section('h1','Registered vehicles') @section('content') @include('dashboard.breadcrumb')
<div class="card-body">
  @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
</div>

<div class="pull-right">
  @can('create', App\Vehicle::class)
    <a class="btn btn-success" style="margin-bottom:10px;" href="{{ route('vehicles.create') }}"> Add New Vehicle</a> 
  @endcan
</div>

@if($vehicles->count() > 0)
<div class="widget-box">
  <div class="widget-title"> 
    <span class="icon">
      <i class="icon-th"></i>
    </span>
    <h5>Vehicle List</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered table-hover table-condensed">
      <thead>
        <tr>
          <th scope="col">Piture</th>
          <th scope="col">Manufacturer</th>
          <th scope="col">Model</th>
          <th scope="col">Year</th>
          <th scope="col">Reg Number</th>
          <th scope="col">Chasis</th>
          <th scope="col">Color</th>
          <th scope="col">Daily Charge</th>
          <th scope="col">Rental</th>
          <th scope="col">Status</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($vehicles as $vehicle)
        <tr class="gradeX">
          <td class="align-middle"><img src="{{asset($vehicle->image)}}" alt="{{($vehicle->model)}}" width="90" /></td>
          <td class="align-middle">{{ $vehicle->manufacturer}}</td>
          <td class="align-middle">{{ $vehicle->model}}</td>
          <td class="align-middle">{{ $vehicle->year}}</td>
          <td class="align-middle">{{ $vehicle->license_plate}}</td>
          <td class="align-middle">{{ $vehicle->chassi}}</td>
          <td class="align-middle">{{ $vehicle->color}}</td>
          <td class="align-middle">R$ {{ $vehicle->value}},00</td>
          <td class="align-middle">{{ $vehicle->rental_agency->name}}</td>
          <td class="align-middle">{{ $vehicle->status->name}}</td>
          <td class="align-middle">{{ $vehicle->description}}</td>
          <td class="actions">
            <a class="btn btn-success btn-xs" href="{{ route('vehicles.show',$vehicle->id) }}"><i class="icon-eye-open"></i> </a>
            <a class="btn btn-warning btn-xs" href="{{ route('vehicles.edit',$vehicle->id) }}"><i class="icon-edit"></i></a>
            <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#delete-modal"><i class="icon-trash"></i></a>
          </td>
        </tr>
        <form action="{{ route('vehicles.destroy', $vehicle->id)}}" method="post">
          <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="modalLabel">Delete Vehicle</h4>
                </div>
                <div class="modal-body">Do you really want to delete this vehicle? </div>
                <div class="modal-footer">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-primary">Yes</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@else
  <h4>There are no registered vehicles yet</h4>
@endif

{{$vehicles->links()}}
@endsection
