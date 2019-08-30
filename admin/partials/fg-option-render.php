<?php
// check user capabilities.
if ( ! current_user_can( 'manage_options' ) ) {
	return;
}
// add error/update messages.
if ( ! empty( filter_input( INPUT_GET, 'settings-updated' ) ) ) {
	add_settings_error( 'fg_settings_group', 'tve_message', 'Salvo com sucesso', 'Atualizado' );
}
// show error/update messages.
settings_errors( 'fg_settings_group' );
?>
<div class="fg-main">
	<h1 class="fg-title-feedsgram">FeedsGram</h1>
	<div class="fg-welcome">
		<p>Bem vindo ao FeedsGram, plugin responsável por renderizar posts do Instagram sem necessidade do token, permitindo seu site carregar fotos dos posts de perfis públicos do Instagram</p>
		<p>Para mostrar posts do Instagram utilize o shortcode:</p>
		<p><span>[feedsgram_posts]</span></p>
	</div>
	<form class="fg-form-post" action="options.php" method="post">
		<div class="fg-blocks">
			<div class="fg-block">
                <h4>Configurações: </h3>
                
                <?php
                    settings_fields( 'fg_settings_group' );
                    do_settings_sections( 'fg_settings_group' );
                ?>

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
        <?php submit_button( 'Salvar' ); ?>
	</form>

</div>