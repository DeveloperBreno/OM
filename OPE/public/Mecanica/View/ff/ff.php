
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


$(document).ready(function() {
    
  
  
  $('.cadastrarVeiculo').click(()  =>{   
    getData('<? echo $url; ?>/controller.php?acao=cadastrarVeiculo', $("#cadastrarVeiculo").serializeArray());
    setTimeout(function(){

    if (html.indexOf('1') >= 1) {
      $('.ff').remove();
      alert("Cadastrado!");
    }

    }, 1000); 



  });
  





});


</script>



<div class="row">
<div class="col-6">
<form action="" id="cadastrarFornecedor" >

<label class="col-sm-12" for="FornecedorNome">Nome: </label>
<input type="text" class="col-sm-12" id="FornecedorNome" placeholder="" name="FornecedorNome">


<label class="col-sm-12" for="FornecedorCnpj">CPF | CNPJ: </label>
<input type="text" class="col-sm-12" id="FornecedorCnpj" placeholder="" name="FornecedorCnpj">


<label class="col-sm-12" for="FornecedorObs">Obs. </label>
<input type="text" class="col-sm-12" id="FornecedorObs" placeholder="" name="FornecedorObs">


</div>
<div class="col-6">






<label class="col-sm-12" for="FCEP">CEP </label>
<input maxlength="8" type="text" class="col-sm-12" id="FCEP" placeholder="" name="FornecedorCep">




<label class="col-sm-12" for="FornecedorEndereco">Endereço </label>
<input type="text" class="col-sm-12" id="FornecedorEndereco" placeholder="" name="FornecedorEndereco">

<label class="col-sm-12" for="FornecedorNumero
">Número </label>
<input type="text" class="col-sm-12" id="FornecedorNumero
" placeholder="" name="FornecedorNumero">




</div>
<div class="col-12 mt-3">
<button  onclick="cadastrarFornecedorInsert()" class="btn btn-light cadastrarFornecedorInsert">
  Cadastrar fornecedor
</button>

</form>

</div>

</div>

