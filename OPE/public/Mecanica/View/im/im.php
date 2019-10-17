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



<? btn('btn-outline-dark btn-block  menuItem ', 
    'Cadastrar cliente',
    'fcc',
    ''); ?>



<br>



<div id="camposelectCliente"></div>


</div>


<div class="col-6">

<div class="selectVeiculoPorCliente mb-3">

</div>

<? btn('btn-outline-dark btn-block  menuItem cadastrarVeiculo', 
    'Cadastrar veiculo',
    'fcv',
    ''); ?>

</div>


<div class="col-12 ">

<? input('PedidoObs', 
  'Obs', 'Obs',
  'form-control mb-3', 
  'text',
  '' ); ?>



  <? btn('btn-outline-dark btn-block  menuItem cadastrarVeiculo', 
    'Iniciar manutenção',
    'iniciarManutencao',
    ''); ?>



</div>


</form>
</div>

