@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.Users')}}</h1>

  <br>

  <a href="{{ url('register') }}" class="btn btn-primary">{{trans('strings.Create')}}</a>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.RoleID')}}</th>
        <th>{{trans('strings.Tipo')}}</th>
        <th>{{trans('strings.Username')}}</th>
        <th>{{trans('strings.DNI')}}</th>
        <th>{{trans('strings.E-Mail')}}</th>
        <th colspan="3">{{trans('strings.Actions')}}</th>
      </tr>
    </thead>

    @foreach ($users as $user)

      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->role->id or 'Blank' }}</td>
        <td>{{ $user->role->name or 'Blank' }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->dni }}</td>
        <td>{{ $user->email }}</td>

        <td>
          <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>

        <td>
          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>

        <td>
          {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>

    @endforeach
  </table>

@stop
