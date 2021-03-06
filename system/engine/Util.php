<?php

class Util{
    
    public static function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
		
		$sort_col = array();
		
		foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
	}
	
	public static function convert($size){
		$unit=array('b','kb','mb','gb','tb','pb');
		return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}

	public static function is_ajax_request(){
		return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ? true : false;
	}

	public static function escape($value) {
		return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
	}

	static function deleteSpacesAtEndAndBegining($string){

        if($string !== "" && $string !== " "){
            $i = 0;
            $len = strlen($string);

            //Spaces at the begining
            for($i; $i < $len; $i++){
                if($string[$i] === " "){
                    if($i === 0){
                        $string = substr($string, 1);
                        $len = strlen($string);
                        $i = -1;
                    }
                }
            }

            //Spaces at the end
            $i = strlen($string);

            for($i; $i >= 0; $i--){
                if($string[$i-1] === " "){
                    if($i === strlen($string)){
                        $string = substr($string, 0, ($i - 1));
                        $i = strlen($string) + 1;
                    }else{
                        break;
                    }
                }
            }
        }       

        return $string;
	}
	
	static function cleanInput(){

		function array_clean(&$value) {
			$value = Util::deleteSpacesAtEndAndBegining($value); //Duplicated values
			$value = Util::escape($value); //SQL injections
			$value = strip_tags($value); //Avoid XSS attacks
		}
		
		array_walk_recursive($_GET, 'array_clean');
		array_walk_recursive($_POST, 'array_clean');
		array_walk_recursive($_COOKIE, 'array_clean');
	}
}