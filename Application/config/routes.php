<?php 

return [
	'' => [
		'controller'=>'main',
		'action'=>'index',
	],
	'home' => [
		'controller'=>'main',
		'action'=>'index',
	],
	'movies' => [
		'controller'=>'movies',
		'action'=>'index',
	],
	'serials' => [
		'controller'=>'serials',
		'action'=>'index',
	],
	'watch/{id:\d+}' => [
		'controller'=>'watch',
		'action'=>'index',
	],

	'search' => [
		'controller'=>'search',
		'action'=>'index',
	],
];
 ?>