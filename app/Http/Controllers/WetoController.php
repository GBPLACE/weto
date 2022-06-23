<?php

namespace App\Http\Controllers;

use App\Click;
use App\Property;
use App\SiteContent;
use App\SiteSeo;
use App\UnavailableDate;
use App\WishList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class WetoController extends Controller
{
    public function index(){
        $featured=Property::with('PropertyAttribute', 'PropertyMainPhoto')->where(['draft'=> 0, 'block'=> 0, 'featured'=> 1])->get()->toArray();

        $click=Click::select('property_id', DB::raw('COUNT(property_id) AS occurrences'))
                    ->groupBy('property_id')->orderBy('occurrences', 'DESC')->limit(4)->get();
        $property_id=$click->pluck('property_id')->toArray();
        $properties=Property::with('PropertyAttribute', 'PropertyMainPhoto')->whereIn('id', $property_id)->where('block', 0)->get()->toArray();

        $accommodations = DB::table('villas')->get() ;
        $hotel = false;
        $apartment = false;
        $bb = false;
        $villas = false;
        $other =false;

        if (count($accommodations)){
            foreach ($accommodations as $accommodation){
                if($accommodation->id == 7){
                    $hotel=true ;
                }
                elseif ($accommodation->id == 3){
                    $apartment=true;
                }
                elseif ($accommodation->id == 20){
                    $bb=true;
                }
                elseif ($accommodation->id == 11){
                    $villas=true;
                }
                else{
                    $other=true;
                }
            }
        }

        if($hotel==true){
            $hotel=Property::where(['villa_id'=> 7, 'draft'=> 0, 'block'=> 0])->count();
            $accommodation=DB::table('villas')->find(7);
            $hotel_name=$accommodation->villa;
        }
        else{
            $hotel=0;
            $hotel_name="Hotel";
        }

        if($apartment==true){
            $apartment=Property::where(['villa_id'=> 3, 'draft'=> 0, 'block'=> 0])->count();
            $accommodation=DB::table('villas')->find(3);
            $apartment_name=$accommodation->villa;
        }
        else{
            $apartment=0;
            $apartment_name="Apartment";
        }

        if($bb==true){
            $bb=Property::where(['villa_id'=> 20, 'draft'=> 0, 'block'=> 0])->count();
            $accommodation=DB::table('villas')->find(20);
            $bb_name=$accommodation->villa;
        }
        else{
            $bb=0;
            $bb_name="B&B";
        }

        if($villas==true){
            $villas=Property::where(['villa_id'=> 11, 'draft'=> 0, 'block'=> 0])->count();
            $accommodation=DB::table('villas')->find(11);
            $villas_name=$accommodation->villa;
        }
        else{
            $villas=0;
            $villas_name="Villas";
        }

        if($other==true){
            $other=Property::where(['draft'=> 0, 'block'=> 0])->whereNotIn('villa_id', [7,3,20,11])->count();
        }
        else{
            $other=0;
        }

        $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
        $homeContent = $homeContent->toArray() ;

        $siteSeo = SiteSeo::where('site_page_number' , 1)->first() ;
        $siteSeo = $siteSeo->toArray() ;

        $accommodations=DB::table('villas')->get();

        return view('front.index', compact('featured','properties', 'homeContent' , 'siteSeo', 'accommodations', 'hotel', 'hotel_name',
            'apartment', 'apartment_name', 'bb', 'bb_name', 'villas', 'villas_name', 'other'));
    }

    public function search(){
        $siteSeo = SiteSeo::where('site_page_number' , 2)->first() ;
        $siteSeo = $siteSeo->toArray() ;

        $property_type_name = DB::table('property_types')->get();

        $accommodations=DB::table('villas')->get();
        return view('front.search' , compact('siteSeo' , 'property_type_name', 'accommodations') );
    }

    public function getPropertiesList(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 18;
        }

        $order=null;
        $where=" draft=0 AND block=0 AND verify=1";

        //get all those properties for which current date is available (exclude the properties for which unavailability date is set)
        $property=UnavailableDate::whereDate('start_date', '<=', Carbon::today())
            ->whereDate('end_date', '>=', Carbon::today())
            ->get();
        $property_id=$property->pluck('property_id');
        if (count($property_id)){
            $property_id = str_replace( array('[',']') , ''  , $property_id );
            $where.=" AND id NOT IN (".$property_id.") ";
        }


        if (!is_null($request->type)){
            $where.=" AND property_type_id=$request->type ";
        }

        if (!is_null($request->price_range)){
            if ($request->price_range=='maxToMin'){
                $order='DESC';
            }
            else{
                $order='ASC';
            }
        }

        if (!is_null($request->check_in) && !is_null($request->check_out)){
            $tempDate = explode('/',$request->check_in);
            $start = $tempDate[2].'-'.$tempDate[1].'-'.$tempDate[0];

            $tempDate = explode('/',$request->check_out);
            $end = $tempDate[2].'-'.$tempDate[1].'-'.$tempDate[0];

            $property=UnavailableDate::where(function ($query) use ($start, $end) {

                $query->where(function ($q) use ($start, $end) {
                    $q->where('start_date', '>=', $start)
                        ->where('start_date', '<', $end);

                })->orWhere(function ($q) use ($start, $end) {
                    $q->where('start_date', '<=', $start)
                        ->where('end_date', '>', $end);

                })->orWhere(function ($q) use ($start, $end) {
                    $q->where('end_date', '>', $start)
                        ->where('end_date', '<=', $end);

                })->orWhere(function ($q) use ($start, $end) {
                    $q->where('start_date', '>=', $start)
                        ->where('end_date', '<=', $end);
                });

            })->get();

            $property_id=$property->pluck('property_id');
            if (count($property_id)){
                $property_id = str_replace( array('[',']') , ''  , $property_id );
                $where.=" AND id NOT IN (".$property_id.") ";
            }

            if (!is_null($request->accommodation)){
                if ($request->accommodation!='all'){
                    $where.=" AND villa_id=$request->accommodation ";
                }
            }

            if (!is_null($request->people)){
                $where.=" AND number_of_people >= $request->people ";
            }

            if (!is_null($request->city)){
                $where.=" AND city LIKE '%".$request->city."%' ";
            }
        }

        if (!is_null($order)){
            $property=Property::with('PropertyAttribute', 'PropertyMainPhoto')
                ->whereRaw($where)->orderBy('price_per_night', $order)->offset($offset)->limit(18)->get();
            $total=Property::whereRaw($where)->count();
        }
        else{
            $property=Property::with('PropertyAttribute', 'PropertyMainPhoto')
                ->whereRaw($where)->offset($offset)->limit(18)->get();
            $total=Property::whereRaw($where)->count();
        }

        $data = ['property'=>$property , 'total'=>$total];
        return json_encode($data);
    }

    public function searchSend(Request $request){
        $request->validate([
            'city'=> 'required',
            'check_in' =>'required|date_format:d/m/Y',
            'check_out' =>'required|date_format:d/m/Y',
            'people'=> 'required|numeric',
            'accommodation'=> 'required',
        ]);

        $city=$request->city;
        $check_in=$request->check_in;
        $check_out=$request->check_out;
        $people=$request->people;
        $accommodation_search=$request->accommodation;

        $siteSeo = SiteSeo::where('site_page_number' , 2)->first();
        $siteSeo = $siteSeo->toArray() ;

        $property_type_name = DB::table('property_types')->get();
        $accommodations=DB::table('villas')->get();

        return view('front.search', compact('city', 'check_in', 'check_out', 'people', 'accommodation_search' , 'siteSeo', 'property_type_name', 'accommodations'));
    }

    public function propertyDetails($property_id){

        $property_id = substr($property_id, strrpos($property_id, '-') + 1) ;

        if (session()->has('user')){
            $user_id=session('user')['id'];

            $wishList=WishList::where(['user_id'=> $user_id, 'property_id'=> $property_id])->first();
            $property=Property::with('PropertyAttribute', 'PropertyMainPhoto', 'PropertyPhotoOrder', 'Country')->where('id', $property_id)->first()->toArray();

            $property_type_name = DB::table('property_types')->where('id' , $property['property_type_id'])->select('name')->get() ;

            $property_type_name = $property_type_name[0]->name ;
        }
        else{
            $wishList=null;

            $property=Property::with('PropertyAttribute', 'PropertyMainPhoto', 'PropertyPhotoOrder', 'Country')->where('id', $property_id)->first()->toArray();

            $property_type_name = DB::table('property_types')->where('id' , $property['property_type_id'])->select('name')->get() ;
            $property_type_name = $property_type_name[0]->name ;
        }

        $click=Click::select('property_id', DB::raw('COUNT(property_id) AS occurrences'))
            ->groupBy('property_id')->orderBy('occurrences', 'DESC')->limit(4)->get();
        $property_id=$click->pluck('property_id')->toArray();
        $properties=Property::with('PropertyAttribute', 'PropertyMainPhoto')->whereIn('id', $property_id)->where('block', 0)->get()->toArray();

        $accommodations=DB::table('villas')->get();

        return view('front.propertyDetails', compact('property', 'wishList', 'properties' , 'property_type_name', 'accommodations'));
    }

    public function addClick(Request $request){
        if($request->id!='' && $request->id!=null){

            $click=new Click();
            $click->property_id=$request->id;
            $query=$click->save();

            if($query){
                return json_encode('success');
            }
            else{
                return json_encode('error');
            }
        }
        else{
            return json_encode('error');
        }
    }

    public function privacyPolicy(){
        return view('front.privacyPolicy');
    }


}
