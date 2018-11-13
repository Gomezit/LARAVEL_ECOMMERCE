<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\Paypal;
use App\Order;

//CONTROLADOR ENCARGADO DE COBRAR VIA PAYPAL EL CARRITO DE COMPRAS

class PaymentsController extends Controller
{

  public function __construct(){

      $this->middleware('shoppingcart');

  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $shopping_cart = $request->shopping_cart;
      $paypal = new Paypal($shopping_cart);
      $response = $paypal -> execute($request -> paymentId, $request -> PayerID);

      if($response->state == 'approved'){

        \Session::remove('shopping_cart_id');

        $order = Order::createFromPayPalResponse($response,$shopping_cart);
        $shopping_cart->approve();


      }

      return view('shopping_carts.completed',['shopping_cart'=>$shopping_cart,'order' => $order]);
      //dd($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
