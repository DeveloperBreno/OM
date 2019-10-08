<?php session_start(); ?>

<style>

html *{
 text-transform: uppercase !important; 
 font-size: 20px !important;

}
.formCliente input[type='text'], .formCliente input[type='number'], .formCliente input[type='email']{
  background: #352d2d00 !important;color: #fff !important;border: 0px !important;
  text-transform: uppercase !important; 
  font-size: 20px;
}

table{
  background: #000000c9 !important;
  color: #fff !important;

}

.card{
  background-color:rgba(81, 81, 81, 0.71); color: #fff !important;
}

input[type='text'], input[type='number']{
  border-bottom: 2px #fff solid !important;
}

.popupexcluirparcela{
  width: 20%;
position: fixed;
height: 100px;
z-index: 111;
background: #000000bd;
top: 119px;
left: 40%;
border-radius: 10px;
display: none;
text-align: center;
font-size: large;
border: 1px solid;
padding-top: 10px;
color: #fff;
}

@media only screen and (max-width: 1000px) {
  body{
    background-size: 0;
  }
  #espaco{
    margin-top: 100px !important;
  }
  #nomeSistema, sup{
    font-size: 15px !important;
  }
  
}


</style>


<? require 'View/acesso.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>system of down</title>

<? 	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$p = explode("/", $actual_link);
			array_pop($p);
			$url = '';
			foreach ($p as $k => $v) {
				$url = $url . $v . '/';
			} ?>


<link rel="icon" href="ima/logo.svg">
<? require 'View/importacao.php'; ?>
<script src="<? echo $url; ?>js/jquery/jquery.js"></script> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>

<!-- <link rel="stylesheet" type="text/css" href="<? echo $url; ?>css/site.css"> -->



<script>




