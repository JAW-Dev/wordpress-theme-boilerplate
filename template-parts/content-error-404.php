<?php
/**
 * Content Error 404
 *
 * @package    {{theme-package}}
 * @subpackage {{theme-package}}/Template_Parts
 * @author     {{theme-author}} <{{theme_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{theme_author}}
 * @license    GNU General Public License v2 or later
 * @version    {{theme-version}}
 */
?>
<section class="error-404">
	<header class="error-404__header section-header">
		<h1 class="error-404__title section-header__title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', '{{theme-textdomain}}' ); ?></h1>
	</header><!-- /.page-header -->
	<div class="error-404__content section-content">
		<?php get_search_form(); ?>
	</div><!-- /.section-content -->
</section><!-- /.error-404 -->
