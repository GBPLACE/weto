<?php

namespace App\Http\Controllers;

use App\Click;
use App\Country;
use App\Http\Requests\AddPropertyRequest;
use App\Http\Requests\EditPropertyRequest;
use App\Partner;
use App\Property;
use App\PropertyAttribute;
use App\PropertyMainPhoto;
use App\PropertyPhoto;
use App\UnavailableDate;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use \Validator;

class PartnerController extends Controller
{
    public function settings(){
        $id=session('partner')['id'];
        $partner=Partner::where('id', $id)->first();

        $homeContent = \App\SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
        $homeContent = $homeContent->toArray() ;

        return view('partner.settings', compact('partner' , 'homeContent'));
    }

    public function submitSettings(Request $request){
        $request->validate([
            'name' => 'required|min:3|regex:/^[a-zA-Z\s]*$/',
            'password' =>'required',
            'new_password' =>'required|min:8',
            'new_password_conformation' =>'required',
        ]);

        $id=session('partner')['id'];
        $partner=Partner::where('id', $id)->first();

        if (Hash::check($request->password,  $partner->password)){
            $query=Partner::where('id', $id)->update(['name'=> $request->name, 'password'=> Hash::make($request->new_password)]);
            if ($query){
                return back()->with('message', 'Password updated successfully.');
            }
            else{
                return back()->with('error', 'Something went wrong.');
            }
        }
        else{
            return back()->with('error', 'Password is incorrect.');
        }
    }

    public function partnerPropertyList(){
        return view('partner.partnerPropertyList');
    }

    public function getPartnerProperties(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1)
            $offset = 0;
        else
        {
            $offset = ($page_num-1) * 6;
        }

