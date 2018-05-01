<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="static/bootstrap/js/jquery-1.12.4.js"></script>
<?php
$foot = $GLOBALS["foot_additional"];
if (!is_null($foot)) {
    echo $foot;
}
?>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="static/bootstrap/js/bootstrap.min.js"></script>


<!-- Dynamic Scripts -->
<?php foreach ($GLOBALS["scripts"] as $script):?>
<script src="<?= $script ?>"></script>
<?php endforeach; ?>
</body>
</html>
<?php
