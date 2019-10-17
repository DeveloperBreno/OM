<div class="row">
  <div class="col-12">
    <label class="col-sm-12" for="servico">Pesquisar serviço</label>
    <input type="text" class="col-sm-12" id="servico" placeholder="Exeplo: Alinhamento" name="Nome">
    <br>
    <select class="btn btn-light">
      <option value="null">Selecione uma serviço</option>
      <option value="null">Balanciamento </option>
      <option value="null">Alinhamento</option>
    <select>
    <p style="text-align: center;">Ou</p>
    <div class="col-sm-12">
      <button   class="btn btn-light " onclick="cadastrarServicoInsert()">Cadastrar peça </button>
      
      <button   class="btn    btn   -success " onclick="inserirServicoNoPedido()">Add ao pedido</button>
    </div>
  </div>
</div>