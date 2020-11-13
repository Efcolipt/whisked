<?php 

namespace Application\Models;
use Application\Core\Model;

class Collection extends Model
{
	public function reArray($arr = [],$is = false)
	{

		$result = [];
		$newArr = [];
		for ($i = 0; $i < count($arr); $i++) { 

			$newArr[$i] = (array) $arr[$i];
			
			if ($is) {
				if (!isset($newArr[$i]['name']) || !isset($newArr[$i]['id']) ) {
					continue;
				}
				$result[$i]['id'] = $newArr[$i]['id'];
				$result[$i]['title'] = $newArr[$i]['name'];
				$result[$i]['date'] =  !empty($newArr[$i]['first_air_date']) ? $newArr[$i]['first_air_date'] : "";
				$result[$i]['vote_average'] =  !empty($newArr[$i]['vote_average']) ? $newArr[$i]['vote_average'] : 0 ;
				$result[$i]['poster_path'] =  $newArr[$i]['poster_path'];
			}else{
				if (!isset($newArr[$i]['title']) || !isset($newArr[$i]['id']) ) {
					continue;
				}
				$result[$i]['id'] = $newArr[$i]['id'];
				$result[$i]['title'] = $newArr[$i]['title'];
				$result[$i]['date'] =  !empty($newArr[$i]['release_date']) ? $newArr[$i]['release_date'] : "";
				$result[$i]['vote_average'] =  !empty($newArr[$i]['vote_average']) ? $newArr[$i]['vote_average'] : 0 ;
				$result[$i]['poster_path'] =  $newArr[$i]['poster_path'];
			}
			
				
		}

		return $result;
	}
	
}


?>