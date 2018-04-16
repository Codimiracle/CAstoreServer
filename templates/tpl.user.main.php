<?php
deline_show_html_head();
deline_show_header();

$userdata = deline_parameter_get("userdata");
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="user-base-view">
				<div class="avatar">
					<img class="img-responsive"
						src="<?= isset($userdata["avatar"]) ? $userdata["avatar"] :  "./static/images/avatar-default.png" ?>">
				</div>
				<div class="name">
					<strong><?= $userdata["nickname"] ?>(<?= $userdata["username"] ?>)</strong>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="user-details-view"></div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12"></div>
	</div>

	<div class="row">
		<div class="col-md-12"></div>
	</div>
</div>
<style type="text/css">
@import url("./static/css/user-center.css");
</style>
<?php
deline_show_footer();
deline_show_html_foot();