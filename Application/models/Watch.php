<?php 

namespace Application\Models;
use Application\Core\Model;

class Watch extends Model
{
	public function getContent($path = '')
	{
		$content = @file_get_contents($path);
	    $content = json_decode($content);
	    if ($content != false && !is_null($content)) {
	    	return $content;
	    }
	    return false;
	}
	
}


?>