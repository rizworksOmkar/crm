<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Package;
use App\Models\Admin\PackageSeason;
use App\Models\Admin\Season;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PackageSeasonController extends Controller
{
    //
    public function index()
    {
        $packages = Package::where('groupdepartureflag',0)->get();
        $seasonpackages = Season::orderByRaw('id ASC')->get(); 
        return view('admin.package-season.index', compact('packages','seasonpackages'));
    }

    public function seasonDetails(Request $request)
    {
        // $seasons = PackageSeason::where('package_id', $request->packageid)->get();

        $seasons = DB::table('package_seasons as ps')
        ->join('seasones as se', 'ps.season_type', '=', 'se.id')
        ->select('ps.id as id','se.season_name as season_name',
        'ps.season_start as season_start', 'ps.season_end as season_end','ps.season_price as season_price')
        ->where('ps.package_id', $request->packageid)
        ->get();

        return response()->json([
            'seasons' => $seasons,
        ]);
    }
    //seasonStore

    public function seasonStore(Request $request)
    {
        $flag = 0;
        $season_startDate = $request->season_start;
        
        
        $checkDublicateSeasonsDateamepacakge =  PackageSeason::where('package_id',$request->packageid)
                                                            ->whereRaw('DATE("'.$season_startDate.'") between season_start and season_end')                                                        
                                                            ->count();
                                                            // echo($checkDublicateSeasonsDateamepacakge);die();
        

        // $checkDublicateSeasonsamepacakge = PackageSeason::where('package_id',$request->packageid)
        //                                     ->where('season_type',$request->season_type)
        //                                     ->count();

        // if( $checkDublicateSeasonsamepacakge > 0){
        //     return response()->json(['flag' => 1, 'message' => 'Same Season Not Alowed In Same Package']);
        // } 
        if($checkDublicateSeasonsDateamepacakge > 0){
            return response()->json(['flag' => 1, 'message' => 'Your Given Date Lies In The Previous Range Try Another Date ']);
        }      

        $seasons = new PackageSeason();
        $seasons->package_id = $request->packageid;
        $seasons->season_type = $request->season_type;
        $seasons->season_start = $request->season_start;
        $seasons->season_end = $request->season_end;
        $seasons->season_price = $request->season_price;
        $seasons->save();


        if ($seasons) {
            return response()->json(['success' => true, 'message' => 'success']);
          } else {
              return response()->json(["errors" => "Data not saved successfully"], 401);
          }
    }

    //seasondelete
    public function deleteSeasonDetails($id)
    {

        $del_season_id = PackageSeason::find($id);
        $del_season_id->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully',
        ]);
    }

}
