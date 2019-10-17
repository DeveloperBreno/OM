


<!DOCTYPE html>
<html lang="pt-br">
<head>

<? require '../../../../001Mecanica/Function.php';  ?>


<style>

input[type='text'], input[type='number']{
  border-bottom: 2px #fff solid !important;
}
</style>

<script>
 $('.addContato').click(()  =>{  
        event.preventDefault();  
        $('.contatos').prepend('<input id="1" class="col-sm-4" type="text" class="form-control" placeholder="Apelido Opcional" name="apelido">'+
        '<input id="2" class="col-sm-4" type="text" class="form-control" placeholder="Telefone Opcional" name="telefone">'+
        '<input  id="3" class="col-sm-4" type="email" class="form-control" placeholder="Email Opcional" name="email">'
     )

    });
    
    $('.removeContato').click(()  =>{  
        event.preventDefault(); 
        if($('.contatos').html().length <= 277){
            $("#1:last").val('')
            $("#2:last").val('')
            $("#3:last").val('')
        }else{
            $("#1:last").remove()
            $("#2:last").remove()
            $("#3:last").remove()
        }  
        
        $('#CEP').keyup(()  =>{    
      if ($('#CEP').val().length == 8) {
          
          getDadosEnderecoPorCEP($('#CEP').val())
      }
  });

  
    });
</script>
 </head>
<body>
  <form class="form-horizontal formCliente"  action="/action_page.php">
    <div class="form-group">
        <label class="col-sm-1 text-dark" for="Nome">Nome <b>*</b>:</label><input type="text" class="col-sm-3" id="Nome" placeholder="Nome" name="ClienteNome"><label class="col-sm-1 text-dark" for="CPF">CPF <b>*</b>:</label><input type="text" class="col-sm-3"   id="CPF" placeholder="CPF" name="ClienteCpfCnpj"><label class="col-sm-1 text-dark" for="CEP">CEP:</label><input type="text" class="col-sm-3" id="CEP" placeholder="CEP" name="ClienteCep"><br><label class="col-sm-1 text-dark" for="Endereco">End.</label><input type="text" class="col-sm-3" id="Endereco" placeholder="Endereço" name="ClienteEndereco"><label class="col-sm-1 text-dark" for="Número">Número:</label><input type="text" class="col-sm-3" id="Número" placeholder="Número" name="ClienteNumeroCasa"><label class="col-sm-1 text-dark" for="ClienteObs">Obs:</label><input type="text" class="col-sm-3" id="ClienteObs" placeholder="Obs" name="ClienteObs">
    </div>

<? btn('btn-outline-dark addContato mr-2','Adcionar contato', '', ''); ?>
<? btn('btn-outline-dark removeContato', 'Remover contato', '',''); ?>


<hr>
<!-- jquery vai add varios campos de contato -->
<div class="contatos"><input id="1" 
    class="col-sm-4" 
    type="text" 
    class="form-control"  
    placeholder="Apelido 
    Opcional" 
    name="apelido"><input 
    id="2" 
    class="col-sm-4" 
    type="text" 
    class="form-control"  
    placeholder="Telefone 
    Opcional" 
    name="telefone"><input 
    id="3" 
    class="col-sm-4" 
    type="email" 
    class="form-control"  
    placeholder="Email 
    Opcional" 
    name="email"></div>
<!-- jquery vai add varios campos de contato -->
    
<hr>
    <? divOpen("form-group"); ?>
      <? divOpen("row"); ?>
        <? divOpen("col-sm-4"); ?>
          <? btn('btn-outline-dark salvarCliente','Salvar','salvarCliente',''); ?>
        <? divClose(); ?>
      <? divClose(); ?>
    <? divClose(); ?>
  </form>
</body>
</html>