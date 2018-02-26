<div class="container-fluid">
	<div class="row">
        <?php if (isset($parameters["message"])): ?>
            <p class="text-danger">
                <?= $parameters["message"] ?>
            </p>
        <?php endif; ?>
        <form method="post" role="form">
			<div class="form-group">
				<label for="username">用户名</label> <input type="text"
					class="form-control" name="username" placeholder="用户名">
			</div>
			<div class="form-group">
				<label for="password">密码</label> <input type="password"
					class="form-control" name="password" placeholder="密码">
			</div>
			<div class="form-group">
				<div class="checkbox">
					<label><input type="checkbox">记住我的登录状态</label>
					<p class="help-block">在自己的电脑的话，请勾选哦。</p>
				</div>

			</div>
			<button type="submit" class="btn btn-default" name="user_sign_in"
				value="user_sign_in">登录</button>
		</form>
	</div>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-1-19
 * Time: 下午8:55
 */