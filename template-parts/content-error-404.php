<?php
/**
 * Content Error 404
 *
 * @package    Theme_Package
 * @subpackage Theme_Package/Template_Parts
 * @author     Theme_Author <Theme_Author_Email>
 * @copyright  Copyright (c) 2018, Theme_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

?>
<section class="error-404">
	<header class="error-404__header section-header">
		<h1 class="error-404__title section-header__title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'Theme_Textdomain' ); ?></h1>
	</header><!-- /.page-header -->
	<div class="error-404__content section-content">
		<?php get_search_form(); ?>
	</div><!-- /.section-content -->
</section><!-- /.error-404 -->
