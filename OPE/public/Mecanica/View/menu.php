


<style>


.overlay {
  height: 100%;
  width: 0px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow-y: hidden;
  transition: 0.3s;
  box-shadow: 1px 0px 15px #000;
  background: linear-gradient(to right, #16686a , #1d6649) !important;
}

.overlay-content {
    position: relative;
    top: 20px;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

#menuicon{
  cursor:pointer;
   float: left;
   margin: 16px 0px 0px 16px;
  color: #16686a;
  
}
#perfilusuario{
  color: #fff;
}

.overlay a {
    padding: 8px;
    
    text-decoration: none;
    color: #fff;
    display: block;
    transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
    color: #fff;
}

.overlay .closebtn    {
position: absolute;
    top: -17px;
    left: : 5px;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  /*.overlay a {font-size: 20px}*/
  .overlay .closebtn    {
    top: 15px;
    left: : 35px;

    
  }
}
</style>


<div id="myNav" class="overlay">
  <!-- <a href="javascript:void(0)" class="closebtn   " onclick="closeNav()">&times;</a> -->
  <div class="overlay-content">

    <p id="perfilusuario" >
      <?= substr($_SESSION['nome'], 0, 12); ?>...
    </p>
    <? if ($_SESSION['perfil'] != "M"){ ?>
      <a href="#" onclick="motoboyLeva()" >Motoboy leva</a>
      <a href="#" onclick="receberProduto()" >Receber produto</a>
    <? } ?>
    
    
  </div>
</div>


<span id="menuicon" onmouseover="openNav()">☰</span>

<script>
function openNav() {
    document.getElementById("myNav").style.width = "240px";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0px";
}


$(document).click(function(e) 
{  
    console.log(e.target);
    if($("#myNav").width() != 0 && e.target.id != "myNav"){
      setTimeout(function(){ closeNav(); } ,0)  
 
    }

});

</script>












