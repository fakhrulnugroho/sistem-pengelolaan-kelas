<?php 

require_once dirname(__FILE__) . "/config.php";

function base_url($path = ""){
	$base_url = $BASE_URL . "/" . ltrim($path, "/");
	return $base_url;
}

function set_flash_message($tipe, $pesan){
	$_SESSION['flash_message'] = [
		'tipe' => $tipe,
		'pesan' => $pesan,
	];
}

function check_flash_message($tipe){
	if(isset($_SESSION['flash_message'])){
		return $_SESSION['flash_message']['tipe'] == $tipe;
	} else return false;
}

function get_flash_message(){
	echo $_SESSION['flash_message']['pesan'];
	unset($_SESSION['flash_message']);
}

?>