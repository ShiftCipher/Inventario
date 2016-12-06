@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.categories')}}</h1>

  <br>

  <a href="{{ route('categories.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

  <hr>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>{{trans('strings.image')}}</th>
        <th>{{trans('strings.name')}}</th>
        <th colspan="2">{{trans('strings.actions')}}</th>
      </tr>
    </thead>
    @foreach ($categories as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td><img src="{{ $category->photo }}" alt="{{ $category->name }}" style="weight:50px; height:50px;"/></td>
      <td><a href="/categories/{{ $category->id }}">{{ $category->name or 'Blank' }}</a></td>
      <td>
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      </td>
      <td>
        {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit" name="{{ trans('strings.delete') }}"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
@stop
