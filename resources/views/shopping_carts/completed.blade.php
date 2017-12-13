@extends('layouts.app')


@section('content')

<header class="big-padding white-text blue-grey text-center ">
  <h1>Compra Completada</h1>
</header>

<div class="container">

  <div class="card large-padding">
    <h3>Tu pago fue procesado <span class="{{$order->status}}">{{$order->status}}</span> </h3>

    <p>Revisa la info de tu envio:</p>

    <div class="row large-padding">
      <div class="col-xs-6"> Correo </div>
      <div class="col-xs-6"> {{$order -> email}} </div>
    </div>

    <div class="row large-padding">
      <div class="col-xs-6"> Dirección </div>
      <div class="col-xs-6"> {{$order -> address()}} </div>
    </div>

    <div class="row large-padding">
      <div class="col-xs-6"> Codigo postal </div>
      <div class="col-xs-6"> {{$order -> postal_code}} </div>
    </div>

    <div class="row large-padding">
      <div class="col-xs-6"> Ciudad </div>
      <div class="col-xs-6"> {{$order -> city}} </div>
    </div>

    <div class="row large-padding">
      <div class="col-xs-6"> Estado  </div>
      <div class="col-xs-3"> {{$order -> state }}{{$order -> country_code}} </div>
    </div>

    <div class="row large-padding">
      <div class="col-xs-6"> País  </div>
      <div class="col-xs-3"> {{$order -> country_code}} </div>
    </div>

    <div class="text-center top-space large-padding">

      <a href="{{url('/compras/'.$shopping_cart -> custom_id)}}">Link de la compra</a>

    </div>

  </div>

</div>

@endsection
