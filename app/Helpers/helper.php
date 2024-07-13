<?php
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Models\Admin\Package;
use App\Models\Admin\PackageType;
use App\Models\Admin\Destination;
use App\Models\Admin\PackageActivity;
use App\Models\Admin\Season;
use App\Models\Admin\HotelPropertytype;
use App\Models\Admin\Hotel;
use App\Models\Admin\HotelRoomDetailsPrices;
use App\Models\Admin\PackageSeason;
use Carbon\Carbon;

if (!function_exists('getCountryName')) {
    function getCountryName($country_id){
        $country_names = "";
		$country_ids = explode(',', $country_id);
        foreach ($country_ids as $id) {
            $country_row = Country::where('id', $id)->first();
            if($country_row){
			    $country_names .= $country_row->country_name . ', ';
		    }
        }
        return rtrim($country_names, ', ');
	}
}

if (!function_exists('getStateName')) {
    function getStateName($state_id){
        $state_names = "";
		$state_ids = explode(',', $state_id);
        foreach ($state_ids as $id) {
            $state_row = State::where('id', $id)->first();
            if($state_row){
			    $state_names .= $state_row->state_name . ', ';
		    }
        }
        return rtrim($state_names, ', ');
	}
}


if (!function_exists('getCityName')) {
    function getCityName($city_id){
        $city_names = "";
		$city_ids = explode(',', $city_id);
        foreach ($city_ids as $id) {
            $city_row = City::where('id', $id)->first();
            if($city_row){
			    $city_names .= $city_row->city_name . ', ';
		    }
        }
        return rtrim($city_names, ', ');
	}
}

if (!function_exists('getCityNamewithoutcomma')) {
    function getCityNamewithoutcomma($city_id){
        $city_names = "";
		$city_row = City::where('id', $city_id)->first();
        if($city_row){
			$city_names = $city_row->city_name;
		}
		return $city_names;
	}
}

if (!function_exists('getDestiThumb_image')) {
    function getDestiThumb_image($desti_id){
        $desti_thumb_image = "";
		$desti_row = Destination::where('id', $desti_id)->first();
        if($desti_row){
			$desti_thumb_image = $desti_row->main_photo;
		}
		return $desti_thumb_image;
	}
}

if (!function_exists('getDestibanner_image')) {
    function getDestibanner_image($desti_id){
        $desti_banner_img = "";
		$desti_row = Destination::where('id', $desti_id)->first();
        if($desti_row){
			$desti_banner_img = $desti_row->secondary_photo_1;
		}
		return $desti_banner_img;
	}
}

if (!function_exists('getPackagetype')) {
    function getPackagetype($pacakgetype_id){
        $pacakgetype_names = "";
		$pacakgetype_ids = explode(',', $pacakgetype_id);
        foreach ($pacakgetype_ids as $id) {
            $pacakgetype_row = PackageType::where('id', $id)->first();
            if($pacakgetype_row){
			    $pacakgetype_names .= $pacakgetype_row->package_type . '-> ';
		    }
        }
        return rtrim($pacakgetype_names, ', ');
	}
}

if (!function_exists('getPackageActivity')) {
    function getPackageActivity($pacakgeActivity_id){
        $pacakgeActivity_names = "";
		$pacakgeActivity_ids = explode(',', $pacakgeActivity_id);
        foreach ($pacakgeActivity_ids as $id) {
            $pacakgeActivity_row = PackageActivity::where('id', $id)->first();
            if($pacakgeActivity_row){
			    $pacakgeActivity_names .= $pacakgeActivity_row->package_activity . ', ';
		    }
        }
        return rtrim($pacakgeActivity_names, ', ');
	}
}

if (!function_exists('getpackageName')) {
    function getpackageName($pacak_id){
        $package_name = "";
		$package_row = Package::where('id', $pacak_id)->first();
        if($package_row){
			$package_name = $package_row->package_name;
		}
		return $package_name;
	}
}

if (!function_exists('getDaysandNight')) {
    function getDaysandNight($pacak_id){
        $package_DaysandNight_name = "";
		$package_row = Package::where('id', $pacak_id)->first();
        if($package_row){
			$package_DaysandNight_name = $package_row->for_number_of_days.' Days / '.$package_row->for_number_of_nights. ' Nights';
		}
		return $package_DaysandNight_name;
	}
}

if (!function_exists('getSeasonName')) {
    function getSeasonName($season_id){
        $Season_name = "";
		$Season_row = Season::where('id', $season_id)->first();
        if($Season_row){
			$Season_name = $Season_row->season_name;
		}
		return $Season_name;
	}
}

if (!function_exists('getPropertName')) {
    function getPropertName($pro_id){
        $pro_name = "";
		$pro_row = HotelPropertytype::where('id', $pro_id)->first();
        if($pro_row){
			$pro_name = $pro_row->propertytype;
		}
		return $pro_name;
	}
}

if (!function_exists('getHotelName')) {
    function getHotelName($hotel_id){
        $hotel_name = "";
		$hotel_row = Hotel::where('id', $hotel_id)->first();
        if($hotel_row){
			$hotel_name = $hotel_row->hotel_name;
		}
		return $hotel_name;
	}
}

if (!function_exists('getRoomName')) {
    function getRoomName($room_id){
        $room_name = "";
		$room_row = HotelRoomDetailsPrices::where('id', $room_id)->first();
        if($room_row){
			$room_name = $room_row->room_name;
		}
		return $room_name;
	}
}

if (!function_exists('getpackageImage')) {
    function getpackageImage($pacak_id){
        $package_image = "";
		$package_row = Package::where('id', $pacak_id)->first();
        if($package_row){
			$package_image = $package_row->package_image;
		}
		return $package_image;
	}
}


if (!function_exists('getPacakgeCostByseason')) {
    function getPacakgeCostByseason($pacak_id){
		$season_startDate = Carbon::now();
        $pacakage_season_cost = 0;
		$pacakage_season__row = PackageSeason::where('package_id', $pacak_id)->whereRaw('DATE("'.$season_startDate.'") between season_start and season_end')->first();
        if($pacakage_season__row){
			$pacakage_season_cost = $pacakage_season__row->season_price;
		}
		return $pacakage_season_cost;
	}
}

