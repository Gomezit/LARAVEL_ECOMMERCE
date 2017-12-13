$.fn.editable.defaults.mode = 'inline';
$.fn.editable.defaults.ajaxOptions = {type: 'PUT'};


$(document).ready(function(){

$(".set_guide_number").editable();

$(".select_status").editable({

  source:[
    {value:"creado",text:"Creado"},
    {value:"enviado",text:"Enviado"},
    {value:"recibido",text:"Recibido"}
  ]

});

$(".add-to-cart").submit(function(event){

alert("");

  event.prevenDefault();

  var form = $(this);
  var btn = $form.find("[type='submit']");



  $ajax({

    url : $form.attr("action"),
    method : $form.attr("method"),
    data: $form.serialize(),
    beforeSend : function(){

      btn.val("Cargando...");
    },
    succes : function(data){

      btn.css("background-color","#00c853").val("Agregado");

      console.log(data);

      setTimeout(function(){
        restartBtn(btn);
      },2000);
    },
    error : function(err){
      console.log(err);
        btn.css("background-color","red").val("Hubo un error");

        setTimeout(function(){
          restartBtn(btn);
        },2000);
    }
  });


  return false;

});

function restartBtn(btn){

  btn.val("Agregar al carrito").attr("style",);

}


});
