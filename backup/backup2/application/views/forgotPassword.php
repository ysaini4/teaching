<?php

$result = Email::sendMessage('tejpalsharma9310@gmail.com','Test','Reset Your Password','Reset Your Password HERE');
if($result){
	echo "Sent";
}
else{
	echo "Sorry E-Mail could not be sent";
}

?>
