<?php

namespace Application\models;
use Application\core\Model;

class Collection extends Model
{
	public static function reDataMovies($arr = [])
	{

		$result = [];
		$newArr = [];
		for ($i = 0; $i < count($arr); $i++) {
			$newArr[$i] = (array) $arr[$i];
			if (!isset($newArr[$i]['title']) || !isset($newArr[$i]['id']) ) {
				continue;
			}
			$result[$i]['id'] = $newArr[$i]['id'];
			$result[$i]['title'] = $newArr[$i]['title'];
			$result[$i]['date'] =  !empty($newArr[$i]['release_date']) ? $newArr[$i]['release_date'] : "";
			$result[$i]['vote_average'] =  !empty($newArr[$i]['vote_average']) ? $newArr[$i]['vote_average'] : 0 ;
			$result[$i]['poster_path'] =  $newArr[$i]['poster_path'];
			}
		return $result;
	}


	public static function reDataSerials($arr = [])
	{
		$result = [];
		$newArr = [];
		for ($i = 0; $i < count($arr); $i++) {

			$newArr[$i] = (array) $arr[$i];

			if (!isset($newArr[$i]['name']) || !isset($newArr[$i]['id']) ) {
				continue;
			}
			$result[$i]['id'] = $newArr[$i]['id'];
			$result[$i]['title'] = $newArr[$i]['name'];
			$result[$i]['date'] =  !empty($newArr[$i]['first_air_date']) ? $newArr[$i]['first_air_date'] : "";
			$result[$i]['vote_average'] =  !empty($newArr[$i]['vote_average']) ? $newArr[$i]['vote_average'] : 0 ;
			$result[$i]['poster_path'] =  $newArr[$i]['poster_path'];

		}

		return $result;
	}


	public static function reDataSearch($arr = [])
	{


		$result = [];
		$newArr = [];
		for ($i = 0; $i < count($arr); $i++) {

			$newArr[$i] = (array) $arr[$i];

			if ($newArr[$i]['media_type'] == 'tv') {
				if (!isset($newArr[$i]['media_type']) || !isset($newArr[$i]['name'])|| !isset($newArr[$i]['id']) ) {
					continue;
				}
				$result[$i]['media_type'] = "serial";
				$result[$i]['title'] = $newArr[$i]['name'];
				$result[$i]['date'] =  !empty($newArr[$i]['first_air_date']) ? $newArr[$i]['first_air_date'] : "";
				$result[$i]['vote_average'] =  !empty($newArr[$i]['vote_average']) ? $newArr[$i]['vote_average'] : 0 ;
				$result[$i]['poster_path'] =  $newArr[$i]['poster_path'];

			} else{
				if (!isset($newArr[$i]['media_type']) || !isset($newArr[$i]['title']) || !isset($newArr[$i]['id'])) {
					continue;
				}
				$result[$i]['media_type'] = $newArr[$i]['media_type'];
				$result[$i]['title'] = $newArr[$i]['title'];
				$result[$i]['date'] =  !empty($newArr[$i]['release_date']) ? $newArr[$i]['release_date'] : "";
				$result[$i]['vote_average'] =  !empty($newArr[$i]['vote_average']) ? $newArr[$i]['vote_average'] : 0;
				$result[$i]['poster_path'] =  !empty($newArr[$i]['poster_path']) ? $newArr[$i]['poster_path'] : "";

			}
			$result[$i]['id'] = $newArr[$i]['id'];
		}
		return $result;
	}

}


?>
