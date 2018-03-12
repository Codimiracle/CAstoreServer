<?php
deline_show_html_head();
deline_show_header();
?>
<div class="container-fluid">
	<h4>Hello World</h4>
	<p>Here is you message: <?= $parameters["message"] ?></p>
</div>
<?php
deline_show_footer();
deline_show_html_foot();