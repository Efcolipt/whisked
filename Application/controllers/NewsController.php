<?php 

namespace application\controllers; 

use application\core\Controller; 
use application\lib\Db; 

class NewsController extends  Controller{
	
	public function indexAction()
	{	$vars = [
			'name'=>'Вася',
			'Age'=> '88',
			'array'=>[1,2,3],
		];
		
		$db = new Db;
		$params =[];

		//$data = $db->column('SELECT name FROM users  WHERE id = :id',$params);
		//echo $data;
		
		//$data = $db->row('SELECT * FROM users',$params);

		//debug($data[1]['name']);

	$this->view->render('Новости',$vars );

	}

	public function articleAction()
	{	$vars = [
			'name'=>'Вася',
			'Age'=> '88',
			'array'=>[1,2,3],
		];
		
		$db = new Db;
		$params =[];

		//$data = $db->column('SELECT name FROM users  WHERE id = :id',$params);
		//echo $data;
		
		//$data = $db->row('SELECT * FROM users',$params);

		//debug($data[1]['name']);

	$this->view->render('Статья',$vars );

	}

	

}
 ?>