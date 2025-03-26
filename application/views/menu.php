  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=base_url()?>">Bilbao Romanello</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	      <li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>clientes/listado">Clientes</a>
		</li>		
		  <li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>proveedores/listado/">Proveedores</a>
		</li>		
		<!--  <li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>planilla/listado">Caja</a>
		</li>
		<li class="nav-item">
				<a class="nav-link" href="<?=base_url()?>planilla/nuevo/">Comprobantes</a>
		</li>
    -->	   
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata("titulo") ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
			<li><a href="<?=base_url()?>cambiar_contrasena">Cambiar contraseña</a></li>
            <li><a href="<?=base_url()?>salir">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
