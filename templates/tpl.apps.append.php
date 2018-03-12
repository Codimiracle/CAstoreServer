<?php 
deline_show_html_head();
deline_show_header();
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<div class="app-cover">
						<img class="img-responsive" src="static/images/avatar-default.png" />
					</div>
				</div>
				<div class="col-md-8">
					<div class="app-name">
						<div class="header">应用名称</div>
						<div class="body">App</div>
					</div>
					<div class="app-developer">
						<div class="header">开发者</div>
						<div class="body">Developer</div>
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
						<div class="body">Description</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<form method="post" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">应用名称</label> <input id="name" type="text"
								class="form-control" name="name" />
							<p class="help-block">应用的名字</p>
						</div>
						<div class="form-group">
							<label for="title">应用标题</label> <input id="title" type="text"
								class="form-control" name="title" />
							<p class="help-block">应用在列表中显示的标题</p>
						</div>
						<div class="form-group">
							<label for="package">应用包名</label> <input id="package" type="text"
								class="form-control" name="package" />
							<p class="help-block">例如：com.example.app</p>
						</div>
						<div class="form-group">
							<label for="version">应用版本</label><input id="version" type="text"
								class="form-control" name="version">
							<p class="help-block">1.0.1</p>
						</div>
						<div class="form-group">
							<label for="description">应用描述</label>
							<textarea id="description" name="description"
								class="form-control" rows="3"></textarea>
							<p class="help-block">&lt;ul&gt;</p>
						</div>
						<div class="form-group">
							<label for="platform">应用平台</label> <select id="platform"
								class="form-control" name="platform">
								<option value="android-aarch32">Android ARM32</option>
								<option value="android-aarch64">Android ARM64</option>
								<option value="android-x86">Android x86</option>
							</select>
						</div>
						<div class="form-group">
							<label for="developer">开发者</label> <input id="developer"
								type="text" class="form-control" name="developer" />
							<p class="help-block">应用的所有者</p>
						</div>
						<div class="form-group">
							<label for="powerpoint">应用幻灯片</label>
							<div id="powerpoint">
								<input type="file" name="powerpoint[]" /> <input type="file"
									name="powerpoint[]" /> <input type="file" name="powerpoint[]" />
								<input type="file" name="powerpoint[]" /> git
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default" name="apps_append"
								value="apps_append">提交</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
@import url("static/css/apps-details.css");
</style>
<script type="text/javascript" src="static/js/app-append-preview.js">
</script>
<?php
deline_show_footer();
deline_show_html_foot();
