<?php
deline_show_html_head();
deline_show_header();
?>
<div class="container-fluid">
	<div class="row">
        <?php if (isset($parameters["message"])): ?>
            <p>
                <?= $parameters["message"] ?>
            </p>
        <?php endif; ?>
        <div class="col-md-8 col-md-offset-2">
			<form method="post" role="form">
				<div class="row">
					<div class="col-md-6">
						<h4>首先，请告诉我你的用户名和mimi(秘密)：</h4>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="username">用户名</label> <input id="username"
								type="text" pattern="[A-Za-z0-9]{8,13}" class="form-control"
								name="username" placeholder="用户名" />
							<p class="help-block">用户名只能由字母和数字组成，且长度在8到13个字符之间！</p>
						</div>
						<div class="form-group">
							<label for="password">密码</label> <input id="password"
								type="password" pattern="[A-Za-z0-9\\$\\^!@#%&_-]{9,16}"
								class="form-control" name="password" placeholder="密码" />
							<p class="help-block">密码为字母和数字以及任何“!@#$%^&amp;_-”特殊字符组成！</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>其次，请告诉我你的性别</h4>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="radio">
								<label><input type="radio" name="gender" checked="checked"
									value="0" />保密</label> <label><input type="radio" name="gender"
									value="1" />男生</label> <label><input type="radio" name="gender"
									value="2" />女生</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>再次，请告诉我你的一些可选的信息</h4>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="nickname">昵称</label> <input id="nickname" type="text"
								class="form-control" name="nickname" />
							<p class="help-block">昵称的长度为2到16个字符！</p>
						</div>
						<div class="form-group">
							<label for="description">个人介绍</label>
							<textarea id="description" class="form-control"
								name="description"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>然后，请同意我们的服务条款</h4>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="checkbox">
								<label><input type="checkbox" name="license" />我同意 <a
									href="?node=/About/License" target="_blank">《CAstore 服务条款》</a></label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>最后，点击“提交”按钮</h4>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-default" name="user_sign_up"
							value="user_sign_up">提交</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
deline_show_footer();
deline_show_html_foot();