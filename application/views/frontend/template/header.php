<body>

	<!-- <nav class="fixed-top navbar-light bg-white border border-secondary" >
				
			<ul class = "nav top-fixed navbar-nav navbar-right  bg-white" style="margin-left:2%;">
					<li class="nav-item"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url('/assets/frontend/img/gepcec_logotipo.png'); ?>" class="logo" ></a></li>
					<li class="nav-item active"><a class ="nounderline" href="<?php echo base_url() ?>">Home</a></li>
					<li class="nav-item"><a class ="nounderline" href="<?php echo base_url('/projetos') ?>">Projetos</a></li>
					<li class="nav-item"><a class ="nounderline" href="<?php echo base_url() ?>">Produções</a></li>
					<li class="nav-item"><a class ="nounderline" href="<?php echo base_url() ?>">Eventos</a></li>
					<li class="nav-item"><a class ="nounderline" href="<?php echo base_url() ?>">Galeria</a></li>
					<li class="nav-item active"><a class ="nounderline" href="<?php echo base_url('/pessoal') ?>">Pessoal</a></li>
					<li class="nav-item"><a class ="nounderline" href="<?php echo base_url() ?>">Contatos</a></li>
							
			</ul>		
			


	</nav> -->
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
						<ul class = "navbar-nav ">
							<li class="nav-item navegacao <?php
									if($paginaCorrente == base_url()) 
									{
										echo 'class="corrente"';
								}?>">
								<a class ="nav-link" href="<?php echo base_url()?>"
								>
								Home
								</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url('/projetos') ?>">Projetos</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url() ?>">Produções</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url() ?>">Eventos</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url() ?>">Galeria</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url('/pessoal') ?>">Pessoal</a>
							</li>
							<li class="nav-item navegacao">
								<a class ="nav-link" href="<?php echo base_url() ?>">Contatos</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>


		
		

