@extends('dashboard.app')
@section('title','Cadastrar agência| Autobridge')

@section('h1','Cadastrar agência')

@section('content')
@include('dashboard.breadcrumb')




<div class="span12">

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Please check your input again.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Agency Information</h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{{ route('rentalagency.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}

                <div class="control-group">
                    <label class="control-label">Name:</label>
                    <div class="controls">
                        <input type="text" class="span5" placeholder="Name" name="name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">City:</label>
                    <div class="controls">
                        <input type="text" class="span5" placeholder="City" name="city" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">State:</label>
                    <div class="controls">
                        <input type="text" class="span5" placeholder="Estado" name="state" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Country:</label>
                    <div class="controls">
                        <input type="text" class="span5" placeholder="Country" name="country" />
                    </div>
                    <div class="control-group">
                        <label class="control-label">Location:</label>
                        <div class="controls">
                            <input type="text" class="span5" placeholder="Location" name="location" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">CPNJ:</label>
                        <div class="controls">
                            <input type="text" class="span5" placeholder="CNPJ" name="CNPJ" />
                        </div>
                    </div>


                    <div class="form-actions text-left ">
                        <a class="btn btn-danger" href="{{ route('rentalagency.index') }}"> Back</a>
                        <button type="submit" class="btn btn-success">Add</button>

                    </div>





            </form>
        </div>
    </div>
</div>

</div>


@endsection