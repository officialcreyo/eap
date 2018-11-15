<?php
	if(!ISSET($_SESSION['sp_id'])){
		header('location: ../index.php?login=sponsor');
	}
?>