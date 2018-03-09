<?php use Deline\Component\Security;

$appInfo = $parameters["app_info"];
$appStatics = $parameters["app_statics"];

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
						<div class="body"><?= Security::escapeHTML($appInfo->getName()) ?></div>
					</div>
					<div class="app-developer">
						<div class="header">开发者</div>
						<div class="body"><?= Security::escapeHTML($appInfo->getDeveloper()) ?></div>
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
								<li><img class="img-responsive"
									src="static/images/avatar-default.png" /></li>
								<li><img class="img-responsive"
									src="static/images/avatar-default.png" /></li>
								<li><img class="img-responsive"
									src="static/images/avatar-default.png" /></li>
								<li><img class="img-responsive"
									src="static/images/avatar-default.png" /></li>
							</ul>
						</div>
						<div class="scrollbar">
							<div></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="app-description">
						<div class="header">应用描述</div>
						<div class="body"><?= Security::escapeHTML($appInfo->getDescription()) ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

