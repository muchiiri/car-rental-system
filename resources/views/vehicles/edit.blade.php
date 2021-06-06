@extends('dashboard.app')
@section('title','Edit vehicle | Car For You')

@section('h1','Edit vehicle')

@section('content')
@include('dashboard.breadcrumb')




          <div class="span12">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Vehicle Information</h5>
              </div>
              <div class="widget-content nopadding">

                <form action="{{ route('vehicles.update', $vehicle->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PUT')


                    <div class="control-group">
                        <label class="control-label">Manufacturer:</label>
                        <div class="controls">
                          <select class="span5" name="manufacturer">
                              <option value="{{$vehicle->manufacturer}}"  selected>{{$vehicle->manufacturer}}</option>
                              <option value="Audi">Audi</option>
                              <option value="BMW">BMW</option>
                              <option value="Chevrolet">Chevrolet</option>
                              <option value="Ferrari">Ferrari</option>
                              <option value="Fiat">Fiat</option>
                              <option value="Ford">Ford </option>
                              <option value="Honda">Honda</option>
                              <option value="Hyundai">Hyundai</option>
                              <option value="Lamborghini">Lamborghini</option>
                              <option value="Land Rover">Land Rover</option>
                              <option value="Lexus">Lexus</option>
                              <option value="Mercedes-Benz">Mercedes-Benz</option>
                              <option value="Nissan">Nissan</option>
                              <option value="Peugeot">Peugeot</option>
                              <option value="Renault">Renault</option>
                              <option value="Toyota" >Toyota</option>
                              <option value="Volkswagen" >Volkswagen</option>

                          </select>
                        </div>
                      </div>
                  <div class="control-group">
                    <label class="control-label">Model:</label>
                    <div class="controls">
                      <input type="text" class="span5" placeholder="Model" name="model" value="{{$vehicle->model}}"  />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Year:</label>
                    <div class="controls">
                      <input type="number" placeholder="Year" name="year" value="{{$vehicle->year}}" class="span5" min="1900" max="2099" step="1" value="2016" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Chasis:</label>
                    <div class="controls">
                      <input type="text"  class="span5" placeholder="Chasis" name="chassi" value="{{$vehicle->chassi}}" />
                    </div>
                  </div>
                     <div class="control-group">
                    <label class="control-label">Reg Number:</label>
                    <div class="controls">
                      <input type="text" class="span5" placeholder="Reg No" name="license_plate" value="{{$vehicle->license_plate}}"/>
                    </div>
                    <div class="control-group">
                    <label class="control-label">Color:</label>
                    <div class="controls">
                      <input type="text" class="span5" placeholder="Color" name="color" value="{{$vehicle->color}}"  />
                    </div>
                  </div>
                  <div class="control-group">
                        <label class="control-label">Daily Charge:</label>
                        <div class="controls">
                          <div class="input-append">
                            <input type="text" class="span4" placeholder="Valor diário" name="value"  value="{{$vehicle->value}}" />
                            <span class="add-on"> ,00 / per day</span> </div>
                        </div>
                      </div>
                  <div class="control-group">
                        <label class="control-label">Description:</label>
                        <div class="controls">
                        <textarea class="span5" id="description" name="description" rows="5" placeholder="Descreva as características do veículo...">{{$vehicle->description}}</textarea>
                        </div>
                </div>
                <div class="control-group">
                        <label class="control-label">Picture:</label>
                        <div class="controls">

                                <input type="hidden" class="form-control-file" id="image" name="image" value="{{$vehicle->image}}">
                                @if(isset($vehicle->image))
                                <img src="{{asset($vehicle->image)}}" alt="{{($vehicle->model)}}" width="90" />
                                @endif
                        </div>
                        </div>
                </div>
                    <div class="controls">
                        <input type="hidden" name="rental_agency_id" class="form-control" value="{{$vehicle->rental_agency_id}}">
                        <input type="hidden" name="status_id" class="form-control" value="1" value="{{$vehicle->status_id}}">
                    </div>





                    <div class="form-actions text-left ">
                            <a class="btn btn-danger" href="{{ route('vehicles.index') }}"> Back</a>
                            <button type="submit" class="btn btn-success">Edit</button>

                      </div>





                </form>
              </div>
            </div>
          </div>

        </div>


@endsection
