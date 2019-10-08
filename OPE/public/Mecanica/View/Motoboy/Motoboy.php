<? require '../acesso.php'; ?>
<? require '../inportacao.php'; ?>
<? require_once ("../menu.php"); ?>

<div id="campovai" ></div>
<script src="../../js/_main.js"></script> 
<script>	
    rest()
    // javascript while e setTimeout 
    function Temporizador(initiate){
	    if (initiate !== true) {
	        rest()
	    }
	    setTimeout(Temporizador, 3000);
    }
    $(function() {
        Temporizador(true);
    });
</script>