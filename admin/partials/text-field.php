<p>
	<div style="display: block;">
		<label for="<?php echo esc_attr( $option ); ?>"><strong><?php echo esc_attr( $field_name ); ?></strong></label>
	</div>
	<input class="<?php echo esc_attr( $class_prefix ); ?>" type="<?php echo esc_attr( $field_type ); ?>" name="<?php echo esc_attr( $option ); ?>" size="60" value="<?php echo esc_attr( $value ); ?>">
</p>