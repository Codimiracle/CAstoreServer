<?php
deline_load_script("static/js/article-album-file-append.js");
deline_show_html_head();
deline_show_header();
?>
<div class="container">
	<form role="form" action="<?= deline_link("/ArticleAlbum/Append") ?>"
		enctype='multipart/form-data' method="post">
		<div class="form-group">
			<label for="title">标题</label> <input id="title" class="form-control"
				type="text" name="title" />
			<p class="help-block">文章特辑的标题</p>
		</div>
		<div class="form-group">
			<label for="content">文章内容</label>
			<textarea id="content" rows="15" class="form-control" name="content"></textarea>
			<p class="help-block">&lt;img src='1'&gt;
				表示引用第一张后续上传的插图。支持HTML的标签：&lt;p&gt;&lt;strong&gt;</p>
		</div>
		<div id="illustration-container">
			<div class="form-group">
				<label>插图 1</label> <input type="file" name="illustration[]" />
			</div>
		</div>
		<button id="append-file" type="button">添加上传位</button>
		<button type="submit" name="article_album_append"
			value="article_album_append">提交</button>
	</form>
</div>
<?php
deline_show_footer();
deline_show_html_foot();