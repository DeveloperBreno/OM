<? require '../../../../001Mecanica/Function.php';  ?>


<? 	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$p = explode("/", $actual_link);
      array_pop($p);
      array_pop($p);
      array_pop($p);
			$url = '';
			foreach ($p as $k => $v) {
				$url = $url . $v . '/';
			} ?>



<!DOCTYPE html>
<html>
<head>

</head>
<body>

<div id="example">
    <div id="grid"></div>
    <script>
        $(document).ready(function () {
            $("#grid").kendoGrid({
                toolbar: ["excel","pdf"],
                dataSource: {
                    type: "json",
                    transport: {
                        read: "<? echo $url; ?>/controller.php?acao=ma"
                    },
                    pageSize: 20
                },
                height: 550,
                groupable: true,
                sortable: true,
                pageable: {
                    refresh: true,
                    pageSizes: true,
                    buttonCount: 5
                },
                columns: [{
                    field: "ClienteNome",
                    title: "Cliente",
                    
                }, {
                    field: "VeiculoPlaca",
                    title: "Placa"
                },{
                    template: "<button   onclick=\"pedidoDeManutencao(#: ManutencaoId #)\" " + 
                    " class=\"btn btn-light\">Detalhe</button> ",
                    field: "ManutencaoId",
                    title: "Pedido"}]
            });
        });
    </script>
</div>

<style type="text/css">
    .customer-photo {
        display: inline-block;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-size: 32px 35px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
    }

    .customer-name {
        display: inline-block;
        vertical-align: middle;
        line-height: 32px;
        padding-left: 3px;
    }
</style>


</body>
</html>

