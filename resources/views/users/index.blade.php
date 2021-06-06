@extends('dashboard.app')
@section('title','Registered Users | Cars For You')
@section('h1','Registered Users')
@section('content')
    @include('dashboard.breadcrumb')


    @if($users->count() > 1)
    <div class="widget-box">
        <div class="widget-title">
    <span class="icon">
      <i class="icon-th"></i>
    </span>
            <h5>Lista de Usuários</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Agency</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tax Payer Number</th>
                    <th scope="col">Zip code</th>
                    <th scope="col">Drivers Licence</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="gradeX">
                        <td class="align-middle">{{$user->name}}</td>
                        <td class="align-middle">{{$user->rental_agency_id}}</td>
                        <td class="align-middle">@if($user->profile_id == 1) Administrator @elseif($user->profile_id == 2) Funcionário @else Cliente @endif </td>
                        <td class="align-middle">{{$user->email}}</td>
                        <td class="align-middle">{{$user->CPF}}</td>
                        <td class="align-middle">{{$user->CEP}}</td>
                        <td class="align-middle">{{$user->CNH}}</td>
                        <td class="actions">
                            @if(Auth::user()->CPF != $user->CPF)
                            <a class="btn btn-success btn-xs" href="{{ route('users.show',$user->id) }}"><i
                                        class="icon-eye-open"></i> </a>
                            <a class="btn btn-warning btn-xs" href="{{ route('users.edit',$user->id) }}"><i
                                        class="icon-edit"></i></a>
                            <a class="btn btn-danger btn-xs" href="#" data-toggle="modal"
                               data-target="#delete-modal"><i
                                        class="icon-trash"></i></a>
                                @endif
                        </td>
                    </tr>
                    <form action="{{ route('users.destroy', $user->id)}}" method="post">
                        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog"
                             aria-labelledby="modalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="modalLabel">Delete User</h4>
                                    </div>
                                    <div class="modal-body">Do you really want to delete this user?</div>
                                    <div class="modal-footer">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o
                                        </button>
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
        <h4>There are no registerd Users</h4>

@endif
    <div class="pull-right">
        @can('create', App\User::class)
            <a class="btn btn-success" style="margin-bottom:10px;" href="{{ route('users.create') }}"> Register New User</a>
        @endcan

    </div>

@endsection
