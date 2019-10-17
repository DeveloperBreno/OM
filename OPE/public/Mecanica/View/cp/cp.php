<? require_once "../importacao.php"; ?>
<? require '../../../../001Mecanica/Function.php';  ?>





<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {
     -webkit-appearance: none;
}
</style>

<div class="row">
<div class="col-12">

<?php input('np', 'Nome peça', 'Exeplo: roda 22', 'np', 'text', 'required'); ?>

<?php input('estoque', 'Estoque', 'Exeplo: 5', 'estoque', 'text', 'required'); ?>

<?php input('valor', 'Custo', 'Exeplo: 50', 'valor', 'text', 'required'); ?>

<?php input('pfs', 'Pesquisar fornecedor', 'Exeplo: nakata', 'cpeca', 'text', 'required'); ?>
<br>

<select name="fornecedor" id="fornecedor" class="btn   -block btn   -primary">
  <option value="null">Escolha um fornecedor</option>
  <option value="null">Nakata</option>
  <option value="null">BMW</option>
  <option value="null">n t marca br</option>
</select>

</div>


<div class="col-12 mt-3">
<button   href="buttons.html" class="btn btn-light">
  Cadastrar peça
</button>
</div>
</div>