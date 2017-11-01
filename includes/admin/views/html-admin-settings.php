<?php
/**
 * Admin View: Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="wrap zero">
	<h1>Zero</h1>

	<form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'zero_option_group' );
                do_settings_sections( 'zero-admin' );
                submit_button();
            ?>
            </form>
</div>