<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class newspiper_notice_welcome extends newspiper_notice {

	public function __construct() {
		
		add_action( 'wp_loaded', array( $this, 'welcome_notice' ), 20 );
		add_action( 'wp_loaded', array( $this, 'hide_notices' ), 15 );

	}

	public function welcome_notice() {
		
		$this_notice_was_dismissed = $this->get_notice_status('welcome');
		
		if ( !$this_notice_was_dismissed ) {
			if ( isset($_GET['page']) && 'newspiper-doc' == $_GET['page'] ) {
				return;
			}

			add_action( 'admin_notices', array( $this, 'welcome_notice_markup' ) ); // Display this notice.
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice_markup() {
		
		$dismiss_url = wp_nonce_url(
			remove_query_arg( array( 'activated' ), add_query_arg( 'newspiper-hide-notice', 'welcome' ) ),
			'newspiper_hide_notices_nonce',
			'_newspiper_notice_nonce'
		);

		$theme_data	 = wp_get_theme();

		?>
		<div id="message" class="notice notice-success nasiothemes-notice nasiothemes-welcome-notice">
			<a class="nasiothemes-message-close notice-dismiss" href="<?php echo esc_url( $dismiss_url ); ?>"></a>

			<div class="nasiothemes-message-content">
				<div class="nasiothemes-message-image">
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=newspiper-doc' ) ); ?>"><img class="nasiothemes-screenshot" src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/img/theme-logo.jpg" alt="<?php esc_attr_e( 'Newspiper', 'newspiper' ); ?>" /></a>
				</div><!-- ws fix
				--><div class="nasiothemes-message-text">
					<h2 class="nasiothemes-message-heading"><?php echo sprintf(__('Thank you for choosing %1$s!', 'newspiper' ), esc_html($theme_data->name)); ?></h2>
					<?php
					echo '<p>';
						/* translators: %1$s: theme name, %2$s link */
						printf( __( 'To take advantage of everything that this theme can offer, please take a look at the <a href="%2$s">Get Started with %1$s</a> page.', 'newspiper' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=newspiper-doc' ) ) );
					echo '</p>';

					echo '<p class="notice-buttons"><a href="'. esc_url( admin_url( 'themes.php?page=newspiper-doc' ) ) .'" class="button button-primary">';
						/* translators: %s theme name */
						printf( esc_html__( 'Get started with %s', 'newspiper' ), esc_html( $theme_data->Name ) );
					echo '</a>';
					echo ' <a href="'. esc_url( NEWSPIPER_THEME_VIDEO_GUIDE ) .'" target="_blank" rel="noopener" class="button button-primary nasiothemes-button"><span class="dashicons dashicons-youtube"></span> ';
						/* translators: %s theme name */
						printf( esc_html__( '%s Video Guide', 'newspiper' ), esc_html( $theme_data->Name ) );
					echo '</a></p>';
					?>
				</div><!-- .nasiothemes-message-text -->
			</div><!-- .nasiothemes-message-content -->
		</div><!-- #message -->
		<?php
	}

}

new newspiper_notice_welcome();