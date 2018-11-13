<?php

namespace App;

class Paypal
{


      private $_apiContext;
      private $shopping_cart;

      //DATOS DE LA CUENTA CREADA EN PAYPAL TEST STORE
      //https://developer.paypal.com
      //alexandraseller@hotmail.com
      //admin123
      private $_ClientId='AXLAmn1J0IWZHWq-mz5srWpDJ63WVZjevFO2uUy1E1C4m0cZ7bv9sSrt2YWUHpXjaDh1VwNd6O5_VFQr';
      private $_ClienteSecret='ELRL0XOEgIzkhduMozzRncKwSmkYnsuukVjibUCO6IAxMwG3-UP-1ifg6rKPZ6PrSYQDVH3_b7KGaKpg';


      public function __construct($shopping_cart){

        $this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId,$this->_ClienteSecret);
        $config = config('paypal_payment');
        $flatConfig = array_dot($config);
        $this-> _apiContext->setConfig($flatConfig);
        $this->shopping_cart=$shopping_cart;

      }

      public function generate(){

        $payment = \PaypalPayment::payment()->
        setIntent('sale')->
        setPayer($this->payer())->
        setTransactions([$this->transaction()])->
        setRedirectUrls($this->redirectURLs());

        try {

          $payment->create($this->_apiContext);

        } catch (Exception $e) {

          dd($e);
          exit(1);
        }

        return $payment;

      }

      public function payer(){

        return \PaypalPayment::payer()->setPaymentMethod('paypal');

      }

      public function transaction(){

        return \PaypalPayment::transaction()->setAmount($this->amount())->setItemList($this->items())->setDescription('Tu compra ')->setInvoiceNumber(uniqid());

      }

      public function items(){

        $items=[];
        $products = $this->shopping_cart->products()->get();

        foreach ($products as $product) {
          array_push($items,$product->paypalItem());
        }

        return \PaypalPayment::itemList()->setItems($items);
      }

      public function amount(){

        return \PaypalPayment::amount()->setCurrency('USD')->setTotal($this->shopping_cart->totalUSD());

      }

      public function redirectURLs(){

        $baseUrl = url('/');
        return \PaypalPayment::redirectUrls()->setReturnUrl($baseUrl.'/payments/store')->setCancelUrl($baseUrl.'/carrito');

      }

      public function execute($paymentId,$PayerID){

        $payment = \PaypalPayment::getById($paymentId,$this->_apiContext);
        $execution = \PaypalPayment::PaymentExecution()->setPayerId($PayerID);
        $response = $payment->execute($execution,$this->_apiContext);

        return $response;

      }

}
