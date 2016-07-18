@extends('layouts.app')

@section('content')

<h1>Edit</h1>

{!! Form::open(array('route' => array('products.update', $product->id), 'method' => 'patch')) !!}

  {!! Form::label('Name') !!}
  {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}

  {!! Form::label('Serial') !!}
  {!! Form::text('serial', $product->serial, ['class' => 'form-control']) !!}

  @if (Auth::user()->rol_id == 3)
    {!! Form::label('Warranty') !!}
    {!! Form::text('warranty', $product->warranty, ['class' => 'form-control']) !!}

    {!! Form::label('Stock') !!}
    {!! Form::text('stock', $product->stock, ['class' => 'form-control']) !!}

    {!! Form::label('Year') !!}
    {!! Form::text('year', $product->year, ['class' => 'form-control']) !!}

    {!! Form::label('Price') !!}
    {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}

    {!! Form::label('State') !!}
    {!! Form::select('state_id', $states, $product->state_id, ['class' => 'form-control']) !!}

    {!! Form::label('Region') !!}
    {!! Form::select('region_id', $regions, $product->region_id, ['class' => 'form-control']) !!}

    {!! Form::label('City') !!}
    {!! Form::select('city_id', $cities, $product->city_id, ['class' => 'form-control']) !!}

    {!! Form::label('Store') !!}
    {!! Form::select('store_id', $stores, $product->store_id, ['class' => 'form-control']) !!}
  @endif

  {!! Form::label('Category') !!}
  {!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) !!}

  {!! Form::label('Manufacturer') !!}
  {!! Form::select('manufacturer_id', $manufacturers, $product->manufacturer_id, ['class' => 'form-control']) !!}

  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop