<!-- NavBar-->
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="<?php echo site_url('/main');?>">Carômetro</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('/main');?>"><i class="fas fa-users"></i> Alunos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-plus"></i> Cadastrar
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item disabled" href="#">Usuário</a>
            <a class="dropdown-item disabled" href="#">Curso</a>
            <a class="dropdown-item disabled" href="#">Turma</a>
            <a class="dropdown-item disabled" href="#">Aluno</a>
            <a class="dropdown-item disabled" href="#">Aluno em lote</a>
            <a class="dropdown-item disabled" href="#">Fotos dos alunos</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-list-alt"></i> Lista
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item disabled" href="#">Usuários</a>
            <a class="dropdown-item disabled" href="#">Cursos</a>
            <a class="dropdown-item disabled" href="#">Turmas</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> <?php echo (isset($this->session->ni)? $this->session->nome :'Erro');?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo site_url('main/alterarsenha');?>"><i class="fas fa-user-cog"></i> Alterar Senha</a>
            <a class="dropdown-item" href="<?php echo site_url('usuario/logout');?>"><i class="fas fa-sign-out-alt"></i> Sair</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" id="busca_aluno" data-url="<?php echo site_url('main/busca/');?>" action="<?php echo site_url('main/busca');?>" method="POST">
        <input class="form-control mr-sm-2" type="search" id="nome_aluno" placeholder="Busca por nome" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="button" id="busca"><i class="fas fa-search"></i> Busca</button>
      </form>
    </div>
  </nav>
  