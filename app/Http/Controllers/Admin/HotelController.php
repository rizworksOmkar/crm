<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Hotel;
use App\Models\Admin\HotelRoomPrice;
use App\Models\Admin\HotelIndoorRoomImages;
use App\Models\Admin\HotelOutdoorRoomImages;
use App\Models\Admin\HotelReceptionImages;
use App\Models\Admin\HotelAmenities;
use App\Models\Admin\HotelCategory;
use App\Models\Admin\HotelPropertytype;
use App\Models\Admin\HotelPropertRules;
use App\Models\Admin\HotelTrans;
use App\Models\Admin\HotelCostByRoomTypes;
use App\Models\Admin\HotelRoomDetailsPrices;
use App\Models\Admin\HotelRoomOptions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HotelController extends Controller
{
    public function priceDetails(Request $request)
    {
        // $hotelprices = HotelRoomPrice::where('hotel_id', $request->hotelid)->get();
        $hotelprices = DB::table('hotel_roomprices as hrp')
        ->join('seasones as se', 'hrp.season_type', '=', 'se.id')        
        ->join('hotel_room_details_prices as hrps', 'hrp.room_type', '=', 'hrps.id')
        ->select('hrp.id as id','se.season_name as season_name','hrp.room_type as room_type','hrps.room_name as room_name',
        'hrp.season_start as season_start', 'hrp.season_end as season_end','hrp.rack_rate as rack_rate',
        'hrp.hotel_rate as hotel_rate','hrp.description as description')
        ->where('hrp.hotel_id', $request->hotelid)
        ->get();

        return response()->json([
            'hotelprices' => $hotelprices,
        ]);
    }
    public function priceStore(Request $request)
    {
        // echo($request->hotel_rooms);die();
        $hotelprices = new HotelRoomPrice();
        $hotelprices->hotel_id = $request->hotelId;
        $hotelprices->room_type = $request->hotel_rooms;
        $hotelprices->season_type = $request->season_type;
        $hotelprices->breakfast_included = $request->breakfast;       
        $hotelprices->season_start = $request->season_start;
        $hotelprices->season_end = $request->season_end;
        $hotelprices->rack_rate = $request->rackrate;
        $hotelprices->hotel_rate = $request->hotelrate;
        $hotelprices->description = $request->pricedescription;
        $hotelprices->save();


        if ($hotelprices) {
            return response()->json(['success' => true, 'message' => 'success']);
          } else {
              return response()->json(["errors" => "Data not saved successfully"], 401);
          }
    }
    public function deleteHotelPrice($id)
    {

        $del_season_id = HotelRoomPrice::find($id);
        $del_season_id->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully',
        ]);
    }
    public function indoorImageStore(Request $request)
    {
       
        $fetchNameofhotellist = Hotel::select('hotel_name')->where('id', $request->hdnhotelidIndoor)->first();
        $hotelname = $fetchNameofhotellist['hotel_name'];
       
        $hotel_image_indoor_path = '';
        if ($request->hasFile('ftpIndoorImg')) {
            $file = $request->file('ftpIndoorImg');
            $extension = $file->getClientOriginalExtension();
            $filename = $hotelname.'_Indoor'.time() . '.' . $extension;
            $file->move('storage/admin/img/hotelimage/', $filename);
            $hotel_image_indoor_path = '/storage/admin/img/hotelimage/' . $filename;
        }
        
        $hotelIndoorImageSave = new HotelIndoorRoomImages();
        $hotelIndoorImageSave->hotel_id = $request->hdnhotelidIndoor;
        $hotelIndoorImageSave->details_of_indoor_room = $request->roomdetailsIndoor;
        $hotelIndoorImageSave->indoor_room_images = $hotel_image_indoor_path;
        $hotelIndoorImageSave->save();


        if ($hotelIndoorImageSave) {
            return response()->json(['success' => true, 'message' => 'success']);
          } else {
              return response()->json(["errors" => "Data not saved successfully"], 401);
          }
    }

    public function hotelAmenitiesDetails(Request $request)
    {
       
        $hotelAminities = DB::table('hotel_trans as ht')
        ->join('hotel_amenities as ha', 'ht.amenities_id', '=', 'ha.id')
        ->select('ht.id as id','ha.amenities as amenities','ht.hotel_id as hotel_id')
        ->where('ht.hotel_id', $request->hotelid)
        ->get();

        return response()->json([
            'hotelAminities' => $hotelAminities,
        ]);
    }

    public function hotelAmenitiesDetailsStore(Request $request)
    {
        $hotelAminitiesDeatailsSave = new HotelTrans();
        $hotelAminitiesDeatailsSave->hotel_id = $request->hdnhotelidAmenities;
        $hotelAminitiesDeatailsSave->amenities_id = $request->ddlAmenities;
        $hotelAminitiesDeatailsSave->save();


        if ($hotelAminitiesDeatailsSave) {
            return response()->json(['success' => true, 'message' => 'success']);
          } else {
              return response()->json(["errors" => "Data not saved successfully"], 401);
          }
    }

    public function deletehotelAmenitiesDetails($id)
    {

        $del_hotelAmenitiesDetails_id = HotelTrans::find($id);
        $del_hotelAmenitiesDetails_id->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully',
        ]);
    }

    public function hotelPrpertRulesDetails(Request $request)
    {
      
        $hotelPropertyruls = DB::table('hotel_trans as ht')
        ->join('hotel_property_rules as hpr', 'ht.property_rules_id', '=', 'hpr.id')
        ->select('ht.id as id','hpr.property_rules as property_rules','ht.hotel_id as hotel_id')
        ->where('ht.hotel_id', $request->hotelid)
        ->get();

        return response()->json([
            'hotelPropertyruls' => $hotelPropertyruls,
        ]);
    }

    public function hotelPrpertRulesDetailsStore(Request $request)
    {
        // echo($request->hdnhotelidPropRules);die();
        $hotelPropertRulesSave = new HotelTrans();
        $hotelPropertRulesSave->hotel_id = $request->hdnhotelidPropRules;
        $hotelPropertRulesSave->property_rules_id = $request->ddlPropRules;
        $hotelPropertRulesSave->save();


        if ($hotelPropertRulesSave) {
            return response()->json(['success' => true, 'message' => 'success']);
          } else {
              return response()->json(["errors" => "Data not saved successfully"], 401);
          }
    }

    public function deletehotelPrpertRulesDetails($id)
    {

        $del_HotelProperty_id = HotelTrans::find($id);
        $del_HotelProperty_id->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully',
        ]);
    }

    public function hotelRoomsStore(Request $request){
       
        $image = $request->icon_photo;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name_thumbnil = 'hotelmain_'.time().'.png';

        $image_path_thnumbnil = 'storage/admin/img/hotel-main/hotel-rooms'.$image_name_thumbnil;
        file_put_contents($image_path_thnumbnil, $image);

        $hotellroomSave = new HotelRoomDetailsPrices();
        $hotellroomSave->hotel_id = $request->input('hotelid');
        $hotellroomSave->room_name = $request->input('roomtype');
        $hotellroomSave->room_size = $request->input('sqfit');
        $hotellroomSave->bed_type = $request->input('bedtype');
        $hotellroomSave->max_guest = $request->input('maxguest');
        $hotellroomSave->room_view = $request->input('roomview');   
        $hotellroomSave->room_image = $image_path_thnumbnil;
        $hotellroomSave->room_description = $request->input('room_description'); 
        $hotellroomSave->tax_apllied_flag = $request->input('selecttax'); 
        $hotellroomSave->tax_parcentage = $request->input('includingtax'); 
        $hotellroomSave->bace_discount = $request->input('bacediscount');
        $hotellroomSave->special_discount = $request->input('sepecialdiscount');
        $hotellroomSave->save();

        if($hotellroomSave){
            return response()->json(['success' => true, 'message' => 'success']);
        }
        else{
          return response()->json(['success' => false, 'message' => 'error']);
        }
    }
    public function hotelRoomDelete(Request $request)
    {
        $deletedid = HotelRoomDetailsPrices::where('id', $request->id)->delete();

    }

    public function getRoomDetailsbyHotelID(Request $request)
    {
        $hotelRoom = HotelRoomDetailsPrices::where('hotel_id', $request->id)->get();       
        return response()->json([
            'hotelRoom' => $hotelRoom
        ]);
    }

    public function getHotelRoomOption(Request $request)
    {
        $hotelOptions = HotelRoomOptions::where('hotel_id', $request->hotelid)
        ->where('room_id', $request->roomlid)
        ->get();
        return response()->json([
            'hotelOptions' => $hotelOptions,
        ]);
    }

    public function roomOptionStore(Request $request)
    {
        // echo($request->hotel_rooms);die();
        $HoteloptionsSave = new HotelRoomOptions();
        $HoteloptionsSave->hotel_id = $request->hotelId;
        $HoteloptionsSave->room_id = $request->roomID;
        $HoteloptionsSave->optiones = $request->options;
        $HoteloptionsSave->save();


        if ($HoteloptionsSave) {
            return response()->json(['success' => true, 'message' => 'success']);
          } else {
              return response()->json(["errors" => "Data not saved successfully"], 401);
          }
    }

    public function deleteroomOption($id)
    {

        $del_HotelRoomOptions_id = HotelRoomOptions::find($id);
        $del_HotelRoomOptions_id->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully',
        ]);
    }

}