var html = '';
function getData(dietorio, obj){
   html = '';
    $.post(dietorio,
    { obj: JSON.stringify(obj)},
    function(data,status){
      html = data;
    });
}
    function vazio(obj) {
      if (obj.value.length < 1) {
        $('input[name='+obj.name+']').addClass('btn-light')
        return true;
      }
      return false;
    }
    function validarCliente(obj){
      if (vazio(obj[0]) != true && vazio(obj[1]) != true) {
        salvaCliente()
      }
    }



    
    function contato(id){
      event.preventDefault();
      getData('<? echo $url; ?>controller.php?acao=contato', id);
      setTimeout(function(){ popUp(html, 'Contatos ', 'contasClientestelcel', '12') }, 1000); 

  }


  

  function Addcontatocliente(id){
    event.preventDefault();
      $('.contasClientestelcel').remove();
      getData('<? echo $url; ?>controller.php?acao=Addcontatocliente', id);
      setTimeout(function(){ popUp(html, 'Add contato ', 'addccibd', '12') }, 1000); 
  
    }

  function excluirContato(id){
      $('.contasClientestelcel').remove();
      getData('<? echo $url; ?>controller.php?acao=excluirContato', id);
  }



    function excluirCliente(id){
      $('.dce').remove()
      getData('<? echo $url; ?>controller.php?acao=excluirCliente', id);
      listarCliente();

  }


  function salvarNovoContato(){
    event.preventDefault();
      let obj = event.target; 
      $(obj).parent().hide();

      getData('<? echo $url; ?>controller.php?acao=salvarNovoContato', $("#Addcontatocliente").serializeArray());
      setTimeout(function(){
      
        if (html.indexOf('1') >= 1) {
          fecharPopUP('addccibd');
          alert('Cadastrado');
      }else{
        $(obj).show(); 

        $(obj).parent().show(); 
        alert("Preencha corretamente");
        
      }
    
    }, 1000); 

  }

    function AtualizarCliente() {
      event.preventDefault();
      let obj = event.target; 
      $(obj).parent().hide();

      getData('<? echo $url; ?>controller.php?acao=AtualizarCliente', $("#clienteupdate").serializeArray());
      setTimeout(function(){
      
        if (html.indexOf('1') >= 1) {
          $('.dce').remove();
          listarCliente();
      }else{
        $(obj).show(); 

        $(obj).parent().show(); 
        alert("Preencha corretamente");
        
      }
    
    }, 1000); 

    }

    function salvaCliente() {
      $('.salvarCliente').hide();
      getData('<? echo $url; ?>controller.php?acao=SalvarCliente', $(".formCliente").serializeArray());
      setTimeout(function(){
      
        if (html.indexOf('1') >= 1) {
          $('.ClienteCd').remove();
          alert("cliente cadastrado!");
      }else{
        alert("Preencha corretamente");
        $('.salvarCliente').show();
      }
    
    }, 1000); 

    }

    

  

    function relatoriogeral() {
      window.location.href = "<? echo $url; ?>controller.php?acao=relatoriogeral";

    }

    function relatoriogeralemail() {
      //window.location.href = "<? echo $url; ?>controller.php?acao=relatoriogeralemail";
      

      setTimeout(function(){

        alert('Enviado para seu email');
    
    }, 1000); 
    }
    
    


    // continua
    // passar clienteid e retornar um select com os 
    // carros se tiver caso nao tenha fala que nao tem
    function listarVeiculo(){
      let valinput = $('#selectcliente').val();
        getData('<? echo $url; ?>controller.php?acao=vc', valinput)
        setTimeout(function(){ $('.selectVeiculoPorCliente').html(html) }, 1000); 
        
    }
    function listarCliente(){
        getData('<? echo $url; ?>controller.php?acao=listarCliente', null)
        setTimeout(function(){ popUp(html, 'Clientes', 'lca', '12') }, 1000); 

    }

    
    function iniciarManutencao(){
        $('.cadastrarVeiculo').hide();
        if($('#selectcliente').length == 0){
          alert('Preencha corretamente');
          $('.cadastrarVeiculo').show();
          console.log('.cadastrarVeiculo');

          return null;
        }
        
        
        if($('#VeiculoId').val() == "null"){
          alert('Preencha corretamente');
          console.log('#VeiculoId');
          $('.cadastrarVeiculo').show();
          return null;
        }
        
        let ClienteId = $('#selectcliente').val();
        let VeiculoId = $('#VeiculoId').val();
        let PedidoObs = $('#PedidoObs').val();
        getData('<? echo $url; ?>controller.php?acao=iniciarManutencao',{ClienteId: ClienteId, VeiculoId: VeiculoId, PedidoObs: PedidoObs});
        setTimeout(function(){

          if (html.indexOf('1') >= 1) {
            $('.imbox').remove()
            alert("Pedido cadastrado!");
            $('.k-pager-refresh').click();
        }else{
          alert('Preencha corretamente')
          $('.cadastrarVeiculo').show();
        }

        }, 1000); 
    }
    

    function salvarCliente() {
      event.preventDefault();
        validarCliente($(".formCliente").serializeArray());
    }

    function ma() {
      getData('<? echo $url; ?>View/ma/ma.php', null)
      setTimeout(function(){ popUp(html, 'Manutenções em andamento', 'ma', '12') }, 1000); 
    }
    
    function rm() {
      getData('<? echo $url; ?>View/rm/rm.php', null)
      setTimeout(function(){ popUp(html, 'Relatório de manutenção', 'rm', '12') }, 1000); 
    }


    

    function cadastrarFornecedorInsert() {
      $('.cadastrarFornecedorInsert').hide();
      getData('<? echo $url; ?>controller.php?acao=cadastrarFornecedor', $("#cadastrarFornecedor").serializeArray())
      setTimeout(function(){ 
    if (html.indexOf('1') >= 1) {
      $('.ff').remove();
      alert("Fornecedor cadastrado");

      }else{
        alert("preencha corretamente");
        $('.cadastrarFornecedorInsert').show();
      }
    }, 1000); 
    
    
    
    }


    function listarfornecedores(){
      $('.navbar-toggler').click()
      getData('<? echo $url; ?>controller.php?acao=listarfornecedores', null)
      setTimeout(function(){ popUp(html, 'Listar fornecedores', 'lf', '12') }, 1000); 
    }


    function relatorioFornecedores(){

      window.location.href = "<? echo $url; ?>controller.php?acao=relatorioFornecedores";

   }

    

    function fcf() {
      getData('<? echo $url; ?>View/ff/ff.php', null)
      setTimeout(function(){ popUp(html, 'Cadastrar fornecedor', 'ff', '12') }, 1000); 
    }
  function fcc() {
    getData('<? echo $url; ?>View/Cliente/cadastrarCliente.php', null)
    setTimeout(function(){ popUp(html, 'Cadastrar cliente', 'ClienteCd', '12') }, 1000); 
  }
  function addPeca(){
    getData('<? echo $url; ?>View/fp/fp.php', null)
    setTimeout(function(){ popUp(html, 'Add peça', 'pecaadd', 6) }, 1000); 
  }
  function addServico(){
    getData('<? echo $url; ?>View/fs/fs.php', null)
    setTimeout(function(){ popUp(html, 'Add serviço', 'servicoadd', 6) }, 1000); 
  }
  function fecharPopUP(classe){
    $('.'+classe).hide('fast');
    $('.'+classe).remove();

    
  }
  function popUp(data, titulo, classe, tamanho) {
    fecharPopUP(classe);
  
    $(".toAdd").prepend(' '+
    '<div class="col-xl-'+tamanho+'  rounded col-lg-'+tamanho+' '+
    classe+ '  " >'+
      '<div class="card shadow mb-4" style="background-color:rgba(81, 81, 81, 0.71); color: #fff;" >'+
      ' <!-- Card Header - Dropdown -->'+
        ' <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">'+
        '   <h6 style="color: #fff !important;text-shadow: 1px 1px 4px #000;font-size: 20px;" class="m-0 font-weight-bold">'+
        titulo+
        '</h6>'+
          "<button onclick=\"fecharPopUP('"+classe+"')\""+
          ' class="close float-right" aria-label="Close">' +
          '<span aria-hidden="true" style="background: #fff !important;padding: 5px 10px;border-radius: 24px !important;" >&times;</span>'+
          '</button>'+
        ' </div>'+
        ' <div class="card-body">'+                    
      data+
      ' </div>'+
      '</div>'+
    '</div>');
    $('.'+classe).hide();
    $('.'+classe).show('slow');
          
    window.scrollTo(0, 0);

   
  }
  function fcv(){
    getData('<? echo $url; ?>View/cv/cv.php', null);

    setTimeout(function(){ 
      popUp(html, 'Cadastrar veiculo', 'cvbox', '6') 
     }, 1000); 
  }

  function confirmadoExcluir(id){
    $('.popupexcluirparcela').hide();
    getData('<? echo $url; ?>controller.php?acao=confirmadoExcluir', id);
    setTimeout(function(){ pedidoDeManutencao($('.pedidoatual').val()) }, 0); 

  }
  

  


  function removerParcela(id){
    $('.popupexcluirparcela').html("Excluir parcela <br>"+
    " <button class=\"btn btn-light\" onclick=\"confirmadoExcluir("+id+")\">Excluir</button>" +
    " <button class=\"btn btn-info \" onclick=\"$('.popupexcluirparcela').hide(); \">Cancelar</button>");
    $('.popupexcluirparcela').show();
  }


  function im(){
    getData('<? echo $url; ?>View/im/im.php', null);
    
    setTimeout(function(){ 
      popUp(html, 'Iniciar manutenção', 'imbox', '6');
    }, 1000); 

  }

  function pedidoatual(id){
    $('.pedidoatual').remove();
    $("#page-top").append('<input type="hidden" class="pedidoatual" value="'+id+'">');
    
  }

  function pedidoDeManutencao(PedidoId){
    pedidoatual(PedidoId);
    popUp('<div class="infoCliente" ></div>', 'Detalhes da manutenção', 'boxmanutencao', 12)
    getData('<? echo $url; ?>controller.php?acao=editarPedido', PedidoId);

    // prototipo
    //getData('<? echo $url; ?>controller.php?acao=prototipo', PedidoId);
    setTimeout(function(){ 
      popUp(html, 'Detalhes da manutenção', 'boxmanutencao', 12)
    }, 1000); 
    
  }
  
  function cadastrarPecaInsert() {
    getData('<? echo $url; ?>View/cp/cp.php', null);
    setTimeout(function(){ 
      popUp(html, 'Cadastrar peça', 'cpbox', '6') 
    }, 1000); 
  }


  function cadastrarServicoInsert() {
    getData('<? echo $url; ?>View/cs/cs.php', null);
    setTimeout(function(){ 
      popUp(html, 'Cadastrar serviço', 'csbox', '6') 
    }, 1000); 
  }

  function fcm(){
    getData('<? echo $url; ?>View/fm/fm.php', null);

    setTimeout(function(){ 
      popUp(html, 'cadastrar modelo', 'cmbox', '6') 
    }, 1000); 

  }


  
  function detalheCliente(idcliente){
    getData('<? echo $url; ?>controller.php?acao=detalheCliente', idcliente);
    setTimeout(function(){ 
      popUp(html, 'Detalhes do cliente', 'dce', '12') 
    }, 1000); 
  }

  function assparcela(idpedido){
    getData('<? echo $url; ?>controller.php?acao=cpp', idpedido);

    setTimeout(function(){ 
      popUp(html, 'cadastrar parcela', 'cpp', '6') 
    }, 1000); 

  }
  function salvarparcela(idpedido){
    $('.cadastrarVeiculo').hide();
    getData('<? echo $url; ?>controller.php?acao=inserevalor', {idpedido: idpedido, valor: $('#np').val()});
    setTimeout(function(){ 
    if (html.indexOf('1') >= 1) {
      alert("Parcela cadastrada");
      $('.cpp').remove();
      pedidoDeManutencao(idpedido);
      }else{
        alert("preencha corretamente");
        $('.cadastrarVeiculo').show();
      }
    }, 1000); 


  }


  



  
  
  
    // api requests para endereço
    function getDadosEnderecoPorCEP(cep) {


      $.get('https://viacep.com.br/ws/'+cep+'/json/unicode/',
          
          function(data,status){
              $('#CEP').val(data.logradouro) 
          });

  }


  $( document ).ready(function() {
    ma();
 

    

    $('.cadastrarFornecedorInsert').click(()  =>{   
      $('.navbar-toggler').click()
      cadastrarFornecedorInsert(); 
  });

  $('.relatorioManutencao').click(()  =>{   
    $('.navbar-toggler').click()
    rm(); 
  });
  
  $('.cadastrarFornecedor').click(()  =>{   
    $('.navbar-toggler').click()
    fcf(); 
  });
  
  $('.cadastrarCliente').click(()  =>{  
    $('.navbar-toggler').click() 
      fcc(); 
  });

  
  
  $('.salvarCliente').click(()  =>{
    $('.navbar-toggler').click()
      salvarCliente()
      
  });

  $('.im').click(()  =>{
    $('.navbar-toggler').click()
    im()
    
});
    (function($) {
      "use strict"; // Start of use strict
    
      // Toggle the side navigation
      $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
          $('.sidebar .collapse').collapse('hide');
        };
      });
    
      // Close any open menu accordions when window is resized below 768px
      $(window).resize(function() {
        if ($(window).width() < 768) {
          $('.sidebar .collapse').collapse('hide');
        };
      });
    
      // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
      $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
        if ($(window).width() > 768) {
          var e0 = e.originalEvent,
            delta = e0.wheelDelta || -e0.detail;
          this.scrollTop += (delta < 0 ? 1 : -1) * 30;
          e.preventDefault();
        }
      });
    
      // Scroll to top button appear
      $(document).on('scroll', function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
          $('.scroll-to-top').fadeIn();
        } else {
          $('.scroll-to-top').fadeOut();
        }
      });
    
      // Smooth scrolling using jQuery easing
      $(document).on('click', 'a.scroll-to-top', function(e) {
        $('.navbar-toggler').click()
        var $anchor = $(this);
        $('html, body').stop().animate({
          scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
      });
    
    })(jQuery); // End of use strict
});
</script>

