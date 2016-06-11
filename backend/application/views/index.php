<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
						<div class="inner">
							<header>
								<h1><a href="<?php echo base_url(); ?>" id="logo" style="margin-bottom: 200px;">Leonard Bank</a></h1>
								<hr />
								<p>O artista move o mundo</p>
							</header>
							<footer>
								<a href="#leonard" class="button circled scrolly">Iniciar</a>
							</footer>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.html">Início</a></li>
								<li><a href="#artista" class="scrolly">Artista</a></li>
								<li><a href="#investidor" class="scrolly">Investidor</a></li>
								<li><a href="#sobrenos" class="scrolly">Sobre Nós</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/usuario_controller">Login</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/usuario_controller/entrar_cadastro">Cadastre-se</a></li>
							</ul>
						</nav>

				</div>

			<!-- Banner -->
      <div class="wrapper style1">

				<section id="leonard" class="container special">
					<header>
						<h2>Bem vindo ao <strong>Leonard Bank</strong>.</h2>
					</header>
          <p>
            O Leonard Bank surgiu com a missão de diminuir a distância entre o(a) artista e o(a) investidor de arte, contribuindo assim para o desenvolvimento da arte e para o progresso da humanidade.
            Trata-se de um meio pelo qual artistas e investidores de arte serão colocados em contato, tendo em vista o fomento da criação artística e a democratização da arte enquanto investimento financeiro.
          </p>
          <footer>
            <a href="#artista" class="button circled scrolly">Artista</a>
            <a href="#investidor" class="button circled scrolly">Investidor</a>
          </footer>
				</section>

      </div>
			<!-- Main -->
				<div class="wrapper style1">

					<section id="artista" class="container special">
						<header>
							<h2><a href="#">Artista Visual</a></h2>
						</header>
						<p>
							O(a) artista é compreendido enquanto ser humano propulsor de arte, criatividade, entendimento de si e do mundo, usando os mais variados meios e suportes (pintura, escultura, fotografia, performance, instalação, assemblage, body art, colagens). A expressão artística é definida pelo(a) artista que elabora seu projeto e avalia o interesse do(a) investidor(a) em financiar seu processo criativo. 
						</p>
						<footer>
							<a href="<?php echo base_url(); ?>index.php/usuario_controller/entrar_cadastro" class="button">Cadastre-se</a>
						</footer>
					</section>

				</div>

			<!-- Features -->
				<div class="wrapper style1">

					<section id="investidor" class="container special">
            <header>
							<h2><a href="#">Investidor(a)</a></h2>
						</header>
						<p>
							O(A) investidor(a) de artes visuais tem a sua escolha uma opção de retorno financeiro rápido, fácil, seguro e rentável uma vez que tem a oportunidade de adquirir uma obra de arte em seu nascedouro, com valores abaixo do marcado e ainda contribui para o desenvolvimento da arte e da humanidade.  
						</p>
						<footer>
							<a href="<?php echo base_url(); ?>index.php/usuario_controller/entrar_cadastro" class="button">Cadastre-se</a>
						</footer>

				</div>

			<!-- Features -->
				<div class="wrapper style1">

					<section id="sobrenos" class="container special">
            			<header>
							<h2><a href="#">Sobre Nós</a></h2>
						</header>
						<div class="container">
							<div class="row">
								<div class="3u 6u(mobile)">
									<p class="equipe-img">
										<img  src="<?php echo base_url(); ?>images/equipe/joao.jpg" alt="João Eduardo Medeiros" title="João Eduardo Medeiros" />
									</p>
									<p style="text-align:center;">
										<strong>João Eduardo Medeiros</strong>
									</p>
									<p>
										Bacharel em Tecnologia da Informação, com ênfase em Engenharia de Software, pela Universidade Federal do Rio Grande do Norte (UFRN). Programa por paixão e é entusiasta por tecnologia.
									</p>
								</div>
								<div class="3u 6u(mobile)">
									<p class="equipe-img">
										<img  src="<?php echo base_url(); ?>images/equipe/renato.jpg" alt="Renato Oliveira" title="Renato Oliveira" />
									</p>
									<p style="text-align:center;">
										<strong>Renato Oliveira</strong>
									</p>
									<p>
										Estudante de Administração na Universidade Federal do Rio Grande do Norte (UFRN).
									</p>
								</div>
								<div class="3u 6u(mobile)">
									<p class="equipe-img">
										<img  src="<?php echo base_url(); ?>images/equipe/ruben.jpg" alt="Rúben Barbosa" title="Rúben Barbosa" />
									</p>
									<p style="text-align:center;">
										<strong>Rúben Barbosa</strong>
									</p>
									<p>
										Cursa bacharelado em Tecnologia da Informação na Universidade Federal do Rio Grande do Norte (UFRN) e prefere programar.
									</p>
								</div>
								<div class="3u 6u(mobile)">
									<p class="equipe-img">
										<img  src="<?php echo base_url(); ?>images/equipe/sefora.jpg" alt="Sehfora" title="Sehfora" />
									</p>
									<p style="text-align:center;">
										<strong>Sehfora</strong>
									</p>
									<p>
										Estuda Artes Visuais na Universidade Federal do Rio Grande do Norte (UFRN). É apaixonada por Artes Visuais.
									</p>
								</div>
							</div>
						</div>
						<footer>
							<a href="#" id="gototop" class="button">Volte para o Topo</a>
						</footer>

				</div>

			<!-- Footer -->
				<div id="footer">
					<div class="container">
						<div class="row">
							<div class="12u">
								<!-- Copyright -->
									<div class="copyright">
										<ul class="menu">
											<li>&copy; <?php echo date("Y"); ?> - Leonard Bank. All rights reserved.</li>
										</ul>
									</div>

							</div>

						</div>
					</div>
				</div>

		</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#gototop").click(function() {
			$('html, body').animate({ scrollTop: 0 }, 1000);
		});
	});
</script>

