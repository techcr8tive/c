<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header("HTTP/1.0 404 Not Found");
}

$frames = [
	[
		'name' => 'A Night Of Prevailing Prayer',
		'src'  => 'uploads/avatar.png'
	],
	
];

header('Content-Type: application/json');
echo json_encode( $frames );
?>