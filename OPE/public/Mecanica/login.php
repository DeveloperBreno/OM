<!DOCTYPE html>

<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<link rel="stylesheet" type="text/css" href="css/css.css">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
</head>
<body id="body" style="background-image: url('/Mecanica/ima/fundo.png');background-size: 112%;" >



<div class="nav-item dropdown col-2 no-arrow float-right show">
		<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		Entrar               </a>
		<!-- Dropdown - User Information -->
		<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in hide" aria-labelledby="userDropdown" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 40px, 0px);">
		<a class="dropdown-item" href="#">
		<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>



		<? 	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$p = explode("/", $actual_link);
			array_pop($p);
			$url = '';
			foreach ($p as $k => $v) {
				$url = $url . $v . '/';
			} ?>
		<form method="POST" id="formlogin" action="<? echo $url; ?>controller.php?acao=login" >
		<div class="form-group">
		
		<label for="cpfescuro">CPF: </label>
		<input type="text" name="FuncionarioCep"  id="cpfescuro" placeholder="CPF" class="form-control" />
		<label for="senhaescura">Senha</label>
		<input type="password" name="FuncionarioSenha"  id="senhaescura" placeholder="senha"  class="form-control" />

		</div>
		<button   type="submit" class="btn btn-light btn text-white -block ">Entrar</button>	

		</form>

		</a>

		</div>
	</div>
	

<div class="form-group col-10 mt-3">

	<input type="Nome" title="Pesquise seu veiculo por CPF ou Renavam ou Placa"  class="col-sm-4" id="cpfCliente" placeholder=" CPF ou Renavam ou Placa" >
	<label class="col-sm-4"  style="text-align: right;" for="cpf"> </label>

</div>

<script>

function TestaCPF(strCPF) {
		var Soma;
		var Resto;
		Soma = 0;
	if (strCPF == "00000000000") return false;
		
	for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
	Resto = (Soma * 10) % 11;
	
		if ((Resto == 10) || (Resto == 11))  Resto = 0;
		if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
	
	Soma = 0;
		for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
		Resto = (Soma * 10) % 11;
	
		if ((Resto == 10) || (Resto == 11))  Resto = 0;
		if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
		return true;
	}




// $('#cpfCliente').keyup(()  =>{
// 	let cpf = $('#cpfCliente').val();
// 	if (cpf.length == 11 ) {
// 		if (!TestaCPF(cpf)) {
// 			$('.toAdd').html('');
// 			alert("CPF invalido!");	
// 		}
// 	}
	

// 	// prototipo
// 	if ($('#cpfCliente').val() == '45781005889') {
// 		$('.toAdd').html('<div class="col-xl-3 col-lg-3"></div>'
			
// +'<div class="col-xl-6 col-lg-6">'
// +'<div class="card shadow mb-7">'
// +'<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">'
// +'<h6 class="m-0 font-weight-bold text-primary">Detalhes</h6>'
// +'</div>'
// +'<div class="card-body">'
// +'<table class="table">'
// +'<thead class="thead-primary">'
// +'<tr>'
// +'<th scope="col">Placa</th>	'
// +'<th scope="col">PEÇAS | SERVIÇOS</th>'
// +'</tr>'
// +'</thead>'
// +'<tbody>'
// +'<tr>'
// +'<td>ABC-1234</td>'
// +'<td>RODA 22</td>'
// +'</tr>'
// +'<tr>'
// +'<td>ABC-1234</td>'
// +'<td>Alinhamento</td>'
// +'</tr>'

// +'</tbody>'
// +'</table>'
// +'</div>'
// +'</div>'
// +'</div>')
// 	}



// });


////////////////////////////////////////////////////////
$('#cpfCliente').keyup(()  =>{
	
	if ($('#cpfCliente').val().length >= 7)	{
	$.post('<? echo $url; ?>/controller.php?acao=info',
    { obj: JSON.stringify($('#cpfCliente').val())},
    function(data,status){
		$('.toAdd').html(data)
		console.log(data)

	});
	
}else{
	$('.toAdd').html('')
}

});




</script>




<div class="row p-0 m-0 ">
<div class="col-md-2"></div>
<div class="col-md-4">
<div class="row toAdd bg-light"></div>
</div>
<div class="col-md-4">
<iframe 
width="100%" 
height="315" 
src="https://www.youtube.com/embed/ePZ9tqPc1kA?start=5" 
frameborder="0" 
allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
allowfullscreen>
</iframe>

	</div>
</div>







</body>
</html>


