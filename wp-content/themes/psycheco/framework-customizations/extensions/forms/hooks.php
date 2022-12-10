<?php if (!defined('FW')) die('Forbidden');

/** @internal */
if ( ! function_exists( 'psycheco_action_theme_fw_ext_forms_include_custom_builder_items' ) ) :
	function psycheco_action_theme_fw_ext_forms_include_custom_builder_items() {
		require_once  get_parent_theme_file_path() .'/framework-customizations/extensions/forms/includes/builder-items/date-picker/class-fw-option-type-form-builder-item-date-picker.php';
	}
endif;
add_action('fw_option_type_form_builder_init', 'psycheco_action_theme_fw_ext_forms_include_custom_builder_items');

