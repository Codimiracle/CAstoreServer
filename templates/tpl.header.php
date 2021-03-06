<?php
$userdata = deline_session_get("logged_user");
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?= deline_link("/"); ?>">CAstore</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
        	<?php if ($userdata): ?>
            	<li><a class="navigation-btn" href="<?= deline_link("/User") ?>"><?= $userdata ? $userdata->getNickname() : "" ?></a></li>
				<li><a class="navigation-btn" href="<?= deline_link("/User/SignOut") ?>"><span
						class="glyphicon glyphicon-log-out"></span>登出</a></li>
            <?php else: ?>
            	<li><a class="navigation-btn" href="<?= deline_link("/User/SignIn") ?>"><span
						class="glyphicon glyphicon-log-in"></span>登入</a></li>
				<li><a class="navigation-btn" href="<?= deline_link("/User/SignUp") ?>"><span
						class="glyphicon glyphicon-user"></span>注册</a></li>
            <?php endif;?>
        </ul>
		</div>
	</div>
</nav>
