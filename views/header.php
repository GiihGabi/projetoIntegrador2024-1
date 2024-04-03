<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$this->title;?></title>

    <!-- Bootstrap -->
   
    <link rel="stylesheet" href="<?=URL;?>public/MDB/css/mdb.min.css" />
    <link rel="stylesheet" href="<?=URL;?>public/fontawesome/css/all.min.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
   <link rel="stylesheet" href="<?=URL;?>public/css/main.css" />
    
  </head>
  <body>

  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">LOGO</a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarColor02"
            aria-controls="navbarColor02"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
          <i class="fas fa-bars fa-lg"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
              <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="<?=URL;?>">Home</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdownManut"
                  role="button"
                  data-toggle="dropdown"
                  aria-expanded="false"
                >Manutenções</a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdownManut" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start">
                  <li><a class="dropdown-item" href="<?=URL;?>cursos">Cursos</a></li>
                  <li><a class="dropdown-item" href="#">Disciplinas</a></li>
                  <li><a class="dropdown-item" href="#">Alunos</a></li>
                  <li><a class="dropdown-item" href="#">Boletim</a></li>
                </ul>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="#">Sobre</a>
              </li>
            </ul>

            <ul class="navbar-nav d-flex flex-row">
              <!-- Icons -->
              <!-- Icon dropdown -->
            
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-expanded="false"
                  aria-haspopup="true"
                >
                  <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="userDropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="null" style="">
            <a class="dropdown-item" href="#">Minha conta</a>
                        <hr class="my-0">
            <a class="dropdown-item" href="#">Sair</a>
          </div>
              </li>
              <li class="nav-item mr-3 mr-lg-0">
                <a class="nav-link" href="#">
                  <i class="fas fa-shopping-cart"></i>
                </a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      

  
    