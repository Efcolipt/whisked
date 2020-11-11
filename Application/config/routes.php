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
		'controller'=>'collection',
		'action'=>'movies',
	],
	'serials' => [
		'controller'=>'collection',
		'action'=>'serials',
	],
	'watch/movie' => [
		'controller'=>'watch',
		'action'=>'movie',
	],

	'watch/serial' => [
		'controller'=>'watch',
		'action'=>'serial',
	],

	'search' => [
		'controller'=>'search',
		'action'=>'index',
	],
];
 ?>