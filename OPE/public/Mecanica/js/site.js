var html = '';
function getData(dietorio, obj){
    $.post(dietorio,
    { obj: JSON.stringify(obj)},
    function(data,status){
       html = data
       setTimeout( function(){console.log(data) } ,2000)
    });
}
    function vazio(obj) {
      if (obj.value.length < 1) {
        $('input[name='+obj.name+']').addClass('btn-danger')
        return true;
      }
      return false;
    }
    
    function validarCliente(obj){
      if (vazio(obj[0]) != true && vazio(obj[1]) != true) {
        salvaCliente()
      }
    }
    function salvaCliente() {
      getData('/controller.php?acao=SalvarCliente', $(".formCliente").serializeArray());
      setTimeout(function(){

        if (html.indexOf('1') >= 1) {
          $('.ClienteCd').remove();
          alert("cliente cadastrado!");
      }
    
    }, 1000); 

    }
    function relatoriogeral() {
      window.location.href = "/controller.php?acao=relatoriogeral";

    }

    function relatoriogeralemail() {
      //window.location.href = "/controller.php?acao=relatoriogeralemail";


      setTimeout(function(){

        alert('Enviado para seu email');

    }, 4000);
    }




    // continua
    // passar clienteid e retornar um select com os
    // carros se tiver caso nao tenha fala que nao tem
    function listarVeiculo(){
      let valinput = $('#selectcliente').val();
        getData('/controller.php?acao=vc', valinput)
        setTimeout(function(){ $('.selectVeiculoPorCliente').html(html) }, 1000);

    }
    function iniciarManutencao(){
        let ClienteId = $('#selectcliente').val();
        let VeiculoId = $('#VeiculoId').val();
        let PedidoObs = $('#PedidoObs').val();
        getData('/controller.php?acao=iniciarManutencao',{ClienteId: ClienteId, VeiculoId: VeiculoId, PedidoObs: PedidoObs});
        setTimeout(function(){

          if (html.indexOf('1') >= 1) {
            $('.imbox').remove();
            $('.k-pager-refresh').click();
            alert("Pedido cadastrado!");
        }else{
          alert("Preencha corretamente")
        }

        }, 2000);
    }


    function salvarCliente() {
      event.preventDefault();
        validarCliente($(".formCliente").serializeArray());
    }

    function ma() {
      getData('/View/ma/ma.php', null)
      setTimeout(function(){ popUp(html, 'Manutenções em andamento', 'ma', '12') }, 1000);
    }

    function rm() {
      getData('/View/rm/rm.php', null)
      setTimeout(function(){ popUp(html, 'Relatório de manutenção', 'rm', '12') }, 1000);
    }
    function fcf() {
      getData('/View/ff/ff.php', null)
      setTimeout(function(){ popUp(html, 'Cadastrar fornecedor', 'ff', '12') }, 1000);
    }
  function fcc() {
    getData('/View/Cliente/cadastrarCliente.php', null)
    setTimeout(function(){ popUp(html, 'Cadastrar cliente', 'ClienteCd', '12') }, 1000);
  }
  function addPeca(){
    getData('/View/fp/fp.php', null)
    setTimeout(function(){ popUp(html, 'Add peça', 'pecaadd', 6) }, 1000);
  }
  function addServico(){
    getData('/View/fs/fs.php', null)
    setTimeout(function(){ popUp(html, 'Add serviço', 'servicoadd', 6) }, 1000);
  }
  function fecharPopUP(classe){
    $('.'+classe).remove()
  }
  function popUp(data, titulo, classe, tamanho) {
    fecharPopUP(classe)
    $(".toAdd").prepend(' '+
    '<div class="col-xl-'+tamanho+' rounded col-lg-'+tamanho+' '+
    classe+ '  ">'+
      '<div class="card shadow mb-4">'+
      ' <!-- Card Header - Dropdown -->'+
        ' <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">'+
        '   <h6 class="m-0 font-weight-bold text-primary">'+
        titulo+
        '</h6>'+
          '<button type="button" onclick="$(\'.'+classe+'\').remove()"'+
          ' class="close float-right" aria-label="Close">' +
          '<span aria-hidden="true">&times;</span>'+
          '</button>'+
        ' </div>'+
        ' <div class="card-body">'+
      data+
      ' </div>'+
      '</div>'+
    '</div>');

    window.scrollTo(0, 0);


  }
  function fcv(){
    getData('/View/cv/cv.php', null);

    setTimeout(function(){
      popUp(html, 'Cadastrar veiculo', 'cvbox', '6')
    }, 1000);

  }

  function im(){
    getData('/View/im/im.php', null);

    setTimeout(function(){
      popUp(html, 'Iniciar manutenção', 'imbox', '6')
    }, 1000);

  }
  function pedidoDeManutencao(PedidoId){
    popUp('<div class="infoCliente" ></div>', 'Detalhes da manutenção', 'boxmanutencao', 12)
    getData('/controller.php?acao=editarPedido', PedidoId);

    // prototipo
    //getData('/controller.php?acao=prototipo', PedidoId);
    setTimeout(function(){
      popUp(html, 'Detalhes da manutenção', 'boxmanutencao', 12)
    }, 1000);

  }

  function cadastrarPecaInsert() {
    getData('/View/cp/cp.php', null);
    setTimeout(function(){
      popUp(html, 'Cadastrar peça', 'cpbox', '6')
    }, 1000);
  }


  function cadastrarServicoInsert() {
    getData('/View/cs/cs.php', null);
    setTimeout(function(){
      popUp(html, 'Cadastrar serviço', 'csbox', '6')
    }, 1000);
  }

  function fcm(){
    getData('/View/fm/fm.php', null);

    setTimeout(function(){
      popUp(html, 'cadastrar modelo', 'cmbox', '6')
    }, 1000);

  }

  function assparcela(idpedido){
    getData('/controller.php?acao=cpp', idpedido);

    setTimeout(function(){
      popUp(html, 'cadastrar parcela', 'cpp', '6')
    }, 1000);

  }

  function salvarparcela(idpedido){

    getData('/controller.php?acao=inserevalor', {idpedido: idpedido, valor: $('#np').val()});

    // setTimeout(function(){ 
    //   popUp(html, 'cadastrar parcela', 'cpp', '6') 
    // }, 1000); 

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
 

  
  $('.relatorioManutencao').click(()  =>{   
    rm(); 
  });
  
  $('.cadastrarFornecedor').click(()  =>{   
    fcf(); 
  });
  
  $('.cadastrarCliente').click(()  =>{   
      fcc(); 
  });

  
  
  $('.salvarCliente').click(()  =>{
      salvarCliente()
      
  });

  $('.im').click(()  =>{
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
        var $anchor = $(this);
        $('html, body').stop().animate({
          scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
      });
    
    })(jQuery); // End of use strict
});