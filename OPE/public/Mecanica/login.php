<!DOCTYPE html>
<html>
<head>
	<title>Login</title>


<? session_abort(); ?>
<? require '../../001Mecanica/Function.php';  ?>

<style>
	body{
		font-family: Georgia, serif;
		background-image: url('blue.svg');
	}

.carousel-inner{
	background-color: #226582 !important;
}

	.carousel-inner img{
		height: 500px !important;
		width: 100% !important;
		transform: scale(1.3);
		  transition: transform .2s; 
	}

	.carousel-inner:hover  img {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

	@media only screen and (max-width: 1000px) {
  .carousel-inner img{
		height: auto !important;
		width: 100% !important;
	}
}
	



</style>

<script>

function gif(){
  $('#gif').show();
}
</script>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>



<div class="container">

	<div class="row pt-4">
<div class="col-md-12 p-3 bg-white rounded ">
<div class="row">

<div class="col-md-3 mb-3">
	

<label class="mt-5 pt-5" for="cpfCliente" >Pesquise seu veiculo por CPF ou Renavam ou Placa</label>
<input id="cpfCliente" type="text" placeholder="Buscar" name="buscar" class="form-control">
<br>


<form method="POST" id="formlogin" action="http://localhost:90/OPE/public/Mecanica/controller.php?acao=login">

<? input('FuncionarioCep',
  'CPF',
  'CPF',
  'form-control mb-2',
  'number',
  'required'
); ?>

<? input('FuncionarioSenha',
  'Senha',
  'Senha',
  'form-control mb-2',
  'password',
  'required'
); ?>

<? btn('btn btn-primary btn-block mt-2', 
  'Entrar',
  'gif',
  ''); ?>

<img src="gif.gif" id="gif" >
<script>$('#gif').hide();</script>

</form>
</div>
	
<div class="col-md-9 pl-3 " >


<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="s1.svg" class="d-block w-100 h-100 rounded " alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Não aqueça o motor antes de começar a rodar</h5>
          <p>Quando você for sair pela manhã ou quando o carro estiver frio, não é preciso esperar alguns minutos em marcha lenta. Apenas entre no carro e ligue o motor, coloque o cinto e ajuste o assento e espelhos.

Apenas esses 30 segundos já são o suficiente para que o seu carro esteja pronto para rodar. Mas vá com suavidade até que o motor atinja a temperatura ideal de funcionamento, pois ele ainda estará frio no começo.
</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="s2.svg" class="d-block w-100 h-100 rounded " alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Evite acelerações bruscas</h5>
          <p>Descer o pé totalmente no acelerador toda vez que o semáforo abre não vai lhe ajudar a chegar mais rápido, só vai apressar é a sua ida na oficina. Acelerar de maneira brusca é um dos hábitos mais danosos para a saúde do carro.

Rodando direto no trânsito o motor tende a trabalhar muito quente e esse tipo de condução aumenta ainda mais a temperatura do conjunto. Sobrecarrega o sistema de arrefecimento, juntas e correias, por exemplo.
</p>
        </div>
      </div>


      <div class="carousel-item">
        <img src="s3.svg" class="d-block w-100 h-100 rounded " alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Não economize no filtro de ar e de óleo</h5>
          <p>Economizar nesses dois filtros é a pior decisão que você pode tomar para a saúde do motor do seu carro. Troque o filtro de óleo toda vez que esgotar o fluido – nada de alternar troca sim, troca não. É uma peça barata demais, considerando sua importância no bom funcionamento do propulsor.

O mesmo vale para o filtro de ar. Nada de “bater um ar”, aspirar ou lavar. Troque sem dó.</p>
        </div>
      </div>



      <div class="carousel-item">
        <img src="s4.svg" class="d-block w-100 h-100 rounded " alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Escolha o óleo como se fosse vinho</h5>
          <p>Vinho ruim dá dor de cabeça. Óleo ruim também. Lembre dessa dica sempre que for comprar óleo e pensar em economizar. Se o fabricante recomenda o sintético (geralmente mais caro), siga a recomendação.

Não misture com óleo mineral. Prefira gerações mais novas do fluido, com poder de detergência de classe SL, no mínimo.</p>
        </div>
      </div>


    
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


</div>	


	<p class="text-center w-100 mt-3 text-primary"> Copyright © 2019 System </p>


</div>
</div>

</div>

</div>
</body>
</html>