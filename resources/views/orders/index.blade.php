@extends('layouts.app')


@section('content')

<div class="container ">
  <div class="panel panel-default">

    <div class="panel-heading">
      <h2>Dashboard</h2>
    </div>

    <div class="panel-body">
      <h3>Estadisticas</h3>

      <div class="row top-space">

        <div class="col-xs-4 col-md-3 col-lg-2 " style="padding:1em;text-align:center;border-right:solid 1px #222;">

          <span style="display:block;font-size:2.2em;color:#3f51b5">{{$totalMonth}} USD</span>
          Ingresos del mes
        </div>

        <div class="col-xs-4 col-md-3 col-lg-2 " style="padding:1em;text-align:center;border-right:solid 1px #222;">

          <span style="display:block;font-size:2.2em;color:#3f51b5">{{$totalMonthCount}}</span>
          Numero de ventas
        </div>

      </div>

      <h3>Ventas</h3>

      <table class="table table-bordered">
        <thead>
          <tr>
            <td>ID. Venta</td>
            <td>Comprador</td>
            <td>Dirección</td>
            <td>N. Guia</td>
            <td>Status</td>
            <td>Fecha Venta</td>
            <td>Acciones</td>
          </tr>
        </thead>
        <tbody>


          <tr>
            @foreach($orders as $order)
            <td>{{$order -> id}}</td>
            <td>{{$order -> recipient_name}}</td>
            <td>{{$order -> address()}}</td>
            <td>

              <a href="#"
              data-type="text"
              data-pk="{{$order->id}}"
              class="set_guide_number"
              data-name="guide_number"
              data-title="Número de guia"
              data-value="{{$order->guide_number}}"
              data-url="{{url("/orders/$order -> id")}}" >
            </a>
           </td>

             <td>

                <a href="#"
                data-type="select"
                data-pk="{{$order->id}}"
                class="select_status"
                data-name="status"
                data-title="Status"
                data-value="{{$order->status}}"
                data-url="{{url("/orders/$order -> id")}}" >
              </a>

              </td>
            <td>{{$order -> created_at}}</td>
            <td>Acciones</td>

          </tr>

          @endforeach

        </tbody>

      </table>

    </div>

  </div>

</div>

@endsection
