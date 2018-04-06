<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="author" content="Codimiracle" />
<meta name="email" content="Codimiracle@outlook.com" />
<meta name="generator" content="CAstore Templating System" />
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title><?= $attributes["title"].$attributes["title_system"] ?></title>

<!-- Bootstrap -->
<link href="static/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<!-- Bootstrap Theme-->
<link href="static/bootstrap/css/bootstrap-thmeme.min.css" />
<!-- Deline -->
<link href="static/css/oxygen-card-ui.css" rel="stylesheet" />

<!-- Customs  -->
<?php foreach ($GLOBALS["stylesheets"] as $stylesheet): ?>
<link href="<?= $stylesheet ?>" rel="stylesheet">
<?php endforeach; ?>

<!-- Custom Scripts -->
<?php foreach ($GLOBALS["scripts_sync"] as $script):?>
<script src="<?= $script ?>"></script>
<?php endforeach; ?>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
