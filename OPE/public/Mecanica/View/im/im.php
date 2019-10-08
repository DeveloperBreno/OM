<? require '../../../../001Mecanica/Function.php';  ?>

<? 	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$p = explode("/", $actual_link);
      array_pop($p);
      array_pop($p);
      array_pop($p);
			$url = '';
			foreach ($p as $k => $v) {
				$url = $url . $v . '/';
			} ?>
<script>
  $( document ).ready(function() {
    $('.pesquisaClienteinput').keyup(()  =>{
      let texto = $('.pesquisaClienteinput').val();
      if(texto.length > 2){
        getData("<? echo $url; ?>controller.php?acao=pesquisarCliente", texto);
        setTimeout(function(){
        $('#camposelectCliente').html(html);
        }, 500); 
      }      
    });
  });
</script>


<div class="row">
<div class="col-6">

<form id="Manutencao" >

<?php input('ClienteId', 'Pesquisar cliente', 'Exeplo: Pedro', 'pesquisaClienteinput', 'text', 'required'); ?>



<p style="text-align: center;"> ou </p>
<button   onclick="fcc()" class="btn btn-light mt-3 btn-block  menuItem ">
Cadastrar</button>
<br>



<div id="camposelectCliente"></div>


</div>


<div class="col-6">

<div class="selectVeiculoPorCliente">
<br>
</div>


<button    onclick="fcv()"  href="buttons.html" class="btn btn-light  btn-block mt-3 menuItem cadastrarVeiculo">
Cadastrar</button>
</div>


<div class="col-12 ">
  <textarea class="form-control bg-transparent text-white mb-3" id="PedidoObs" aria-label="With textarea" placeholder="Observação"></textarea>


<button   onclick="iniciarManutencao()" class="btn btn-light btn-block  menuItem cadastrarVeiculo">
Iniciar manutenção
</button>
</div>


</form>
</div>

