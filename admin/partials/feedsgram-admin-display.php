<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.luziarte.dev
 * @since      1.0.0
 *
 * @package    Feedsgram
 * @subpackage Feedsgram/admin/partials
 */
?>
<div class="fg-main">
	<h1 class="fg-title-feedsgram">FeedsGram</h1>
	<div class="fg-welcome">
		<p>Bem vindo ao FeedsGram, plugin responsável por renderizar posts do Instagram sem necessidade do token, permitindo seu site carregar fotos dos posts de perfis públicos do Instagram</p>
		<p>Para mostrar posts do Instagram utilize o shortcode:</p>
		<p><span>[feedsgram_posts]</span></p>
	</div>
	<form class="fg-form-post" action="">
		<div class="fg-blocks">
			<div class="fg-block">
				<h4>Configurações: </h3>
				<label>Url do Perfil</label>
				<input type="text" name="fg_profile" placeholder="https://www.instagram.com/profile/" required>
				
				<label>Quantidade de posts</label>
				<input type="number" name="fg_number_pics" placeholder="1" required>
			</div>
			<div class="fg-block">
				<h4>Layout Desejado( <i>Em breve</i> ):</h3>
				<label>Escolha o layout desejado</label>
				<select type="text" name="fg_layout" value="Layout" disabled>
					<option value="Layout">Selecione layout desejado</option>
					<p><i>Pré-visualização:</i></p>
				</select>
			</div>
		</div>
		<button type="submit">Salvar</button>
	</form>

</div>

