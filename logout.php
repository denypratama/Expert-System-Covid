<?php
session_start();
session_destroy();
session_unset();

echo "<center><b>Logging Out ... Tunggu Sebentar<b>";
echo "<meta http-equiv='refresh' content='3; url=beranda.php'>";

exit;

?>