<? function listarEmHtml($listaDeProdutos)
{ ?>
	<br>
	<select id="produtoadd">

		<? foreach ($listaDeProdutos as $key => $value) {

				?>
			<option value='<? echo $value->id_produto_venda; ?>'><? echo $value->nome_produto; ?></option>

		<? } ?>

	</select>
	<button   onclick="addProdutoNoCard()" id="btn   caditem" type="submit" class="btn    btn btn-light ">ADD item</button>
<? } ?>

<?php
function selectList($lista)
{ ?>
	<button   class="btn    btn   -success" onclick="cadastrarProduto()" id="cadastarProdutobtn   ">Cadastrar Produto</button>

	<select id="idProduto">
		<option value="null">Escolha um produto</option>
		<? foreach ($lista as $key => $v) { ?>
			<option value="<?= $v->id_produto_venda ?>"><?= $v->nome_produto ?> </option>
		<? } ?>
	</select>

	<input id="qtdoaddprodutovalue" type="number" placeholder="Digite a QTDO" />
	<button   class="btn    btn   -danger" onclick="qtdoaddprodutobtn   ()" id="qtdoaddprodutobtn   ">ADD QTDO</button>

<? } ?>