<? function retornarInputAddProtudo($comandaValida){ ?>

<input type="hidden" id="comandaAdd" value="<?= $comandaValida->id_card ?>" />
<input type="text" name="produto" id="addPro" onkeyup="pesquisarProduto(<?= $comandaValida->id_card ?>, <?= $comandaValida->loja ?>)" placeholder="Pesquisar produto" />
<script type="text/javascript">
document.getElementById("addPro").focus();
</script>


<div id="select"></div>


<? } ?>