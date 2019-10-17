<?php 

class Fornecedor{
	private $FornecedorId;
	private $FornecedorNome;
	private $FornecedorCnpj;
	private $FornecedorCadastro;
	private $FornecedorObs;
	private $FornecedorCep;
	private $FornecedorEndereco;
	private $FornecedorNumero;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
} 

class ServiceFornecedor{
	private $conexao;
	private $tarefa;
	public function __construct(Conexao $conexao,Fornecedor $tarefa){
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}

	
	public function listarfornecedores(){
		$quary = "SELECT * FROM `Fornecedor` ORDER BY FornecedorId DESC";
		$stmt = $this->conexao->prepare($quary);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function salvarFornecedor(){
	

		$quary = " INSERT INTO `Fornecedor` (
		 
		`FornecedorNome`, 
		`FornecedorCnpj`, 
		`FornecedorCadastro`, 
		`FornecedorObs`, 
		`FornecedorCep`, 
		`FornecedorEndereco`, 
		`FornecedorNumero`) 
		VALUES (
		? , 
		? , 
		CURRENT_TIMESTAMP, 
		? , 
		? , 
		? , 
		? ) ;";

		$stmt = $this->conexao->prepare($quary);
		$stmt->bindValue(1, $this->tarefa->__get('FornecedorNome'));
		$stmt->bindValue(2, $this->tarefa->__get('FornecedorCnpj'));
		$stmt->bindValue(3, $this->tarefa->__get('FornecedorObs'));
		$stmt->bindValue(4, $this->tarefa->__get('FornecedorCep'));
		$stmt->bindValue(5, $this->tarefa->__get('FornecedorEndereco'));
		$stmt->bindValue(6, $this->tarefa->__get('FornecedorNumero'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);

		
	}
	
	public function buscarFornecedor(){
		$quary = "SELECT * FROM `tb_Fornecedor` 
		WHERE nome like ? 
		or celular like ? 
		or telefone LIKE ? ";

		$stmt = $this->conexao->prepare($quary);
		$stmt->bindValue(1, $this->tarefa->__get('nome'));
		$stmt->bindValue(2, $this->tarefa->__get('nome'));
		$stmt->bindValue(3, $this->tarefa->__get('nome'));
		
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function Salvar(){
		$quary = "INSERT INTO `Fornecedor` 
			(`FornecedorId`, 
			`FornecedorNome`, 
			`FornecedorCep`, 
			`FornecedorCpfCnpj`, 
			`FornecedorAtivo`, 
			`OficinaId`, 
			`FornecedorDataCadastro`, 
			`FornecedorNumeroCasa`,
			`FornecedorObs`,
			`FornecedorEndereco`,
			`FornecedorBairro`) 
		 VALUES (NULL,
		 	 'FornecedorNome',
		 	 '1111',
		 	 '1111',
		 	 '1',
		 	 '1',
		 	 CURRENT_TIMESTAMP,
		 	 '1',
		 	 '1',
		 	 '1',
			  '1')";
			  
		$stmt = $this->conexao->prepare($quary);
		$stmt->bindValue(1, $this->tarefa->__get('FornecedorNome'));
		$stmt->bindValue(2, $this->tarefa->__get('FornecedorCep'));
		$stmt->bindValue(3, $this->tarefa->__get('FornecedorCpfCnpj'));
		$stmt->bindValue(4, $this->tarefa->__get('FornecedorAtivo'));
		$stmt->bindValue(5, $this->tarefa->__get('FornecedorNumeroCasa'));
		$stmt->bindValue(6, $this->tarefa->__get('obs'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


	public function AtualizarFornecedor(){	
		$quary ="UPDATE Fornecedor 
			SET FornecedorNome = ? ,
				FornecedorCnpj = ? ,
				FornecedorObs = ? ,
				FornecedorCep = ? ,
				FornecedorEndereco = ? ,
				FornecedorNumero = ?  
				WHERE FornecedorId = ? ";
		$stmt = $this->conexao->prepare($quary);
		$stmt->bindValue(1, $this->tarefa->__get('FornecedorNome'));			
		$stmt->bindValue(2, $this->tarefa->__get('FornecedorCnpj'));
		$stmt->bindValue(3, $this->tarefa->__get('FornecedorObs'));
		$stmt->bindValue(4, $this->tarefa->__get('FornecedorCep'));
		$stmt->bindValue(5, $this->tarefa->__get('FornecedorEndereco'));
		$stmt->bindValue(6, $this->tarefa->__get('FornecedorNumero'));
		$stmt->bindValue(7, $this->tarefa->__get('FornecedorId'));
		$stmt->execute();
		

		$quary ="SELECT * FROM Fornecedor 
		WHERE FornecedorNome = ?  
		and FornecedorId = ? ";
		$stmt = $this->conexao->prepare($quary);
		$stmt->bindValue(1, $this->tarefa->__get('FornecedorNome'));			
		$stmt->bindValue(2, $this->tarefa->__get('FornecedorId'));
		$stmt->execute();
		$aux =  $stmt->fetchAll(PDO::FETCH_OBJ);
		if (isset($aux[0]->FornecedorNome)){
			return true;
		}
		return false;
	}




	public function detalheFornecedor(){
		
		$quary = "SELECT * FROM `Fornecedor` WHERE FornecedorId = ?  ";
		$stmt = $this->conexao->prepare($quary);
		$stmt->bindValue(1, $this->tarefa->__get('FornecedorId'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

}

function buscarFornecedor($texto){

	$Fornecedor = new Fornecedor();
	$Fornecedor->__set('nome', strtoupper($texto));
	$conexao = new Conexao();
	$service = new ServiceFornecedor($conexao, $Fornecedor);
	$resultado = $service->buscarFornecedor();
	return $resultado;
}

function salvarFornecedor($fornecedor){
	$service = new ServiceFornecedor(new Conexao() , $fornecedor);
	$resultado = $service->salvarFornecedor();
}

function listarfornecedores(){
	$service = new ServiceFornecedor(new Conexao(), new Fornecedor());
	return $service->listarfornecedores();
}


function detalheFornecedor($id){;
	$fornecedor = new Fornecedor();
	$fornecedor->__set('FornecedorId',  $id );
	$service = new ServiceFornecedor(new Conexao(),$fornecedor );
	$ls = $service->detalheFornecedor();
	return $ls;
}

function AtualizarFornecedor($ls){
	$Fornecedor = sv("Fornecedor", $ls);
	$serviceFornecedor = new ServiceFornecedor(new Conexao(), $Fornecedor);
	$aux = $serviceFornecedor->AtualizarFornecedor();
	if ($aux) {
		echo '1';
	}else{
		echo '0';
	}
}


 ?>