        $partner_id=session('partner')['id'];

        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto', 'PropertyPhoto', 'Click')->where(['draft'=> 0, 'block'=> 0, 'partner_id'=> $partner_id])->offset($offset)->limit(6)->get();
        $total=Property::with('PropertyAttribute', 'PropertyMainPhoto', 'PropertyPhoto', 'Click')->where(['draft'=> 0, 'block'=> 0, 'partner_id'=> $partner_id])->count();
        //dd($property->toArray());
        $data = ['property'=>$property , 'total'=>$total];
        return json_encode($data);
    }

    public function partnerPropertyDetails($id){

        $id = substr($id, strrpos($id, '-') + 1) ;

        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto', 'PropertyPhotoOrder', 'Country')->where('id', $id)->first()->toArray();

        $property_type_name = \DB::table('property_types')->where('id' , $property['property_type_id'])->select('name')->get() ;

        $property_type_name = $property_type_name[0]->name ;

        return view('partner.partnerPropertyDetails', compact('property', 'id' , 'property_type_name'));
    }

    public function addProperty(){

        $countries=Country::all();
        $villas = \DB::table('villas')->get() ;
        $property_types = \DB::table('property_types')->get() ;
        $homeContent = \App\SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
        $homeContent = $homeContent->toArray() ;

        return view('partner.addProperty', compact('countries' , 'homeContent' , 'villas' ,'property_types'));
    }

    public function submitProperty(Request $request){
        //dd($request->toArray());
        if (!is_null($request->country_name)){
            $rules=[
                'country_name' => 'required|unique:countries,country',
            ];
            $messages=[
                'country_name.required' => 'Country name is required.',
                'country_name.unique' => 'Country name already exists.',
            ];

            $validator=Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()){
                $error=$validator->errors();
                return back()->withErrors($error)->withInput();
            }

            $country=new Country();
            $country->country=$request->country_name;
            $country->save();

            $country=Country::orderBy('id', 'DESC')->first();
            $country_id=$country->id;
        }
        else{
            $country_id=$request->country_id;
        }

        $partner_id=session('partner')['id'];

        $property=new Property();
        $property->partner_id=$partner_id;
        $property->name=$request->name;
        $property->country_id=$country_id;
        $property->province=$request->province_name;
        $property->city=$request->city;

        $property->villa_id=$request->Villa_category;

        $property->address=$request->address;
        $property->number=$request->number;
        $property->capacity=$request->capacity;
        $property->number_of_people=$request->number_of_people;
        $property->property_type_id=$request->type;
        $property->bedroom=$request->bedroom;
        $property->bathroom=$request->bathroom;
        $property->floor=$request->floor;
        $property->description=$request->description;
        $property->price_per_night=$request->price_per_night;
        $property->currency=$request->currency;
        $property->each_extra_guest=$request->each_extra_guest;
        $property->final_cleaning=$request->final_cleaning;
        $property->city_tax=$request->city_tax;
        $property->property_url=$request->property_url;
        $property->draft=$request->draft;
        $query=$property->save();

        if ($query){
            $property=Property::orderBy('id', 'DESC')->first();
            $property_id=$property->id;

            if($request->hasFile('main_photo')){
                $rand = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
                $fileName = time().$rand.'.'.$request->main_photo->extension();
                $request->main_photo->move(public_path('propertyUploads'), $fileName);

                $property_main_photo= new PropertyMainPhoto();
                $property_main_photo->property_id=$property_id;
                $property_main_photo->main_photo=$fileName;
                $property_main_photo->save();
            }

            if($request->hasfile('other_photos')){
                foreach($request->file('other_photos') as $file){
                    $rand = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
                    $name = time().$rand.'.'.$file->extension();
                    $file->move(public_path().'/propertyUploads/', $name);

                    $property_photo= new PropertyPhoto();
                    $property_photo->property_id=$property_id;
                    $property_photo->other_photos=$name;
                    $property_photo->save();
                }
            }

            $property_attribute=new PropertyAttribute();
            $property_attribute->property_id=$property_id;
            $property_attribute->terrace=$request->terrace;
            $property_attribute->pool=$request->pool;
            $property_attribute->tennis=$request->tennis;
            $property_attribute->spa=$request->spa;
            $property_attribute->gym=$request->gym;
            $property_attribute->kitchen=$request->kitchen;
            $property_attribute->breakfast=$request->breakfast;
            $property_attribute->restaurant=$request->restaurant;
            $property_attribute->wifi=$request->wifi;
            $property_attribute->tv=$request->tv;
            $property_attribute->elevator=$request->elevator;
            $property_attribute->safebox=$request->safebox;
            $property_attribute->ac=$request->ac;
            $property_attribute->coffee=$request->coffee;
            $property_attribute->pets_allowed=$request->pets_allowed;
            $property_attribute->reception=$request->reception;
            $property_attribute->hairdryer=$request->hairdryer;
            $property_attribute->bathrobe=$request->bathrobe;
            $property_attribute->towels=$request->towels;
            $property_attribute->kit_bathroom=$request->kit_bathroom;
            $property_attribute->shower=$request->shower;
            $property_attribute->bathtub=$request->bathtub;
            $property_attribute->dishwasher=$request->dishwasher;
            $property_attribute->washing_machine=$request->washing_machine;
            $property_attribute->iron=$request->iron;
            $property_attribute->ironboard=$request->ironboard;
            $property_attribute->baby_cot=$request->baby_cot;
            $property_attribute->stroller=$request->stroller;
            $property_attribute->parking=$request->parking;
            $property_attribute->garage=$request->garage;
            $property_attribute->check_in_24h=$request->check_in_24h;
            $property_attribute->luggage_deposit=$request->luggage_deposit;
            $query=$property_attribute->save();

            if ($query){
                if ($request->draft==0){
                    //send email to admin that a new property is created.
                    $partner=Partner::find($partner_id);
                    $partner_name=$partner->name;

                    $MAIL_USERNAME=env('MAIL_USERNAME');
                    $MAIL_FROM_NAME=env('MAIL_FROM_NAME');
                    $to_email=env('MAIL_TO_ADDRESS');

                    $data = array('subject' => 'New Property Created | WETO',
                        'partner_name'=> $partner_name, 'property_name'=> $request->name,
                        'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME,
                        'to_name' => 'WETO Admin', 'to_email' => $to_email);

                    Mail::send('emails.newPropertyRegisterAdminMail', $data, function($message) use ($data) {
                        $message->to($data['to_email'], $data['to_name'])
                            ->subject($data['subject'])
                            ->from($data['email'], $data['Appname']);
                    });

                    return back()->with('message', 'Property added successfully and is sent to admin for approval');
                }
                else{
                    return back()->with('message', 'Draft saved successfully.');
                }
            }
            else{
                return back()->with('error', 'Something went wrong.');
            }
        }
        else{
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function editProperty($id){
        $countries=Country::all();
        $villas = \DB::table('villas')->get() ;
        $property_types = \DB::table('property_types')->get() ;
        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto', 'PropertyPhotoOrder')->where('id', $id)->first()->toArray();

        return view('partner.editProperty', compact('property', 'countries' , 'villas' ,'property_types'));
    }

    public function deleteOtherPhoto(Request $request){
        if($request->id!='' && $request->id!=null){
            $query=PropertyPhoto::where('id', $request->id)->delete();
            if($query){
                if ($request->image_name){
                    if(file_exists(public_path() .'/propertyUploads/'.$request->image_name)){
                        unlink(public_path() .'/propertyUploads/'.$request->image_name);
                    }
                }
                
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

    public function submitEditedProperty(EditPropertyRequest $request){
//        dd($request->toArray());

        if ($request->draft==1){
            //send email to admin that a new property is created if it was a draft property.
            $partner=Partner::find(session('partner')['id']);
            $partner_name=$partner->name;

            $MAIL_USERNAME=env('MAIL_USERNAME');
            $MAIL_FROM_NAME=env('MAIL_FROM_NAME');
            $to_email=env('MAIL_TO_ADDRESS');

            $data = array('subject' => 'New Property Created | WETO',
                'partner_name'=> $partner_name, 'property_name'=> $request->name,
                'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME,
                'to_name' => 'WETO Admin', 'to_email' => $to_email);

            Mail::send('emails.newPropertyRegisterAdminMail', $data, function($message) use ($data) {
                $message->to($data['to_email'], $data['to_name'])
                    ->subject($data['subject'])
                    ->from($data['email'], $data['Appname']);
            });

            $draft=0;
        }
        else{
            $draft=$request->draft;
        }

        $property=Property::where('id', $request->property_id)->first();
        $property->name=$request->name;
        $property->country_id=$request->country_id;
        $property->city=$request->city;
        $property->province=$request->province_name;
        $property->villa_id=$request->Villa_category;

        $property->address=$request->address;
        $property->number=$request->number;
        $property->capacity=$request->capacity;
        $property->number_of_people=$request->number_of_people;
        $property->property_type_id=$request->type;
        $property->bedroom=$request->bedroom;
        $property->bathroom=$request->bathroom;
        $property->floor=$request->floor;
        $property->description=$request->description;
        $property->price_per_night=$request->price_per_night;
        $property->currency=$request->currency;
        $property->each_extra_guest=$request->each_extra_guest;
        $property->final_cleaning=$request->final_cleaning;
        $property->city_tax=$request->city_tax;
        $property->property_url=$request->property_url;
        $property->draft=$draft;
        $property->save();

        if($request->hasFile('main_photo')){
            //delete old
            if ($request->old_main_photo_name){
                if(file_exists(public_path() .'/propertyUploads/'.$request->old_main_photo_name)){
                    unlink(public_path() .'/propertyUploads/'.$request->old_main_photo_name);
                }
                PropertyMainPhoto::find($request->old_main_photo_id)->delete();
            }

            //insert new
            $rand = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
            $fileName = time().$rand.'.'.$request->main_photo->extension();
            $request->main_photo->move(public_path('propertyUploads'), $fileName);

            $property_main_photo= new PropertyMainPhoto();
            $property_main_photo->property_id=$request->property_id;
            $property_main_photo->main_photo=$fileName;
            $property_main_photo->save();
        }

        if($request->hasfile('other_photos')){
            foreach($request->file('other_photos') as $file){
                $rand = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
                $name = time().$rand.'.'.$file->extension();
                $file->move(public_path().'/propertyUploads/', $name);

                $property_photo= new PropertyPhoto();
                $property_photo->property_id=$request->property_id;
                $property_photo->other_photos=$name;
                $property_photo->save();
            }
        }

        $property_attribute=PropertyAttribute::where('property_id', $request->property_id)->first();
        $property_attribute->terrace=$request->terrace;
        $property_attribute->pool=$request->pool;
        $property_attribute->tennis=$request->tennis;
        $property_attribute->spa=$request->spa;
        $property_attribute->gym=$request->gym;
        $property_attribute->kitchen=$request->kitchen;
        $property_attribute->breakfast=$request->breakfast;
        $property_attribute->restaurant=$request->restaurant;
        $property_attribute->wifi=$request->wifi;
        $property_attribute->tv=$request->tv;
        $property_attribute->elevator=$request->elevator;
        $property_attribute->safebox=$request->safebox;
        $property_attribute->ac=$request->ac;
        $property_attribute->coffee=$request->coffee;
        $property_attribute->pets_allowed=$request->pets_allowed;
        $property_attribute->reception=$request->reception;
        $property_attribute->hairdryer=$request->hairdryer;
        $property_attribute->bathrobe=$request->bathrobe;
        $property_attribute->towels=$request->towels;
        $property_attribute->kit_bathroom=$request->kit_bathroom;
        $property_attribute->shower=$request->shower;
        $property_attribute->bathtub=$request->bathtub;
        $property_attribute->dishwasher=$request->dishwasher;
        $property_attribute->washing_machine=$request->washing_machine;
        $property_attribute->iron=$request->iron;
        $property_attribute->ironboard=$request->ironboard;
        $property_attribute->baby_cot=$request->baby_cot;
        $property_attribute->stroller=$request->stroller;
        $property_attribute->parking=$request->parking;
        $property_attribute->garage=$request->garage;
        $property_attribute->check_in_24h=$request->check_in_24h;
        $property_attribute->luggage_deposit=$request->luggage_deposit;
        $property_attribute->save();

        return back()->with('message', 'Property details updated successfully.');
    }

    public function deleteProperty(Request $request){
        $id=$request->id;
        if ($id!=null && $id!=''){
            $query=Property::where('id', $id)->delete();
            if ($query){
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

    public function setUnavailability($id){
        return view('partner.setUnavailability', compact('id'));
    }

    public function submitUnavailabilityDates(Request $request){
        $request->validate([
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' =>'required|date_format:d/m/Y',
        ]);

        $tempDate = explode('/',$request->start_date);
        $start_date = $tempDate[2].'-'.$tempDate[1].'-'.$tempDate[0];
        $tempDate = explode('/',$request->end_date);
        $end_date = $tempDate[2].'-'.$tempDate[1].'-'.$tempDate[0];

        if ($start_date > $end_date){
            return back()->with('error', 'Start date can not be less than end date.')->withInput();
        }
        else{
            $unavailableDate=new UnavailableDate();
            $unavailableDate->property_id=$request->property_id;
            $unavailableDate->start_date=$start_date;
            $unavailableDate->end_date=$end_date;
            $query=$unavailableDate->save();

            if ($query){
                return back()->with('message', 'Unavailable dates added successfully.');
            }
            else{
                return back()->with('error', 'Something went wrong.');
            }
        }
    }

    public function getUnavailableDates(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1)
            $offset = 0;
        else
        {
            $offset = ($page_num-1) * 10;
        }

        $unavailableDate=UnavailableDate::where('property_id', $request->property_id)->offset($offset)->limit(10)->get();
        $total=UnavailableDate::where('property_id', $request->property_id)->count();
        //dd($property->toArray());
        $data = ['unavailableDate'=>$unavailableDate , 'total'=>$total];
        return json_encode($data);
    }

    public function deleteUnavailabilityDate(Request $request){
        $id=$request->id;
        if ($id!=null && $id!=''){
            $query=UnavailableDate::where('id', $id)->delete();
            if ($query){
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

    public function getCalenderUnavailableDates(Request $request){
        $unavailableDates=UnavailableDate::where('property_id', $request->id)->get();
        return json_encode($unavailableDates);
    }

    public function draft(){
        return view('partner.draft');
    }

    public function getDrafts(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 10;
        }

        $partner_id=session('partner')['id'];

        $draft=Property::with('Country')->where(['partner_id'=> $partner_id, 'draft' => 1])->offset($offset)->limit(10)->get();
        $total=Property::where(['partner_id'=> $partner_id, 'draft' => 1])->count();
        //dd($draft->toArray());
        $data = ['draft'=>$draft , 'total'=>$total];
        return json_encode($data);
    }

    public function deleteDraft(Request $request){
        $id=$request->id;
        if ($id!=null && $id!=''){
            $query=Property::where('id', $id)->delete();
            if ($query){
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

    public function getGraphData(Request $request){
        $month=$request->month;
        $year=$request->year;

        $click=Click::where('property_id', $request->property_id)->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->pluck('created_at')->map(function($date) {
            return $date->format('d');
        });
        $days=$click->toArray();

        $daysArray=array();

        for ($i=1; $i<=31; $i++){
            $count=0;
            foreach ($days as $day){
                if ($day==$i){
                    ++$count;
                }
            }

            $daysArray[]=$count;
        }

        return json_encode($daysArray);
    }

    public function blockedProperties(){
        return view('partner.blockedProperties');
    }

    public function getPartnerBlockedProperties(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1)
            $offset = 0;
        else
        {
            $offset = ($page_num-1) * 6;
        }

        $partner_id=session('partner')['id'];
        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto', 'PropertyPhoto', 'Click')->where(['draft'=> 0, 'block'=> 1, 'partner_id'=> $partner_id])->offset($offset)->limit(6)->get();
        $total=Property::with('PropertyAttribute', 'PropertyMainPhoto', 'PropertyPhoto', 'Click')->where(['draft'=> 0, 'block'=> 1, 'partner_id'=> $partner_id])->count();
        //dd($property->toArray());
        $data = ['property'=>$property , 'total'=>$total];
        return json_encode($data);
    }

//      sort photos
        public function photosSortable( Request $request ) {

//            $PropertyPhotos = PropertyPhoto::where('property_id' , $request->propery_id)->get();

                foreach ($request->order as $order) {

                        PropertyPhoto::where('id' , $order['id'])->update(['p_order' => $order['position']]);
                }



            return response('Update Successfully.', 200);

        }

}
