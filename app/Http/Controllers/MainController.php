<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ShoppingCart;
use App\Product;

//CONTROLADOR QUE LISTA LOS PRODUCTOS PAGINADOS EN ESTE CASO(3) EN LA VISTA DE INICIO

class MainController extends Controller{
  public function home(){

    $products = Product::latest()->simplePaginate(3);


    return view('main.home',['products' => $products]);
  }
}
