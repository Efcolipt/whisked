<?php 

return [
	'' => [
		'controller'=>'main',
		'action'=>'index',
	],
	'contact/{id:\s+}' => [
		'controller'=>'main',
		'action'=>'contact',
	],

	'contact/contact1' => [
		'controller'=>'main',
		'action'=>'contact1',
	],

	'news' => [
		'controller'=>'news',
		'action'=>'index',
	],
	'news/article' => [
		'controller'=>'news',
		'action'=>'article',
	],
];

 ?>