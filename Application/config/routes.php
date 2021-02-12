<?php

return [
	'' => [
		'controller'=>'main',
		'action'=>'home',
	],

	'home' => [
		'controller'=>'main',
		'action'=>'home',
	],

	'rightholders' => [
		'controller'=>'main',
		'action'=>'right',
	],

	'contacts' => [
		'controller'=>'main',
		'action'=>'contacts',
	],

	'quality' => [
		'controller'=>'main',
		'action'=>'quality',
	],


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

	'user/{user:\w+}' => [
		'controller'=>'account',
		'action'=>'user',
	],


	'watch/{q:\d+}' => [
		'controller'=>'watch',
		'action'=>'watching',
	],

	'movies' => [
		'controller'=>'collection',
		'action'=>'movies',
	],
	'anime' => [
		'controller'=>'collection',
		'action'=>'anime',
	],
	'serials' => [
		'controller'=>'collection',
		'action'=>'serials',
	],

	'search' => [
		'controller'=>'collection',
		'action'=>'search',
	],
];
 ?>
