<?php





// sv = setValue
function sv($c, $ls){
    $vc = new $c();
    
    $var = json_decode($ls['obj']);
    foreach ($var as $key => $value) {
		try {
			$vc->__set($value->name,strtoupper($value->value));
		} catch (\Throwable $th){}
    }
    return $vc;
}

// sv = setValue
function ca($c, $ls, $clienteId){
    $listaContatos = array();
    $len = 0;
    $var = json_decode($ls['obj']);
    foreach ($var as $key => $value) {
        if ($value->name == "apelido" || 
            $value->name == "email" ||
            $value->name == "telefone") {
            array_push($listaContatos, $value->value);
            $len++;
        }
    }
    
    $maisUm = $len / 3;
    $p = 0;
 
    $listaContatosComAtt = array();
    for ($i=0; $i < $maisUm ; $i++) { 
        $vc = new $c();
        $vc->__set("ClienteId", $clienteId);
        $vc->__set("ClienteApelido", $listaContatos[$p]);
        $p++;
        $vc->__set("ClienteNumeroContato", $listaContatos[$p]);
        $p++;
        $vc->__set("ClienteEmail", $listaContatos[$p]);
        $p++;
        array_push($listaContatosComAtt, $vc);

    }
    
    return $listaContatosComAtt;
}


function validar($o, $ls){
    foreach ($ls as $k => $v) {
        foreach ($v as $k2 => $va) {
            if ($k2.'('.$o->$k.')' != $va) {
                return $k;
            }
        }
    }
    return true;
}



?>


<? function inputValue($value ,$name, $textlabel, $placeholder, $class , $type, $required){ ?>
    <label class=" mt-3 text-dark " for="<?= $name ?>" style="font-size: 20px;"><?= $textlabel ?></label>
    <input type="<?= $type ?>" 
    value="<?= $value ?>" 
    style="font-size: 20px;" 
    class="col-12 form-control border-2 border-dark  <?= $class ?>" 
    id="<?= $name ?>" 
    placeholder="<?= $placeholder ?>" 
    name="<?= $name ?>" <?= $required ?>>
    <br>
<? } ?>

<? function divOpen($class){ echo '<div class="' . $class . '">'; } ?>
<? function divClose(){ echo '</div>'; } ?>

<? function btn($class, $text, $onclick, $id){  ?>
    <button class="btn  <?= $class ?>" 
        onclick="<?= $onclick ?>(<?= $id ?>)">
            <?= $text ?>
    </button>
<? } ?>

<? function input($name, $textlabel, $placeholder, $class , $type, $required){ ?>
    <label class="col-sm-12 text-dark" for="<?= $name ?>"><?= $textlabel ?></label>
    <input type="<?= $type ?>" 
    class="col-12 form-control border-2 border-dark  <?= $class ?>" 
    id="<?= $name ?>" 
    placeholder="<?= $placeholder ?>" 
    name="<?= $name ?>" <?= $required ?>>
    <br>
<? } ?>


<?php
function select($ls, $label, $lsatt, $default, $name, $boot, $idreferencia, $funcao)
{ ?>
    <label for="<? echo $name; ?>"><? echo $label; ?></label>

    <select onchange="<? echo $funcao; ?>" id="<? echo $name; ?>" name="<? echo $idreferencia; ?>" class="btn form-control  col-md-12 btn-dark <? echo $boot; ?>">
    
    <option value="null"><? echo $default; ?></option>
    
    <? foreach ($ls as $k => $v) { ?>
        <option value="<? echo $v->$idreferencia ?>">
        <? foreach ($lsatt as $kk => $i) { echo $v->$i." "; } ?>
        </option>
    <? } ?>
       
    </select>

<? } ?>


<? function radioSimNao($nome, $label){ ?>
   
    <label class="text-dark" ><? echo $label; ?> </label>
    <br>
    <label  class="text-dark" for="sim">SIM</label>
    <input name='<? echo $nome; ?>' type="radio" value="1" class="mb-3"  id="sim"/>
    
    <label  class="text-dark" for="nao">NÃO</label>
    <input name='<? echo $nome; ?>' type="radio" value="0" class="mb-3"  id="nao" />
<? } ?>

<? function exibirSenhaPadrao(){ ?>
    <br>
    <div class="alert alert-danger text-center col-12 " >Senha padrão: MUDAR123</div>
<? } ?>


<? function listInfo($ls) { ?> 

    <table class="table p-3" style="widht: 200px !important;">
  <thead>
    <tr>
      
      <th scope="col">Placa</th>
      <th scope="col">Peça</th>
      
    </tr>
  </thead>
  <tbody>

       <? foreach ($ls as $k => $v) { ?>
            <tr>
      
            <td><? echo $v->VeiculoPlaca; ?></td>
            <td><? echo $v->PecaNome; ?></td>
            
            </tr>
    
       
       
       
            <? } ?>

        
    
  </tbody>
</table>

  <?  } ?>

<? function text($text){ echo "<span class='text-dark' > $text </span>" ; }?>

<? function createTable($ls,$funcao,$namebtn, $id, $exibir, $colunas){ ?>
    <div style="scroll-behavior: auto !important; ">
    <table class="table table-bordered "  >
		<thead>
		  <tr>
                <? foreach ($colunas as $c => $cv) {
                    echo '<th>' . $cv . '</th>';
                } 
                echo '<th></th>';
                ?>		
		  </tr>
		</thead>
		<tbody>           
            <? foreach ($ls as $lsk => $lsv) {
                echo '<tr>';
                foreach ($exibir as $exibirk => $exibirv) { ?>
                    <? echo "<td>" . $lsv->$exibirv . "</td>" ?>
            <? }
            echo "<td>"; 
                btn('btn-outline-dark',
                    $namebtn,
                    $funcao,
                    $lsv->$id );
            echo '<tr>';  
            } ?>  
		</tbody>
      </table>
      </div>
<? } ?>