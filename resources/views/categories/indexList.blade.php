@extends('layouts.app')

@section('content')

  <h1>Categories</h1>

  <button type="button" class="btn btn-default">
    <a href="{{ route('categories.index') }}">
      <span class="fa fa-th"></span>
    </a>
    &nbsp | &nbsp
    <a href="{{ route('products.index') }}">
      <span class="fa fa-th-list"></span>
    </a>
  </button>

  <a href="{{ route('categories.create') }}" class="btn btn-success">Create</a>

  <br>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>
    @foreach ($categories as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td><img src="{{ $category->photo }}" alt="{{ $category->name }}" style="weight:50px; height:50px;"/></td>
      <td>{{ $category->name or 'Blank' }}</td>
      <td>
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Update</a>
      </td>
      <td>
        {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
        <button class="btn btn-danger" type="submit" >Delete</button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
@stop