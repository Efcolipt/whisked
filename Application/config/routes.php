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

	// 'user/{id:\b}' => [
	// 	'controller'=>'main',
	// 	'action'=>'index',
	// ],

	'account/login' => [
		'controller'=>'account',
		'action'=>'login',
	],

	'account/register' => [
		'controller'=>'account',
		'action'=>'register',
	],
	'account/logout' => [
		'controller'=>'account',
		'action'=>'logout',
	],

	'account/user/{user:\w+}' => [
		'controller'=>'account',
		'action'=>'user',
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
		'controller'=>'collection',
		'action'=>'search',
	],
];
 ?>
