<?php
    namespace App\Helpers;
    use Carbon\Carbon;

    class customeIDgenerator{

        public static function IDGenerator($model, $trow, $length = 4, $prefix){
            $data = $model::orderBy('id','desc')->first();
            $date = Carbon::now()->format('dmY');
            if(!$data){
                $og_length = $length;
                $last_number=1;
            }else{
                $code = substr($data->$trow, strlen($prefix)+1);   //STD-000012| GET THELAST CODE WITHOUT PREFIX
                // echo($code ); die();
                $actual_last_number = ((int)$code/1)*1; // If Last Code is 000012 then Actual Last number is(000012/1)*1=12
                // echo($actual_last_number );die();
                $incriment_last_number = $actual_last_number+1; // Actual Last number =12  incriment_last_number = 12+1=13
                $incriment_last_number_length = strlen($incriment_last_number);
                ///echo($incriment_last_number_length ); die();
                $og_length = ($length + $incriment_last_number_length )- 1;
                $last_number = $incriment_last_number;
                //return $actual_last_number;
            }
            $zeros="";
            for($i=0; $i<$og_length;$i++){
                $zeros.= "0";
            }
            return $prefix.'-'.$zeros.$last_number;
            // return $last_number;
        }

    }
