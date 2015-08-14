<?php

class Carbon_Field_Association_Extended extends Carbon_Field_Association {
	/**
	 * Serves as a backbone template for the relationship items.
	 * Used for both the selected and the selectable options.
	 *
	 * @param bool $display_input Whether to display the selected item input field.
	 */
	function item_template($display_input = true) {
		?>
		<li>
			<a href="#" data-item-id="{{{ item.id }}}" data-item-title="{{{ item.title }}}" data-item-type="{{{ item.type }}}" data-item-subtype="{{{ item.subtype }}}" data-item-label="{{{ item.label }}}" data-value="{{{ item.type }}}:{{{ item.subtype }}}:{{{ item.id }}}">
				<strong class="edit-link-holder">
					<em data-href="{{{ item.editlink }}}" class="edit-link">Edit</em>
				</strong>
				<em>{{{ item.label }}}</em>
				<span></span>
				{{{ item.title }}}
				<# if (item.is_trashed) { #>
					<i class="trashed"></i>
				<# } #>
			</a>


			<?php if ($display_input): ?>
				<input type="hidden" name="{{{ name }}}[]" value="{{{ item.type }}}:{{{ item.subtype }}}:{{{ item.id }}}" />
			<?php endif; ?>
		</li>
		<?php
	}

	function admin_enqueue_scripts() {
		$template_dir = get_template_directory_uri();

		# Enqueue JS
		crb_enqueue_script('carbon-field-association', $template_dir . '/includes/carbon-field-association-extended/js/field.js', array('carbon-fields'));
		
		# Enqueue CSS
		crb_enqueue_style('carbon-field-association', $template_dir . '/includes/carbon-field-association-extended/css/field.css');
	}
}

// Add admin edit link for the Association_Extended field
// This is used to reduce repeating code in Association_Extended field definition
add_filter('carbon_relationship_options', 'crb_carbon_relationship_options', 10, 2);
function crb_carbon_relationship_options($options, $name) {
	foreach ($options as $index => $option) {
		$options[$index]['editlink'] = get_edit_post_link($option['id']);
	}

	return $options;
}