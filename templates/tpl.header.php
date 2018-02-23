<?php
$userdata = isset($session["logged_user"]) ? $session["logged_user"] : null;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="Codimiracle"/>
    <meta name="email" content="Codimiracle@outlook.com"/>
    <meta name="generator" content="CAstore Templating System"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $attributes["title"].$attributes["title_system"] ?></title>

    <!-- Bootstrap -->
    <link href="static/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Bootstrap Theme-->
    <link href="static/bootstrap/css/bootstrap-thmeme.min.css"/>
    <!-- Deline -->
    <link href="static/css/oxygen-card-ui.css" rel="stylesheet"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="?node=/">CAstore</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
        	<?php if ($userdata): ?>
            	<li><a href="?node=/User"><?= $userdata ? $userdata->getNickname() : "" ?></a></li>
            	<li><a href="?node=/User/SignOut"><span class="glyphicon glyphicon-log-out"></span>登出</a></li>
            <?php else: ?>
            	<li><a href="?node=/User/SignIn"><span class="glyphicon glyphicon-log-in"></span>登入</a></li>
            	<li><a href="?node=/User/SignUp"><span class="glyphicon glyphicon-user"></span>注册</a></li>
            <?php endif;?>
        </ul>
    </div>
</nav>
<?php
