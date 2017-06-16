<?php
/**
 * Header Main
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Template_Parts
 * @author     {{theme-author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */

$name        = get_bloginfo( 'name', 'display' );
$description = get_bloginfo( 'description', 'display' );
?>
<header class="site-header">
	<div class="wrap">
		<section class="site-header__branding">
			<div class="branding__wrap">
				<h1 class="branding__title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $name );?></a>
				</h1>
				<?php if ( $description ) : ?>
					<p class="branding__description"><?php echo esc_html( $description );?></p>
				<?php endif; ?>
			</div>
		</section><!-- /.site-header__branding -->
		<?php get_template_part( 'template-parts/nav-menu', 'main' );?>
	</div><!-- /.wrap -->
</header><!-- /.site-header -->
