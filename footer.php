<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 */
?>

<!-- FOOTER -->
<footer id="Footer">
<div class="wrapper">
	<div class="logo"><img src="/wp-content/themes/metanomalies/img/logo-metanomalies.png" alt="(Logo)" width="75" height="50"></div>
	
	<div class="summary"><strong>Metanomalies</strong> is a project of <a href="http://www.anomalistdesign.com/">Anomalist Design LLC</a> promoting the growth of communities of all types for all human beings.</div>
	
	<small class="copyright">&copy; <?= date('Y') ?>&nbsp;<a href="http://anomalistdesign.com">Anomalist Design</a>. All rights reserved.</small>
</div>
</footer>
<!-- /FOOTER -->

<script>window.jQuery || document.write('<script src="wp-content/themes/metanomalies/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<!-- Masonry -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.2.2/masonry.pkgd.min.js"></script>

<?php wp_footer(); ?>

</body>
</html>