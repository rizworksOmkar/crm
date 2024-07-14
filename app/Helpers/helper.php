<?php
use App\Models\User;
use Carbon\Carbon;


if (!function_exists('getEmplyeeName')) {
    function getEmplyeeName($empl_id){
        $empl_name = "";
		$empl_row = User::where('id', $empl_id)->first();
        if($empl_row){
			if($empl_row->middle_name == ""){
				$empl_name = $empl_row->first_name ." ".$empl_row->last_name;
			}else{
				$empl_name = $empl_row->first_name." ".$empl_row->middle_name." ".$empl_row->last_name;
			}
		}
		return $empl_name;
	}
}

