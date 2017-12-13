@extends('layouts.app')


@section('content')

<div class="white container">
  <h1>Editar Producto</h1>

  @include('products.form',['product' => $product , 'url' => '/products/'.$product->id,'method' => 'PUT'])

</div>

@endsection