<base href="https://demos.telerik.com/kendo-ui/grid/index">
    <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }</style>
    <title></title>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.3.917/styles/kendo.default-v2.min.css" />

    <script src="https://kendo.cdn.telerik.com/2019.3.917/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2019.3.917/js/kendo.all.min.js"></script>
    <base href="https://demos.telerik.com/kendo-ui/grid/excel-export">
    <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }</style>
    <title></title>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.3.917/styles/kendo.default-v2.min.css" />

    <script src="https://kendo.cdn.telerik.com/2019.3.917/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2019.3.917/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2019.3.917/js/kendo.all.min.js"></script>



</head>

<body id="page-top" style="background-repeat: no-repeat;background-attachment: fixed;background-image: url('<? echo $url; ?>ima/fundo.png') ;background-size: 145%; background-position: center; background-color: #151414;" >

  <!-- Page Wrapper -->
  <div id="wrapper">

  <div class="row col-12 p-0 mr-0  ml-0 bg-dark text-white mb-3" style="position: fixed;z-index:1;">
  <div class="col-12">
  <nav class="navbar navbar-expand-lg p-0">
   <div id="nomeSistema" class="sidebar-brand-text mx-3 text-primary" >system of <sup>down</sup></div>
   <button class="p-0 m-0 navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="m-0 navbar-toggler-icon" style="color: #007bff !important;font-size: 37px !important;margin-top: 10px;">≡</span>
  </button>
  <div class="navbar-collapse collapse" id="navbarNav" style="">
    <ul class="navbar-nav">
      <li class="nav-item active">
