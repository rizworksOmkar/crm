<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class DataStoreController extends Controller
{
    
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
    public function countryStore(Request $request)
    {
        $request->validate([
            'country_name' => 'required',
            'country_alias' => 'nullable',
            'country_code' => 'nullable',

        ]);

        $country = new Country();
        $country->country_name = $request->country_name;
        $country->country_alias = $request->country_alias;
        $country->country_code = $request->country_code;
        $country->d_i_f = $request->input('d_i_f', 0);
        $country->save();
        if($country){

            return response()->json(['success' => true, 'message' => 'success']);
          }
          else{
            return response()->json(['success' => false, 'message' => 'error']);
          }
    }
    public function stateStore(Request $request)
    {
       $request->validate([
            'country_id' => 'required',
            'state_name' => 'required',
            'state_alias' => 'nullable',

        ]);

        $state = new State();
        $state->country_id = $request->country_id;
        $state->state_name = $request->state_name;
        $state->state_alias = $request->state_alias;

        $state->save();
        if($state){

            return response()->json(['success' => true, 'message' => 'success']);
          }
          else{
            return response()->json(['success' => false, 'message' => 'error']);
          }
    }
    public function cityStore(Request $request)
    {
        $request->validate([
            'country_id' => 'required',

            'city_name' => 'required',
            'city_alias' => 'nullable',

        ]);

        $city = new City();
        $city->country_id = $request->country_id;
        $city->state_id = $request->state_id;
        $city->city_name = $request->city_name;
        $city->city_alias = $request->city_alias;

        $city->save();
        if($city){

            return response()->json(['success' => true, 'message' => 'success']);
          }
          else{
            return response()->json(['success' => false, 'message' => 'error']);
          }
    }


}
