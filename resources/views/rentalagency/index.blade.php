@extends('dashboard.app') @section('title','Registered Agencies | WeRentCars') @section('h1','Registered Agencies') @section('content') @include('dashboard.breadcrumb')
<div class="card-body">
  @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
</div>

<div class="pull-right">
    <a class="btn btn-success" style="margin-bottom:10px;" href="{{ route('rentalagency.create') }}"> Add Agency</a>
</div>

@if($agencies->count() > 0)
<div class="widget-box">
  <div class="widget-title">
    <span class="icon">
      <i class="icon-th"></i>
    </span>
    <h5>Agency List</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered table-hover table-condensed">
      <thead>
        <tr>
        <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">City</th>
          <th scope="col">State</th>
          <th scope="col">Country</th>
          <th scope="col">Location</th>
          <th scope="col">CNPJ</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($agencies as $agency)
        <tr class="gradeX">
          <td class="align-middle">{{ $agency->id}}</td>
          <td class="align-middle">{{ $agency->name}}</td>
          <td class="align-middle">{{ $agency->city}}</td>
          <td class="align-middle">{{ $agency->state}}</td>
          <td class="align-middle">{{ $agency->country}}</td>
          <td class="align-middle">{{ $agency->location}}</td>
          <td class="align-middle">{{ $agency->CNPJ}}</td>
          <td class="actions">

            <a class="btn btn-success btn-xs" href="{{ route('rentalagency.show', $agency->id) }}"><i class="icon-eye-open"></i> </a>
            <a class="btn btn-warning btn-xs" href="{{ route('rentalagency.edit', $agency->id) }}"><i class="icon-edit"></i></a>
            <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#delete-modal"><i class="icon-trash"></i></a>
          </td>
        </tr>
        <form action="{{ route('rentalagency.destroy', $agency)}}" method="post">
          <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="modalLabel">Delete Agency</h4>
                </div>
                <div class="modal-body">Do you really want to delete this agency? </div>
                <div class="modal-footer">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-primary">Sim</button>
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
  <h4>There are no registered agencies yet</h4>
@endif
@endsection
