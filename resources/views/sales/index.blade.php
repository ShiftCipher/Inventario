@extends('layouts.app')
@section('content')

  <h1>{{trans('strings.sales')}}</h1>

  {!! Form::open(['route' => ['sales.search'], 'method' => 'POST']) !!}

  <br>
    <div class="col-md-12">
      <div class="input-group">
        <span class="input-group-btn">
          <input type="text" class="form-control" name="search" placeholder="{{ trans('strings.search') }}" style="width:50%">
          <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </span>
      </div>
    </div>
  <br>

  {!! Form::close() !!}

  {{ $sales->links() }}

  <hr>

  <table class="table table-bordered table-hover table-responsive">
    <thead>
      <tr>
        <th>{{trans('strings.sale_id')}}</th>
        <th>{{trans('strings.order_id')}}</th>
        <th>{{trans('strings.date')}}</th>
        <th>{{trans('strings.delivery')}}</th>
        <th>{{trans('strings.return')}}</th>
        <th>{{trans('strings.store_id')}}</th>
        <th>{{trans('strings.storer')}}</th>
        <th>{{trans('strings.state')}}</th>
        <th colspan="2">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach($sales as $sale)
      <tr>
        <td>{{ $sale->id or 'Blank' }}</td>
        <td>{{ $sale->order_id or 'Blank' }}</td>
        <td>{{ $sale->date or 'Blank' }}</td>
        <td>{{ $sale->out or 'Blank' }}</td>
        <td>{{  $sale->in or trans('strings.on_waiting') }}</td>
        <td>{{ $sale->user_id or 'Blank' }}</td>
        <td>{{ $sale->user->username or 'Blank' }}</td>
        <td><span class="{{ $sale->state->label }}">{{ $sale->state->name or 'Blank' }}</span></td>
        <td>
          <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
        </td>

      </tr>
    @endforeach

  </table>

@stop
