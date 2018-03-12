<?php
use Deline\Component\Security;

deline_show_html_head();
deline_show_header();

$appInfo = $parameters["app_info"];
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-push-2">
			<div class="row">
				<div class="col-md-12">
					<form method="post" role="form">
						<div class="form-group">
							<label for="name">应用名称</label> <input id="name" type="text"
								class="form-control" name="name" value="<?= Security::escapeHTML($appInfo->getName()) ?>" />
							<p class="help-block">应用的名字</p>
						</div>
						<div class="form-group">
							<label for="title">应用标题</label> <input id="title" type="text"
								class="form-control" name="title" value="<?= Security::escapeHTML($appInfo->getTitle()) ?>"/>
							<p class="help-block">应用在列表中显示的标题</p>
						</div>
						<div class="from-group">
							<label for="package">应用包名</label> <input id="package" type="text"
								class="form-control" name="package" value="<?= Security::escapeHTML($appInfo->getPackage()) ?>" />
							<p class="help-block">例如：com.example.app</p>
						</div>
						<div class="form-group">
							<label for="description">应用描述</label>
							<textarea id="description" name="description"
								class="form-control" rows="3"><?= Security::escapeHTML($appInfo->getDescription()) ?></textarea>
							<p class="help-block">&lt;ul&gt;</p>
						</div>
						<div class="form-group">
							<label for="platform">应用平台</label> <select id="platform"
								class="form-control" name="platform" value="<?= Security::escapeHTML($appInfo->getPlatform()) ?>">
								<option value="android-aarch32">Android ARM32</option>
								<option value="android-aarch64">Android ARM64</option>
								<option value="android-x86">Android x86</option>
							</select>
						</div>
						<div class="form-group">
							<label for="developer">开发者</label> <input id="developer"
								type="text" class="form-control" name="developer" value="<?= Security::escapeHTML($appInfo->getDeveloper())?>" />
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
<?php
deline_show_footer();
deline_show_html_foot();