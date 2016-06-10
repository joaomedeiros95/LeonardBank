<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<body class="homepage">
	<div id="page-wrapper">

		<!-- Banner -->
			<section id="banner" style="background: #6d7a69;color: #bec4bc !important;">
				<header>
					<h2><strong style="color: #bec4bc;">Cadastre-se</strong></h2>
				</header>
				<form action="<?php echo base_url(); ?>/index.php/usuario_controller/cadastrar" method="post">
					<div class="form-login">
						<?php
							if($haserro == true) {
								echo '<p class="erro">' . $erro . '</p>';
							}
						?>
						<div class="checkartista">
							<label class="checklabel" id="label_investidor" style="color: #bec4bc;">Investidor</label>
							<div class="onoffswitch">
							    <input type="checkbox" name="artista" class="onoffswitch-checkbox" id="myonoffswitch" checked>
							    <label class="onoffswitch-label" for="myonoffswitch"></label>
							</div>
							<label class="checklabel2 checklabel-ativo" id="label_artista" style="color: #bec4bc;">Artista</label>
						</div>
						<p>
							<input type="text" id="nome" placeholder="Nome" required name="nome" />
						</p>
						<p>
							<input type="email" id="email" placeholder="Email" required name="email" />
						</p>
						<p>
							<input type="text" id="usuario" placeholder="Usuário" required name="usuario" />
						</p>
						<p>
							<input type="text" id="cpf" placeholder="CPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required name="cpf" maxlength="14" />
						</p>
						<p>
							<input type="text" id="telefone" placeholder="Telefone" required name="telefone" maxlength="15" />
						</p>
						<p>
							<input type="password" id="senha" placeholder="Senha" required name="senha" />
						</p>
						<p>
							<input type="submit" value="Cadastrar">
						</p>
						<p>
							Já possui login? <a href="<?php echo base_url(); ?>index.php/usuario_controller/index">Faça login</a>.
						</p>
					</div>
				</form>
			</section>

	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#cpf").keydown(function() {
				v = $("#cpf").val();
				v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
			    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
			    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
			                                             //de novo (para o segundo bloco de números)
			    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos

			    $("#cpf").val(v);
			});

			$("#telefone").keydown(function() {
				v = $("#telefone").val();
				v = v.replace(/\D/g,"");                      
            	v = v.replace(/^(\d{2})(\d)/g,"($1) $2");       
		        v = v.replace(/(\d)(\d{4})$/,"$1-$2");   

            	$("#telefone").val(v);
			});

			$("#myonoffswitch").change(function() {
				checkLabel();
			});
			checkLabel();
		});

		function checkLabel() {
			if($("#myonoffswitch").is(":checked")) {
				$("#label_investidor").removeClass("checklabel-ativo");
				$("#label_artista").addClass("checklabel-ativo");
			} else {
				$("#label_investidor").addClass("checklabel-ativo");
				$("#label_artista").removeClass("checklabel-ativo");
			}
		}

		$(document).on('click', '.toggle-button', function() {
		    $(this).toggleClass('toggle-button-selected'); 
		});

	</script>

<style>
body {
	background: #6d7a69;
}
</style>