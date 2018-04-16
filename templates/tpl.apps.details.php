<?php
deline_load_stylesheet("static/css/app-details.css");
deline_load_stylesheet("static/css/app-powerpoint.css");
deline_load_script("static/js/app-details.js");
deline_load_script("static/js/scrollbar.js");
deline_show_html_head();
deline_show_header();

$appInfo = deline_parameter_get("app_info");
$appPowerpoint = deline_parameter_get("app_powerpoint");
$appStatics = deline_parameter_get("app_statics");

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-push-2">
			<div class="row">
				<div class="col-md-4">
					<div class="app-cover">
						<img class="img-responsive" src="static/images/avatar-default.png" />
					</div>
				</div>
				<div class="col-md-8">
					<div class="app-name">
						<div class="header">应用名称</div>
						<div class="body"><?= deline_show_text($appInfo->getName()) ?></div>
					</div>
					<div class="app-developer">
						<div class="header">开发者</div>
						<div class="body"><?= deline_show_text($appInfo->getDeveloper()) ?></div>
					</div>
					<div class="app-statics">
						<div class="header">应用统计</div>
						<div class="body">
							<div class="app-comment-count">342</div>
							<div class="app-stars-avg">4.5</div>
							<div class="app-voted">2</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="app-powerpoint">
						<div class="header">应用幻灯片</div>
						<div class="body">
							<ul class="list-inline">
								<?php foreach ($appPowerpoint as $powerpoint) { ?>
									<li><img class="powerpoint"
									src="<?= $powerpoint->getPath() ?>" /></li>
								<?php } ?>
							</ul>
							<div class="scrollbar-track">
								<div class="scrollbar-thumb"></div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="app-description">
						<div class="header">应用描述</div>
						<div class="body"><?= deline_show_text($appInfo->getDescription()) ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
deline_show_footer();
deline_show_html_foot();
