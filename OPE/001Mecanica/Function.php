<?php





// sv = setValue
function sv($c, $ls)
{
    $vc = new $c();

    $var = json_decode($ls['obj']);
    foreach ($var as $key => $value) {
        try {
            $vc->__set($value->name, strtoupper($value->value));
        } catch (\Throwable $th) { }
    }
    return $vc;
}

// sv = setValue
function ca($c, $ls, $clienteId)
{
    $listaContatos = array();
    $len = 0;
    $var = json_decode($ls['obj']);
    foreach ($var as $key => $value) {
        if (
            $value->name == "apelido" ||
            $value->name == "email" ||
            $value->name == "telefone"
        ) {
            array_push($listaContatos, $value->value);
            $len++;
        }
    }

    $maisUm = $len / 3;
    $p = 0;

    $listaContatosComAtt = array();
    for ($i = 0; $i < $maisUm; $i++) {
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


function validar($o, $ls)
{
    foreach ($ls as $k => $v) {
        foreach ($v as $k2 => $va) {
            if ($k2 . '(' . $o->$k . ')' != $va) {
                return $k;
            }
        }
    }
    return true;
}



?>


<? function inputValue($value, $name, $textlabel, $placeholder, $class, $type, $required)
{ ?>
    <label class=" mt-3 text-dark " for="<?= $name ?>" style="font-size: 20px;"><?= $textlabel ?></label>
    <input type="<?= $type ?>" value="<?= $value ?>" style="font-size: 20px;" class="col-12 form-control border-2 border-dark  <?= $class ?>" id="<?= $name ?>" placeholder="<?= $placeholder ?>" name="<?= $name ?>" <?= $required ?>>
    <br>
<? } ?>

<? function divOpen($class)
{
    echo '<div class="' . $class . '">';
} ?>
<? function divClose()
{
    echo '</div>';
} ?>

<? function btn($class, $text, $onclick, $id)
{  ?>
    <button class="btn  <?= $class ?>" onclick="<?= $onclick ?>(<?= $id ?>)">
        <?= $text ?>
    </button>
<? } ?>

<? function input($name, $textlabel, $placeholder, $class, $type, $required)
{ ?>
    <label class="text-dark col-sm-12 " for="<?= $name ?>">
        <?= $textlabel ?>
    </label>
    <input type="<?= $type ?>" class="col-12 form-control border-2 border-dark  <?= $class ?>" id="<?= $name ?>" placeholder="<?= $placeholder ?>" name="<?= $name ?>" <?= $required ?>>
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
                <? foreach ($lsatt as $kk => $i) {
                            echo $v->$i . " ";
                        } ?>
            </option>
        <? } ?>

    </select>

<? } ?>


<? function radioSimNao($nome, $label)
{ ?>

    <label class="text-dark"><? echo $label; ?> </label>
    <br>
    <label class="text-dark" for="sim">SIM</label>
    <input name='<? echo $nome; ?>' type="radio" value="1" class="mb-3" id="sim" />

    <label class="text-dark" for="nao">NÃO</label>
    <input name='<? echo $nome; ?>' type="radio" value="0" class="mb-3" id="nao" />
<? } ?>

<? function exibirSenhaPadrao()
{ ?>
    <br>
    <div class="alert alert-danger text-center col-12 ">Senha padrão: MUDAR123</div>
<? } ?>


<? function listInfo($ls)
{ ?>

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

<? function random()
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>



<? function text($text)
{
    echo "<span class='text-dark' > $text </span>";
} ?>

<? function createTable($ls, $funcao, $namebtn, $id, $exibir, $colunas)
{ ?>
<style>
.table td{
    padding: 2px;
    text-align: center;
}


</style>

    <div style="scroll-behavior: auto !important; ">
        <table id="BRENOP<? echo $funcao; ?>" class="table table-bordered display" style="overflow: auto;">
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
                        echo "<td> ";
                        btn(
                            'btn-outline-dark',
                            $namebtn,
                            $funcao,
                            $lsv->$id
                        );
                        echo "</td>";
                        echo '</tr>';
                    } ?>
            </tbody>
        </table>
        <script>
            function log(params) {
                console.log(params)
            }

            function getList(id) {
                return $($('#' + id + ' > tbody')[0]).children();
            }

            function getLength(id) {
                return $($($('#' + id + ' > tbody')[0]).children()).length;
            }

            function removeList(id) {
                return $($($('#' + id + ' > tbody')[0]).children()).remove();
            }

            function getIndex(idTable) {
                return parseInt($($($('#BRENOPdetalheCliente').siblings())[1]).val());
            }

            function setIndex(idTable, value) {
                return parseInt($($($('#BRENOPdetalheCliente').siblings())[1]).val(value));
            }

            function addTr(idTable, tr) {
                if (typeof tr === "undefined") {
                    return false;
                }
                $($('#' + idTable + ' > tbody')[0]).prepend('<tr>' + $(tr).html() + '</tr>');
                return true;
            }

            function exibeDez(idTable, ls, index) {
                let aux = index + 10;
                for (let i = index; i < aux; i++) {
                    if (addTr(idTable, ls[i])) {
                        setIndex(idTable, i);
                    }
                }
            }

            <? $ron = random(); ?>
            var list<? echo $ron; ?> = getList('BRENOP<? echo $funcao; ?>');
            log('Lista');
            log(getList('BRENOP<? echo $funcao; ?>'));
            log('len');
            log(getLength('BRENOP<? echo $funcao; ?>'));
            log('remove');
            log(removeList('BRENOP<? echo $funcao; ?>'));
            log('Index');
            log(getIndex('BRENOP<? echo $funcao; ?>'));
            log('exibeDez')
            exibeDez('BRENOP<? echo $funcao; ?>', list<? echo $ron; ?>, 0);

            function a(ls) {
                if (list<? echo $ron; ?>.length == getIndex('BRENOP<? echo $funcao; ?>') + 1) {
                    return false;
                }
                removeList('BRENOP<? echo $funcao; ?>');
                exibeDez('BRENOP<? echo $funcao; ?>', list<? echo $ron; ?>, getIndex('BRENOP<? echo $funcao; ?>'));
            }

            function v(ls) {
                if (getIndex('BRENOP<? echo $funcao; ?>') <= 10) {
                    return false;
                }
                let atual = getIndex('BRENOP<? echo $funcao; ?>');
                let myString = String(atual);
                var lastChar = myString[myString.length - 1];
                let dezMaisUltimo = 10 + parseInt(lastChar);
                removeList('BRENOP<? echo $funcao; ?>');
                exibeDez('BRENOP<? echo $funcao; ?>', list<? echo $ron; ?>, getIndex('BRENOP<? echo $funcao; ?>') - dezMaisUltimo);
            }
        </script>
        <input type="hidden" id="index" value="0" />
        <button class="btn btn-outline-dark" onclick="v($('#BRENOP<? echo $funcao; ?>').children())">
            < </button> <!-- -->

                <button class="btn btn-outline-dark" onclick="a($('#BRENOP<? echo $funcao; ?>').children())"> >
                </button>

    </div>
<?php } ?>