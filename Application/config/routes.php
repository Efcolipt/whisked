<?php

return [
	'' => [
		'controller'=>'collection',
		'action'=>'movies',
	],

	'home' => [
		'controller'=>'collection',
		'action'=>'movies',
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

	'login' => [
		'controller'=>'account',
		'action'=>'login',
	],

	'register' => [
		'controller'=>'account',
		'action'=>'register',
	],

	'logout' => [
		'controller'=>'account',
		'action'=>'logout',
	],

	'profile' => [
		'controller'=>'account',
		'action'=>'profile',
	],

	'profile/history' => [
		'controller'=>'account',
		'action'=>'history',
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
];
 ?>
