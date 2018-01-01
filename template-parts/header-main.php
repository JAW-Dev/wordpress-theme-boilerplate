<?php
/**
 * Header Main
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Template_Parts
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

$name        = get_bloginfo( 'name', 'display' );
$description = get_bloginfo( 'description', 'display' );
?>
<header class="site-header">
	<div class="wrap">
		<section class="site-header__branding">
			<div class="branding__wrap">
				<h1 class="branding__title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $name ); ?></a>
				</h1>
				<?php if ( $description ) : ?>
					<p class="branding__description"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</div>
		</section><!-- /.site-header__branding -->
		<?php get_template_part( 'template-parts/nav-menu', 'main' ); ?>
	</div><!-- /.wrap -->
</header><!-- /.site-header -->
