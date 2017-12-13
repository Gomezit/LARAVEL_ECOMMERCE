<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<h1>¡Hola!</h1>
<p>Te enviamos los datos de tu compra</p>

<table>
  <thead>

    <tr>
      <td>Producto</td>
      <td>Costo</td>
    </tr>

  </thead>
  <tbody>

    @foreach($products as $product)

    <tr>
      <td>Total</td>
      <td>{{$order->total}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

  </body>
</html>