<!-- Sidebar - Brand -->

<li class="nav-item">
        <button   class="im btn btn-light ">Iniciar manutenção</button>      </li>
      </li>
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
  <i class="fas fa-laugh-wink"></i>
  </div>
</a>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle bg-dark text-white" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Cliente 
        <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in bg-dark text-white" aria-labelledby="alertsDropdown">
                
        <button    class="border-0 btn btn-light btn-block menuItem cadastrarCliente bg-dark text-white">
Cadastrar</button>

<button  onclick="listarCliente()" class="border-0 btn btn-light btn-block menuItem bg-dark text-white">
Listar</button>
              </div>
            </li>



            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle bg-dark text-white"  href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Fornecedores 
        <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in bg-dark text-white" aria-labelledby="alertsDropdown">
                
        <button    class="border-0 btn-block btn-light btn menuItem cadastrarFornecedor bg-dark text-white">
Cadastrar</button>

<button   onclick="listarfornecedores()" class="border-0 btn-block btn-light btn menuItem bg-dark text-white">
Listar</button>

<button   onclick="relatorioFornecedores()" class=" border-0 btn-block btn-light btn menuItem bg-dark text-white">
Relatório de fornecedores</button>
              </div>
            </li>


            <li class="nav-item dropdown no-arrow mx-1">
              <a class="border-0 nav-link dropdown-toggle bg-dark text-white" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Relatórios 
        <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in bg-dark text-white" aria-labelledby="alertsDropdown" style="width: 280px;">
                
        <button   onclick="ma()"  class="border-0 btn btn-light btn-block menuItem bg-dark text-white">
