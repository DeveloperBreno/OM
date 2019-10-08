<? function listarEmHtml($listaDeProdutos)
{ ?>
	<br>
	<select id="produtoadd">

		<? foreach ($listaDeProdutos as $key => $value) {

				?>
			<option value='<? echo $value->id_produto_venda; ?>'><? echo $value->nome_produto; ?></option>

		<? } ?>

	</select>
	<button   onclick="addProdutoNoCard()" id="btn text-white caditem" type="submit" class="btn text-white  btn btn-light ">ADD item</button>
<? } ?>

<?php
function selectList($lista)
{ ?>
	<button   class="btn text-white  btn text-white -success" onclick="cadastrarProduto()" id="cadastarProdutobtn text-white ">Cadastrar Produto</button>

	<select id="idProduto">
		<option value="null">Escolha um produto</option>
		<? foreach ($lista as $key => $v) { ?>
			<option value="<?= $v->id_produto_venda ?>"><?= $v->nome_produto ?> </option>
		<? } ?>
	</select>

	<input id="qtdoaddprodutovalue" type="number" placeholder="Digite a QTDO" />
	<button   class="btn text-white  btn text-white -danger" onclick="qtdoaddprodutobtn text-white ()" id="qtdoaddprodutobtn text-white ">ADD QTDO</button>

<? } ?>