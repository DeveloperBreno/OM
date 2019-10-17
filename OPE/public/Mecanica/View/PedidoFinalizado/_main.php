

<?php function printar($listarPedidosSemMotoboy) {

$listaDeMotoboys = listaDeMotoboys();

 ?>


<table class="table" style="margin: 0px;">
    <thead>
      <tr>
      	<?php if ($_SESSION['perfil'] != "M") { ?>
      		<th style="width: 226px;">Selecionar motoboy</th>
      	<? }else{ ?> 
      		<th style="width: 226px;">data</th>
      	<?} ?>
        
        <th>Cliente</th>
        <th style="width: 126px;">cep</th>
        <th style="width: 79px;">Rua</th>
        <th style="width: 84px;">N</th>
        <!-- <th>Frete</th> -->
        <!-- <th>Sub total</th> -->
        <th>Celular</th>
        <th>Telefone</th>
        <th>Total</th>
      </tr>
    </thead>
    
   </table>


<div class="osy">
         
  <table class="table">
    
    <tbody>
    	
	<? foreach ($listarPedidosSemMotoboy as $k => $v) { ?>

      <tr>
        <td style="width: 177px;"> 
        	<?php if ($_SESSION['perfil'] != "M") { ?>
      		<select style="width: 200px;" class="form-control escuroselect" id="<?= $v->id_pedido_finalizado ?>">
	        	<option value="null" >Selecione motoboy</option> 
	        	<?php foreach ($listaDeMotoboys as $km => $m) { ?>
					<option value="<?= $m->id_funcionario ?>" ><?= $m->nome ?></option>    
	        	<? } ?> 
        	</select>
        	<button   class="btn    btn   -success" style="width: 200px;" id="motoboyLevaPedido" onclick="motoboyLevaPedido($('#<?= $v->id_pedido_finalizado ?>').val(), <?= $v->id_pedido_finalizado ?>)" >Levar</button>
      	<? }else{ echo $v->data ;} ?>
        	
    	</td>
       
        <td><?= $v->nome ?></td>
         <td><?= $v->cep ?></td>
        <td><?= $v->obs ?></td>
        
       
        <td><?= $v->numero ?></td>
        <!-- <td><?= $v->frete ?></td> -->
        <!-- <td><?= $v->subtotal ?></td> -->
        <td><?= $v->celular ?></td>
        <td><?= $v->telefone ?></td>
        <td>R$ <?= $v->total ?></td>


      </tr>
      



	<? } ?>
	    </tbody>
  </table>
</div>

<? } ?>