Relatórios de Manutenções</button>

<button   onclick="relatoriogeral()"  class="btn btn-light  menuItem bg-dark text-white border-0">
Relatórios pedidos com clientes e peças</button>


<button   onclick="relatoriogeralemail()"  class="border-0 btn btn-light  menuItem bg-dark text-white">
Relatórios pedidos com clientes e peças por email</button>


              </div>
            </li>
    <!-- perfil de usuario -->
  <div class="nav-item dropdown no-arrow float-right">
              <a class="nav-link dropdown-toggle bg-dark text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['FuncionarioNome']; ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in bg-dark text-white" aria-labelledby="userDropdown">
                <a class="dropdown-item bg-dark text-white text-white" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400  text-white bg-dark text-white"></i>
                  Perfil
                </a>
               
                <a class="dropdown-item bg-dark text-white text-white" href="<? echo $url; ?>login.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 bg-dark text-white"></i>
                  Sair
                </a>
              </div>
</div>
      <li class="nav-item">
 
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
  <div class="bg-white py-2 collapse-inner rounded">
    <!-- <h6 class="collapse-header">Custom Components:</h6> -->
    
  </div>
  </div>
     
  </div>
</nav>
  </div>


</div>

<div class="container">

</div>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div> -->

          <div id="espaco" class="row toAdd mt-5 pt-4">

           
             </div>     
        </div>
        <!-- /.container-fluid -->
      </div>
    

    </div>
    <!-- End of Content Wrapper -->

  </button>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button   class="close"   data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button   class="btn btn-secondary"   data-dismiss="modal">Cancel</button>
          <a class="btn btn-light" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- <button   style="position: fixed;right: 10px;bottom: 10px;width: 115px;height: 115px;border-radius: 100px;" class="im btn btn-light">Iniciar manutenção</button> -->


<div class="popupexcluirparcela">


</div>


</body>
</html>







