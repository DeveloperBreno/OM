<?php session_start(); ?>
<?php require '../acesso.php'; ?>
<?php require_once "../importacao.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Comanda</title>
<?php require '../inportacao.php'; ?>
<script src="/Mecanica/js/jquery/jquery.js"></script> 
<script src="/Mecanica/js/site.js"></script> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>

</head>
<body>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <div class="row col-xl-12 col-lg-12">
  <div class="col-11">
  <nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="#">  <div class="sidebar-brand-text mx-3">system of <sup>down</sup></div>
</a>
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse collapse" id="navbarNav" style="">
    <ul class="navbar-nav">
      <li class="nav-item active">
<!-- Sidebar - Brand -->

<li class="nav-item">
        <button class="im btn btn-primary">Iniciar manutenção</button>      </li>
      </li>
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
  <i class="fas fa-laugh-wink"></i>
  </div>
</a>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Cliente 
        <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                
        <button href="buttons.html" class="btn btn-outline-primary btn-block collapse-item  menuItem cadastrarCliente">
Cadastrar</button>
              </div>
            </li>



            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Fornecedores 
        <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                
        <button href="buttons.html" class="btn btn-outline-primary btn-block collapse-item  menuItem cadastrarFornecedor">
Cadastrar</button>
              </div>
            </li>


            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Relatórios 
        <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                
        <button href="buttons.html" class="btn btn-outline-primary btn-block collapse-item  menuItem relatorioManutencao">
Relatórios de Manutenções</button>
              </div>
            </li>
      <li class="nav-item">
 
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
  <div class="bg-white py-2 collapse-inner rounded">
    <!-- <h6 class="collapse-header">Custom Components:</h6> -->
    
  </div>
  </div>
     
  </div>
</nav>
  </div>
  <div class="col-1" >
    <!-- perfil de usuario -->
  <div class="nav-item dropdown no-arrow float-right">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['FuncionarioNome']; ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://localhost:90/Mecanica/" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
</div>
  </div>

</div>

<div class="container">

</div>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div> -->

          <div class="row toAdd">

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-7">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Manutenções em andamento</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">                    
                  <table class="table">
                    <thead class="thead-primary" >
                      <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Placa</th>
                        <th scope="col"> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Breno</td>
                        <td>ABC-1234</td>
                        <td>
                          <button onclick="pedidoDeManutencao(1)" class="btn btn-outline-primary" >Detalhe</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
             </div>     
        </div>
        <!-- /.container-fluid -->
      </div>
    

    </div>
    <!-- End of Content Wrapper -->

  </button>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- <button style="position: fixed;right: 10px;bottom: 10px;width: 115px;height: 115px;border-radius: 100px;" class="im btn btn-primary">Iniciar manutenção</button> -->



</body>
</html>