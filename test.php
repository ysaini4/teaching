<?php
include "includes/app.php";


echo qtable("bookedclasses", false);
echo "<br><br><br><br>";

Disp::disp_table(Sqle::getA(qtable("bookedclasses", false)));


?>
<?php
closedb();
?>