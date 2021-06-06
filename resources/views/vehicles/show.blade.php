@extends('dashboard.app')
@section('title')
{{ $vehicle->manufacturer}} {{ $vehicle->model}}, {{ $vehicle->year}} | See Vehicle |Cars For You
@endsection
@section('h1')
{{ $vehicle->manufacturer}} {{ $vehicle->model}}, {{ $vehicle->year}}
@endsection
@section('content') @include('dashboard.breadcrumb')

<div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-reorder"></i> </span>
              <h5 >Vehicle Information</h5>
              <span class="icon2"> <a class="btn btn-warning btn-mini" href="{{ route('vehicles.edit',$vehicle->id) }}"><i class="icon-pencil"></i></a> <a class="btn-danger btn btn-mini" href="#" data-toggle="modal" data-target="#delete-modal"><i class="icon-trash"></i></a>
              </span>
            </div>
            <div class="widget-content">
              <div class="row-fluid">
                <div class="span6">
                  <table class="">
                    <tbody>
                            <tr>
                               <td><h4><img src="{{asset($vehicle->image)}}" alt="{{($vehicle->model)}}" width="300" /></td>
                            </tr>
                      <tr>
                        <td><h4><center>{{ $vehicle->manufacturer}} {{ $vehicle->model}}, {{ $vehicle->year}} </h4></center></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                <div class="span6">
                  <table class="table table-bordered table-invoice">
                    <tbody>
                    <tr>
                      <td class="width30">Status:</td>
                      <td class="width70"><strong>{{$vehicle->status->name}}</strong>
                        <form action="{{ route('vehicles.update_status', $vehicle->id)}}" method="post">
                          @csrf
                          <select name="status_id">
                            <option value="">Select</option>
                            <option value="1">Available</option>
                            <option value="2">Maintenance</option>
                          </select>
                          <input type="submit" class="btn btn-success" value="Atualizar status">
                        </form>
                      </td>
                    </tr>
                      <tr>
                        <td class="width30">Registration Number:</td>
                        <td class="width70"><strong>{{$vehicle->license_plate}}</strong></td>
                      </tr>
                      <tr>
                        <td>Chasis</td>
                        <td><strong>{{$vehicle->chassi}}</strong></td>
                      </tr>
                      <tr>
                        <td>Rental:</td>
                        <td><strong>{{$vehicle->rental_agency_id}}</strong></td>
                      </tr>
                      <tr>
                            <td>Daily Charge:</td>
                            <td><strong>{{$vehicle->value}},00/Per Day</strong></td>
                          </tr>
                    <td class="width30">Features</td>
                      <td class="width70">Available Color: {{$vehicle->color}}<br>
                        {{$vehicle->description}}<br>

                       </td>
                    </tr>
                      </tbody>

                  </table>
                </div>
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

              </div>
            </div>
          </div>

        </div>
</div>





@endsection
