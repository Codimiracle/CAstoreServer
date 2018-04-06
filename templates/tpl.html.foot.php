<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="static/bootstrap/js/jquery-1.12.4.js"></script>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="static/bootstrap/js/bootstrap.min.js"></script>
<!-- Custom Scripts -->
<?php foreach ($GLOBALS["scripts"] as $script):?>
<script src="<?= $script ?>"></script>
<?php endforeach; ?>
</body>
</html>
<?php
