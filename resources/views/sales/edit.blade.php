@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

{!! Form::open(array('route' => array('sales.update', $sale->id), 'method' => 'PATCH')) !!}

{!! Form::close() !!}

@stop
