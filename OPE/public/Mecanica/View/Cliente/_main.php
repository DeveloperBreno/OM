<?php 
function selectClientes($listaClientes){  ?>  
	<select id="selectClientes" >
	<? foreach ($listaClientes as $keyClientes => $c) { ?>
		
		<option value="<? echo $c->id_cliente; ?>"><? echo $c->nome ." Cel: ".$c->celular ;?></option>
	<? } ?>
	</select>
	

<? }  ?>
