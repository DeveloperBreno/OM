


<? 	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$p = explode("/", $actual_link);
      array_pop($p);
      array_pop($p);
      array_pop($p);
			$url = '';
			foreach ($p as $k => $v) {
				$url = $url . $v . '/';
			} ?>
	

<? function printarTodosOsProdutosTmp($comandaValida){ 

$listaDeProdutosDeUmaComanda = listaDeProdutosDeUmaComanda($comandaValida->id_card);
//print_r($listaDeProdutosDeUmaComanda);

if (isset($listaDeProdutosDeUmaComanda[0]->nome_produto)) { ?>


<div style="overflow-x:auto; border-radius: 5px;margin-top: 10px;" >
  <table id="tabelascrool" class="table table-hover">
    <!-- <thead>
      <tr style="color: #6e95dd;background: #fff;">
        <th>QTDO</th>
        <th>Produto</th>
        <th>Valor</th>
        <th> </th>
      </tr>
    </thead> -->
    <tbody>
    	<? 
    	$total = 0;
    	foreach ($listaDeProdutosDeUmaComanda as $listkey => $v) { 
    		$total = ($total + $v->total) ;
    		?>
    		
    			
    			<tr id="trrow" >
    				
			        <td> 
			        
			        <div id="btn text-white saddremoveone" >
		        	<button   id="btn text-white addprodutobtn text-white js" class="c btn btn-light" 
		        		onclick="addone(<?= $v->id_produto_venda ?>)" > </button>  
		        	   <?= $v->quantidade ?>

		        	<button   id="btn text-white addprodutobtn text-white js" class="b btn btn-light" 
		        		onclick="removeone(<?= $v->id_produto_venda ?>)" > </button>
				        </div>
			        </td>
			        <td><?= $v->nome_produto ?></td>
			        <td>R$ <?= str_replace('.', ',', $v->total); ?></td>
			        <td><button   id="btn text-white removeiitemlista"  class="btn text-white  btn text-white -danger" 
			        		onclick="removeItem(<?= $v->id_produto_venda ?>)" ><b> X </b></button></td>
					
		      	</tr>

		      	
		      	
    	<? } ?>
      
     
    </tbody>
  </table>
  </div>
  <p ><b id="totalsj">Total R$ <?= str_replace('.', ',', $total);  ?></b> <br><textarea type="text" placeholder="Obs. do pedido (Opcional)" id="obspedido"></textarea></p>
  	<input type="hidden" id="totalValor" value="<?= $total ?>" name="">


<? 
session_start();

// adm = A e funcionario = F podem finalizar e receber o pgto
if (($_SESSION['perfil'] == "A") || ($_SESSION['perfil'] == "F")) { ?>

	<style type="text/css">
		#campoAddcliente{
			overflow-y: scroll;
		}
		
		#campoAddcliente input, #campoAddcliente textarea{
			width: 100%;
		}
	</style>

	<script type="text/javascript">

	$(document).ready(() => {





		$('#obspedido').focus(()  =>{
			$('#obspedido').css("height", "60px");
		});
		$('#obspedido').focusout(()  =>{
			$('#obspedido').css("height", "30px");
		});

        $('#addCliente').click(()  =>{
			$("body").append('<div style="position: fixed;z-index: 1;width: 90%;float: left;top: 5%;height: 90%;left: 5%;box-shadow: 0px 0px 111px #000;padding: 5px;border-radius: 5px;" id="campoAddcliente"><h2 style="color: #6183c3;">Cadastar cliente </h2><button   id="close" onclick="closeCampo()" class="btn text-white  btn text-white -danger" style="float: right;margin-top: -41px;border-radius: 5px;">X</button><input type="text" id="cnome" placeholder="Nome" name="Nome" maxlength="45"><br><br><input type="number" id="ccelular" placeholder="Celular" name="Celular" maxlength="11"><br><br><input type="number" placeholder="Telefone" id="ctelefone"  name="Telefone" maxlength="11"><br><br><input type="number" id="ccep" onblur="pesquisarEndereco()" placeholder="CEP" name="Cep" maxlength="8"><br><br><input type="number" id="cnumero" placeholder="Número" name="Número" maxlength="4"><br><br><textarea name="Obs" id="cobs" maxlength="50" placeholder="Rua | Obs." ></textarea><br><br><button   id="salvar" class="btn text-white  btn text-white -success" onclick="salvarClientebtn text-white s()" style="width: 100%;border-radius: 5px;">Salvar</button>');
        });

        $('#pesquisaCliente').keyup(()  =>{
        	$('#pesquisaCliente').css({"border": "0px solid #28a745",});
        	pesquisaCliente();
        	
        	
			
        });


        





        
            $('#receber').click(() => {
	         	var id_card = $('#comandaAdd').val();
	         	var id_cliente = 0;
	         	var valorTotal = $('#totalValor').val();
	         	var frete = $('#produtoadd').val();
	         	var formapgto = 0;
	         	var valorTroco = 0;
	         	var trocoPara = 0;

	         	if (frete > 0) {
	         		formapgto = $('#formapgtoselect').val();
		         	if (formapgto == "null") {
		         		alert("Escolha a forma de Pagamento")
		         		exit();	
		         	}else if (formapgto == 1) {
		         		if($('#valorTroco').val() == undefined ){
		         			alert('Digite o "Troco para exemplo R$ 50"');
		         			$('#troco').css({"border": "5px solid red",});
		         			exit();
		         		}else{
		         			$('#troco').css({"border": "0px solid red",});
		         			valorTroco = $('#valorTroco').val();
		         			trocoPara =$('#troco').val()
		         		}
		         		
		         	}
		         	
	         	}
	         	
		      	if ($('#selectClientes').val() > 0){
		      		id_cliente = $('#selectClientes').val();
		      	}
		      	if (parseFloat($('#produtoadd').val()) > 0) {
	           			if ($('#selectClientes').val() == undefined) {
	           				alert("Marque um cliente!")
	           				$('#pesquisaCliente').css({"border": "5px solid red",});
	           				formaDePgto();
	           				event.preventDefault();
	           				exit()
	           			}else{
	           				$('#pesquisaCliente').css({"border": "0px solid red",});
	           			}		    				
	           		}
	           	// forma de pagamento 
	           	if (formapgto == 2) {
	           		formapgto = 1;
	           	}else if (formapgto == 3) {
	           		formapgto = 2;
	           	}

	           	var obspedido = '';
	           	if ($('#obspedido').val().length > 3) {
	           		obspedido = $('#obspedido').val();
	           	}
				   <? 	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$p = explode("/", $actual_link);
			array_pop($p);
			$url = '';
			foreach ($p as $k => $v) {
				$url = $url . $v . '/';
			} ?>

		      	$.post("<? echo $url; ?>controller.php?acao=pedidoFinalizado",
					{
					  id_card: id_card,
					  id_cliente: id_cliente,
					  valorTotal: valorTotal,
					  frete: frete,
					  formapgto: formapgto,
					  valorTroco: valorTroco,
					  trocoPara: trocoPara,
					  obspedido: obspedido,
					 
					},
					function(data,status){
						$('#selectClientesAqui').html(data);
						$('#add').html('<br><div role="alert" style=" color: #16686a; width: 100%;float: left; text-align: center; " > Total a cobrar: R$ <b>'+ data +'</b></div>');
						$('#Comanda').val('')
					});
        	});      
	
           	$('#produtoadd').change(()  =>{
           		
           		
           		var valor = parseFloat($('#totalValor').val());
           		var frete = parseFloat($('#produtoadd').val());
           		var total = valor + frete;
				var text   = String(total).replace(".", ","); 
           		$('#totalsj').html('Total R$ '+ text);
           		if (parseFloat($('#produtoadd').val()) > 0) {
           			if ($('#selectClientes').val() == undefined) {
           				alert("Marque um cliente!")
           				$('#pesquisaCliente').css({"border": "5px solid red",});
           				
           			}else{
	           			$('#pesquisaCliente').css({"border": "0px solid red",});


	           		}
	           		formaDePgto();
	           		selesctFormadepgto()    				
           		}else{
           			$('#formapgtoselect').remove()
           			$('#pesquisaCliente').css({"border": "0px solid red",});
           		}
           		
           	});
    });

</script>


	<button   id="addCliente" class="btn text-white  btn text-white -success" >ADD cliente</button>  <input id="pesquisaCliente"  placeholder="Pesquisar cliente" type="text"> <b id="selectClientesAqui"></b>






<br>


<button   id="frete" onclick="frete()" class="btn text-white  btn text-white -success" >Mapa</button>
<!-- <input onblur="alert(1)" type="number" name="frete" placeholder="Salvar Valor de Frete" style="font-size:21px; border-radius: 5px; color: #000; height: 60px;float: left;margin-top: 10px;width: 235px;margin-left: 5px;">
 -->
	<select id="produtoadd" class="produtoadd" style="border: 1px solid #28a745;width: 213px;-webkit-appearance: none;color: #fff;" >

			<option value="0" selected="" >Frete R$ 0,00</option>
			<option value="1">Frete R$ 1,00</option>
			<option value="2">Frete R$ 2,00</option>
			<option value="3">Frete R$ 3,00</option>
			<option value="4">Frete R$ 4,00</option>
			<option value="5">Frete R$ 5,00</option>
	</select>


<button   id="receber" class="btn text-white  btn text-white -danger">Finalizar</button>





<? }?>




<? }else{ echo "<p>Nada cadastrado!</p>"; } ?>


<? } ?>
