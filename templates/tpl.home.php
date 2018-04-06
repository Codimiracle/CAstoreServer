<?php
deline_load_stylesheet("static/css/app-list.css");
deline_load_script("static/js/app-list.js");
deline_show_html_head();
deline_show_header();
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="store-powerpoint">
				<div class="header">热点浏览</div>
				<div class="body"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="store-album">
				<div class="header">应用特辑</div>
				<div class="body"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="store-apps-hotpot">
				<div class="header">热门应用</div>
				<div class="body">
					<ul class="list-inline app-list">
						<li>
							<div class="app-logo">
								<img class="logo" src="static/images/avatar-default.png">
							</div>
							<div class="app-details">
								<h4 class="name"><a href="?node=/Apps/1">Hello App</a></h4>
								<div class="statics">
									<span>123142</span> <span>23MB</span>
								</div>
								<div class="actions">
									<a class="download" href="#"><span
										class="glyphicon glyphicon-download"></span>下载</a>
								</div>
								<div class="description">
									Hello App is a testing app.
								</div>
							</div>
						</li><li>
							<div class="app-logo">
								<img class="logo" src="static/images/avatar-default.png">
							</div>
							<div class="app-details">
								<h4 class="name">Hello App</h4>
								<div class="statics">
									<span>123142</span> <span>23MB</span>
								</div>
								<div class="actions">
									<a class="download" href="#"><span
										class="glyphicon glyphicon-download"></span>下载</a>
								</div>
								<div class="description">
									<p>Hello App is a testing app.</p>
								</div>
							</div>
						</li><li>
							<div class="app-logo">
								<img class="logo" src="static/images/avatar-default.png">
							</div>
							<div class="app-details">
								<h4 class="name">Hello App</h4>
								<div class="statics">
									<span>123142</span> <span>23MB</span>
								</div>
								<div class="actions">
									<a class="download" href="#"><span
										class="glyphicon glyphicon-download"></span>下载</a>
								</div>
								<div class="description">
									<p>Hello App is a testing app.</p>
								</div>
							</div>
						</li><li>
							<div class="app-logo">
								<img class="logo" src="static/images/avatar-default.png">
							</div>
							<div class="app-details">
								<h4 class="name">Hello App</h4>
								<div class="statics">
									<span>123142</span> <span>23MB</span>
								</div>
								<div class="actions">
									<a class="download" href="#"><span
										class="glyphicon glyphicon-download"></span>下载</a>
								</div>
								<div class="description">
									<p>Hello App is a testing app.</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="store-apps-update">
				<div class="header">应用更新</div>
				<div class="body"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="store-apps-recommend">
				<div class="header">应用推荐</div>
				<div class="body"></div>
			</div>
		</div>
	</div>
</div>

<?php
deline_show_footer();
deline_show_html_foot();