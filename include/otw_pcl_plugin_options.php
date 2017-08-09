<?php
/** Manage plugin options
  *
  */
global $otw_pcl_plugin_id;


$db_values = array();
$db_values['otw_psw_promotions'] = get_option( $otw_pcl_plugin_id.'_dnms' );

if( empty( $db_values['otw_psw_promotions'] ) ){
	$db_values['otw_psw_promotions'] = 'on';
}

$message = '';
$massages = array();
$messages[1] = __( 'Options saved', 'otw_pcl' );

if( isset( $_GET['message'] ) && isset( $messages[ $_GET['message'] ] ) ){
	$message .= $messages[ $_GET['message'] ];
}
?>
<?php if ( $message ) : ?>
<div id="message" class="updated"><p><?php echo $message; ?></p></div>
<?php endif; ?>
<div class="wrap">
	<div id="icon-edit" class="icon32"><br/></div>
	<h2>
		<?php _e('Plugin Options', 'otw_pcl') ?>
	</h2>
	<div class="form-wrap otw-options" id="poststuff">
		<form method="post" action="" class="validate">
			<input type="hidden" name="otw_action" value="otw_pcl_manage_options" />
			<?php wp_original_referer_field(true, 'previous'); wp_nonce_field('otw-pcl-options'); ?>

			<div id="post-body">
				<div id="post-body-content">
					<div class="form-field">
						<label for="otw_psw_promotions"><?php _e('Show OTW Promotion Messages in my WordPress admin', 'otw_pcl'); ?></label>
						<select id="otw_psw_promotions" name="otw_psw_promotions">
							<option value="on" <?php echo ( isset( $db_values['otw_psw_promotions'] ) && ( $db_values['otw_psw_promotions'] == 'on' ) )? 'selected="selected"':''?>>on(default)</option>
							<option value="off"<?php echo ( isset( $db_values['otw_psw_promotions'] ) && ( $db_values['otw_psw_promotions'] == 'off' ) )? 'selected="selected"':''?>>off</option>
						</select>
					</div>
					<p class="submit">
						<input type="submit" value="<?php _e( 'Save Options', 'otw_pcl') ?>" name="submit" class="button button-primary button-hero"/>
					</p>
				</div>
			</div>
		</form>
	</div>
</div>