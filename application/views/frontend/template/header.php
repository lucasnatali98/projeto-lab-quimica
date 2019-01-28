<body>

	<div class="container ">
		<div class="row">
			<div class="col-12">
				<nav class="navbar fixed-top navbar-light bg-white navbar-expand-xl border border-secondary">
					<a href="" class="navbar-brand" href="<?php echo base_url() ?>">
					<img src="<?php echo base_url('/assets/frontend/img/gepcec_logotipo.png'); ?>" class="d-inline-block align-top logo" >	
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav10"
					aria-controls="nav10" aria-expanded="false" aria-label="Navegação Toggle">
						<span class="navbar-toggler-icon"></span>
					</button>

					<?php $paginaCorrente = basename($_SERVER['SCRIPT_NAME']);?>
					<div class="navbar-collapse collapse" id="nav10">
						<ul class = "navbar-nav active">
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url()?>">Home</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url('/projetos') ?>">Projetos</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url('/producoes') ?>">Produções</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url('/eventos') ?>">Eventos</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url('/galeria') ?>">Galeria</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url('/pessoal') ?>">Pessoal</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url('/contatos') ?>">Contatos</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
		
<p>
<?php echo $paginaCorrente ?>
</p>
