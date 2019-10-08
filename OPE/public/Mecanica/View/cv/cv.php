
<? 	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$p = explode("/", $actual_link);
      array_pop($p);
      array_pop($p);
      array_pop($p);
			$url = '';
			foreach ($p as $k => $v) {
				$url = $url . $v . '/';
			} ?>

<div class="row">
<div class="col-6">
<label class="col-sm-12" for="placa">Placa</label>
<input type="Nome" class="col-sm-12 placanome" id="placa" placeholder="Exeplo: ABC-1234" name="Nome">

<label class="col-sm-12" for="ano">Ano</label>
<input type="Nome" class="col-sm-12 anoveiculo" id="ano" placeholder="Exeplo: 1980" name="Nome">

<label class="col-sm-12" for="VeiculoRenavam">Renavam</label>
<input type="number" class="col-sm-12 VeiculoRenavam" id="VeiculoRenavam" placeholder="Renavam" name="VeiculoRenavam">


<label class="col-sm-12" for="pm">Pesquisar modelo</label>




<script>
  $( document ).ready(function() {
    $('.pmv').keyup(()  =>{
      let texto = $('.pmv').val();
      if(texto.length > 2){
        getData("<? echo $url; ?>controller.php?acao=pmv", texto);
        setTimeout(function(){
        $('#cadmodelos').html(html);
        }, 500); 
      }      
    });
  });
</script>


<input type="Nome" class="col-sm-12 pmv" id="pm" placeholder="modelo do veiculo" name="Nome">
<div id="cadmodelos"></div>

<p style="text-align: center;"> ou </p>
<button   onclick="fcm()" class="btn btn-light btn text-white -block collapse-item  menuItem ">
Cadastrar modelo</button>

</div>


<div class="col-6">


<script>
  $( document ).ready(function() {
    $('.clientesVeiculo').keyup(()  =>{
      let texto = $('.clientesVeiculo').val();
      if(texto.length > 2){
        getData("<? echo $url; ?>controller.php?acao=pesquisarCliente", texto);
        setTimeout(function(){
        $('#addclientes').html(html);
        }, 500); 
      }      
    });
  });
</script>




<label class="col-sm-12" for="nc">Pesquisar cliente</label>
<input type="Nome" class="col-sm-12 clientesVeiculo" id="nc"  placeholder="Exemplo: João" name="Nome">
<br>

<div id="addclientes"></div>


<p style="text-align: center;"> ou </p>
<button   onclick="fcc()" class="btn btn-light btn text-white -block collapse-item  menuItem ">
Cadastrar Cliente</button>

<br>
</div>


<script>
  $( document ).ready(function() {

    $('.cadastrarVeiculo').click(()  =>{

      getData('<? echo $url; ?>controller.php?acao=icv',
      {VeiculoPlaca: $('.placanome').val(), 
        ClienteId: $('#selectcliente').val(),
        VeiculoAno: $('.anoveiculo').val(),
        ModeloId: $('#ModeloId').val(),
        VeiculoRenavam:$('#VeiculoRenavam').val()});
        setTimeout(function(){
        if (html.indexOf('1') >= 1) {
          $('.cvbox').remove()
          alert("Cadastrado!");
        }else{
          alert("Preencha corretamente");

        }

        }, 500); 
      
    });

  });
</script>



<div class="col-12 mt-3">
<button   href="buttons.html" class="btn btn-light cadastrarVeiculo">
  Cadastrar veiculo
</button>
</div>

</div>

