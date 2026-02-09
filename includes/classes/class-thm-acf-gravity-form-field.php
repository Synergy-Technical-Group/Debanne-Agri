<?php
if (!defined('ABSPATH')) exit;
if (!class_exists('THM_ACF_Gravity_Form_Field')) {
	if (class_exists('acf_field')) {
		class THM_ACF_Gravity_Form_Field extends acf_field
		{
			function __construct()
			{
				$this->name = 'gravity_form';
				$this->label = __('Select Gravity Forms', THM_TEXT_DOMAIN);
				$this->category = 'relational';
				$this->defaults = array(
					'allow_multiple' => 0,
					'allow_null' => 0
				);


				parent::__construct();
			}

			function render_field($field)
			{
				$field = array_merge($this->defaults, $field);
				$forms_list = array();

				if (class_exists('RGFormsModel')) {
					$forms = RGFormsModel::get_forms(1);
				} else {
					echo __('Please make sure that the Gravity Form plugin is installed and activated', THM_TEXT_DOMAIN);
				}

				if (isset($forms) && is_array($forms)) {
					foreach ($forms as $form) {
						$forms_list[intval($form->id)] = ucfirst($form->title);
					}
				}

				$field['choices'] = $forms_list;
				$field['type'] = 'select'; ?>

                <select id="<?php echo str_replace(array('[', ']'), array('-', ''), $field['name']); ?>"
                        name="<?php echo $field['name']; ?>">
					<?php
					if ($field['allow_null']) {
						echo '<option value="0">Choose Form</option>';
					}

					foreach ($field['choices'] as $key => $value):
						$selected = '';

						if ((is_array($field['value']) && in_array($key, $field['value'])) || $field['value'] == $key) {
							$selected = ' selected="selected"';
						} ?>

                        <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
					<?php endforeach; ?>
                </select>
				<?php
			}

			function format_value($value)
			{
				if (!$value || empty($value) || !class_exists('GFAPI')) {
					return false;
				}

				if (!empty($value)) {
					return intval($value);
				}
			}
		}

		new THM_ACF_Gravity_Form_Field();
	} else {
		error_log('ACF is not active');
	}
}