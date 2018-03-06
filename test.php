<?php 
for ($i = 0; $i < 10; $i++) {
    echo hash("md5", time() . rand())."\n";
}

?>