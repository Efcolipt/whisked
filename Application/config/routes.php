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

	'movies' => [
		'controller'=>'collection',
		'action'=>'movies',
	],
	'serials' => [
		'controller'=>'collection',
		'action'=>'serials',
	],
	'watch/{q:\d+}' => [
		'controller'=>'watch',
		'action'=>'watching',
	],

	'search' => [
		'controller'=>'collection',
		'action'=>'search',
	],
];
 ?>
