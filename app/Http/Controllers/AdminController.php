<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Click;
use App\Country;
use App\HeaderBannerContent;
use App\Http\Requests\EditPropertyRequest;
use App\Partner;
use App\Property;
use App\PropertyAttribute;
use App\PropertyMainPhoto;
use App\PropertyPhoto;
use App\SiteContent;
use App\SiteSeo;
use App\UnavailableDate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function adminLogin(){

        $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
        return view('admin.adminLogin' , compact('homeContent'));
    }

    public function forgotPassword(){

        $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;

        return view('admin.forgotPassword' , compact('homeContent'));
    }
    public function submitAdminLogin(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required'
        ]);

        $admin = Admin::where('email',$request->email)->first();
        if ($admin){
            $password=$admin->password;
            if(Hash::check($request->password, $password)){
                session(['admin'=>$admin]);
                return redirect()->route('dashboard');
            }
            else {
                return back()->withInput()->with('error', 'Email or Password entered is incorrect.');
            }
        }
        else {
            return back()->withInput()->with('error', 'Email or Password entered is incorrect.');
        }
    }

    public function submitAdminEmail(Request $request){
        $request->validate([
            'email' =>'required|email',
        ]);

        $admin = Admin::where('email',$request->email)->first();
        if ($admin){
            $MAIL_USERNAME=env('MAIL_USERNAME');
            $MAIL_FROM_NAME=env('MAIL_FROM_NAME');
            $random_token = Str::random(20);

            $query=Admin::where('email',$request->email)->update(['token'=>$random_token]);
            if($query){
                $data = array('subject' => 'Recover Password | WETO',
                    'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME, 'token' => $random_token,
                    'to_name' => $admin->name, 'to_email' => $admin->email);

                Mail::send('emails.adminForgotPasswordMail', $data, function($message) use ($data) {
                    $message->to($data['to_email'], $data['to_name'])
                        ->subject($data['subject'])
                        ->from($data['email'], $data['Appname']);
                });

                return redirect()->back()->with('message', 'A Password reset link is sent to your email address. Click that link to reset your password.');
            }
            else {
                return back()->withInput()->with('error', 'Email entered is incorrect.');
            }
        }
        else {
            return back()->withInput()->with('error', 'Email entered is incorrect.');
        }
    }

    public function checkAdminResetPasswordToken($token){

        $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;

        if ($token!=''){
            $admin=Admin::where('token', '=' ,$token)->first();
            if ($admin){
                $admin_id=$admin->id;
                return view('admin.resetPassword', compact('admin_id' , 'homeContent'));
            }
            else{
                return redirect()->route('adminLogin')->with('error','Email verification failed (Link Expired).');
            }
        }
        else{
            return redirect()->route('adminLogin')->with('error','Email verification failed (Link Expired).');
        }
    }

    public function submitAdminPasswordReset(Request $request){
        $request->validate([
            'password' =>'required|min:8',
            'password_conformation' =>'required|min:8',
        ]);

        if ($request->admin_id!='' && $request->admin_id!=null){
            $query = Admin::where('id', '=', $request->admin_id)->update(['password' => Hash::make($request->password), 'token' => null]);
            if ($query) {
                return redirect()->route('adminLogin')->with('message', 'Password reset successfully.');
            }
            else {
                return redirect()->route('adminLogin')->with('error', 'Something went wrong.');
            }
        }
        else{
            return redirect()->route('adminLogin')->with('error','Email verification failed (Link Expired).');
        }
    }

    public function adminLogout(){
        session()->forget('admin');
        return redirect()->route('adminLogin');
    }

    public function dashboard(){
        $properties=Property::where('draft', 0)->count();
        $users=User::where('email_verification', 1)->count();
        $partners=Partner::where('email_verification', 1)->count();

        return view('admin.dashboard', compact('properties', 'users', 'partners'));
    }

    public function usersList(){
        return view('admin.usersList');
    }

    public function getUsersList(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 10;
        }

        if (!is_null($request->name)){
            $users=User::where('email_verification', 1)->where('name', 'LIKE', '%'.$request->name.'%')->offset($offset)->limit(10)->get();
            $total=User::where('email_verification', 1)->where('name', 'LIKE', '%'.$request->name.'%')->count();
        }
        else{
            $users=User::where('email_verification', 1)->offset($offset)->limit(10)->get();
            $total=User::where('email_verification', 1)->count();
        }

        $data = ['users'=>$users , 'total'=>$total];
        return json_encode($data);
    }

    public function deleteUser(Request $request){
        if($request->id!='' && $request->id!=null){

            $user=User::where('id', $request->id)->first();
            if($user){
                $MAIL_USERNAME=env('MAIL_USERNAME');
                $MAIL_FROM_NAME=env('MAIL_FROM_NAME');

                $data = array('subject' => 'User Account Deleted | WETO',
                    'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME,
                    'to_name' => $user->name, 'to_email' => $user->email);

                Mail::send('emails.deleteUserAccountMail', $data, function($message) use ($data) {
                    $message->to($data['to_email'], $data['to_name'])
                        ->subject($data['subject'])
                        ->from($data['email'], $data['Appname']);
                });

                User::where('id', $request->id)->delete();

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

    public function partnersList(){
        return view('admin.partnersList');
    }

    public function getPartnersList(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 10;
        }

        if (!is_null($request->name)){
            $users=Partner::with('Property')->where('email_verification', 1)->where('name', 'LIKE', '%'.$request->name.'%')->offset($offset)->limit(10)->get();
            $total=Partner::with('Property')->where('email_verification', 1)->where('name', 'LIKE', '%'.$request->name.'%')->count();
        }
        else{
            $users=Partner::with('Property')->where('email_verification', 1)->offset($offset)->limit(10)->get();
            $total=Partner::with('Property')->where('email_verification', 1)->count();
        }

        $data = ['users'=>$users , 'total'=>$total];
        return json_encode($data);
    }

    public function deletePartner(Request $request){
        if($request->id!='' && $request->id!=null){

            $partner=Partner::where('id', $request->id)->first();
            if($partner){
                $MAIL_USERNAME=env('MAIL_USERNAME');
                $MAIL_FROM_NAME=env('MAIL_FROM_NAME');

                $data = array('subject' => 'Partner Account Deleted | WETO',
                    'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME,
                    'to_name' => $partner->name, 'to_email' => $partner->email);

                Mail::send('emails.deletePartnerAccountMail', $data, function($message) use ($data) {
                    $message->to($data['to_email'], $data['to_name'])
                        ->subject($data['subject'])
                        ->from($data['email'], $data['Appname']);
                });

                Partner::where('id', $request->id)->delete();

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

    public function partnerDetails($partner_id){
        $partner=Partner::where('id', $partner_id)->first()->toArray();

        return view('admin.partnerDetails', compact('partner_id', 'partner'));
    }

    public function getPartnerPropertiesForAdmin(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 15;
        }

        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto')->where(['draft'=> 0, 'verify'=> 1, 'reject'=> 0, 'partner_id'=> $request->partner_id])->offset($offset)->limit(15)->get();
        $total=Property::with('PropertyAttribute', 'PropertyMainPhoto')->where(['draft'=> 0, 'verify'=> 1, 'reject'=> 0, 'partner_id'=> $request->partner_id])->count();

        $properties=Property::where(['partner_id'=> $request->partner_id, 'draft'=> 0, 'verify'=> 1, 'reject'=> 0])->count();
        $available_properties=Property::where(['partner_id'=> $request->partner_id, 'block'=> 0, 'draft'=> 0, 'verify'=> 1, 'reject'=> 0])->count();
        $blocked_properties=Property::where(['partner_id'=> $request->partner_id, 'block'=> 1, 'draft'=> 0, 'verify'=> 1, 'reject'=> 0])->count();
        $featured_properties=Property::where(['partner_id'=> $request->partner_id, 'featured'=> 1, 'draft'=> 0, 'verify'=> 1, 'reject'=> 0])->count();

        $data = ['property'=>$property , 'total'=>$total, 'properties'=> $properties, 'available_properties'=>$available_properties, 'blocked_properties'=>$blocked_properties, 'featured_properties'=> $featured_properties];
        return json_encode($data);
    }

    public function addToFeatured(Request $request){
        if($request->id!='' && $request->id!=null){

            $query=Property::where('id', $request->id)->update(['featured'=> 1]);
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

    public function removeFromFeatured(Request $request){
        if($request->id!='' && $request->id!=null){

            $query=Property::where('id', $request->id)->update(['featured'=> 0]);
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

    public function blockProperty(Request $request){
            if($request->id!='' && $request->id!=null){

                $query=Property::where('id', $request->id)->update(['block'=> 1]);
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

    public function unblockProperty(Request $request){
        if($request->id!='' && $request->id!=null){

            $query=Property::where('id', $request->id)->update(['block'=> 0]);
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

    public function updateProperty($id){
        $countries=Country::all();
        $villas = DB::table('villas')->get() ;
        $property_types = DB::table('property_types')->get() ;
        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto', 'PropertyPhotoOrder')->where('id', $id)->first()->toArray();
        return view('admin.updateProperty', compact('property', 'countries' , 'villas' , 'property_types'));
    }

    public function submitUpdatedProperty(EditPropertyRequest $request){
        //dd($request->all());

        $property=Property::where('id', $request->property_id)->first() ;
        $property->name=$request->name;
        $property->country_id=$request->country_id;
        $property->villa_id=$request->Villa_category;
        $property->city=$request->city;
        $property->province=$request->province_name;
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

    public function viewPropertyDetails($id){

        $id = substr($id, strrpos($id, '-') + 1) ;

        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto', 'PropertyPhotoOrder', 'Country')->where('id', $id)->first()->toArray();

        $property_type_name = \DB::table('property_types')->where('id' , $property['property_type_id'])->select('name')->get() ;

        $property_type_name = $property_type_name[0]->name ;

        return view('admin.viewPropertyDetails', compact('property', 'id' , 'property_type_name'));
    }

    public function submitAdminUnavailabilityDates(Request $request){
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

    public function getAdminCalenderUnavailableDates(Request $request){
        $unavailableDates=UnavailableDate::where('property_id', $request->id)->get();
        return json_encode($unavailableDates);
    }

    public function getAdminUnavailableDates(Request $request){
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

    public function deleteAdminUnavailabilityDate(Request $request){
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

    public function propertyList(){

        $property_type_name = \DB::table('property_types')->get() ;

        return view('admin.propertyList' , compact( 'property_type_name' ) );
    }

    public function rejectPropertyList() {
        $property_type_name = \DB::table('property_types')->get() ;
        return view('admin.rejectedPropertyList' , compact('property_type_name'));
    }

    public function pendingPropertyList() {
        $property_type_name = \DB::table('property_types')->get() ;
        return view('admin.pending_properties' , compact('property_type_name'));
    }


    public function approveProperties( Request $request ) {

        if($request->id!='' && $request->id!=null){

            $query=Property::where('id', $request->id)->update(['verify'=> 1, 'reject'=> 0]);   //reject is updated in case of re-accept
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

    public function rejectProperties( Request $request ) {

        if($request->id!='' && $request->id!=null){

            $query=Property::where('id', $request->id)->update(['reject'=> 1]);
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

    public function deletePropertyByAdmin( Request $request ) {
        if($request->id!='' && $request->id!=null){

            $property=Property::where('id', $request->id)->first();
            if($property){
                $partner_id=$property->partner_id;
                $partner=Partner::find($partner_id);

                $MAIL_USERNAME=env('MAIL_USERNAME');
                $MAIL_FROM_NAME=env('MAIL_FROM_NAME');

                $data = array('subject' => 'Property Deleted | WETO',
                    'email' => $MAIL_USERNAME, 'Appname' => $MAIL_FROM_NAME, 'reason' => $request->reason,
                    'to_name' => $partner->name, 'to_email' => $partner->email, 'property_name'=> $property->name);

                Mail::send('emails.deletePropertyMail', $data, function($message) use ($data) {
                    $message->to($data['to_email'], $data['to_name'])
                        ->subject($data['subject'])
                        ->from($data['email'], $data['Appname']);
                });

                Property::where('id', $request->id)->delete();

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

    public function getPropertyListForAdmin(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 20;
        }

        $where=' draft=0 AND verify=1 AND reject=0 ';
        if (!is_null($request->city)){
            $where.=" AND city like '%$request->city%' ";
        }
        if (!is_null($request->people)){
            $where.=" AND capacity=$request->people ";
        }
        if (!is_null($request->rooms)){
            $where.=" AND bedroom=$request->rooms ";
        }
        if (!is_null($request->type)){
            $where.=" AND property_type_id=$request->type ";
        }
        if (!is_null($request->block)){
            $where.=" AND block=$request->block ";
        }

        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto')->whereRaw($where)->offset($offset)->limit(20)->get();
        $total=Property::with('PropertyAttribute', 'PropertyMainPhoto')->whereRaw($where)->count();

        $data = ['property'=>$property , 'total'=>$total];
        return json_encode($data);
    }


    public function getPendingPropertyListForAdmin(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 20;
        }

        $where=' draft=0 AND verify=0 AND reject=0 ';
        if (!is_null($request->city)){
            $where.=" AND city like '%$request->city%' ";
        }
        if (!is_null($request->people)){
            $where.=" AND capacity=$request->people ";
        }
        if (!is_null($request->rooms)){
            $where.=" AND bedroom=$request->rooms ";
        }
        if (!is_null($request->type)){
            $where.=" AND property_type_id=$request->type ";
        }

        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto')->whereRaw($where)->offset($offset)->limit(20)->get();
        $total=Property::with('PropertyAttribute', 'PropertyMainPhoto')->whereRaw($where)->count();

        $data = ['property'=>$property , 'total'=>$total];
        return json_encode($data);
    }


    public function rejectedPropertyList(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 20;
        }

        $where=' draft=0 AND verify=0 AND reject=1 ';
        if (!is_null($request->city)){
            $where.=" AND city like '%$request->city%' ";
        }
        if (!is_null($request->people)){
            $where.=" AND capacity=$request->people ";
        }
        if (!is_null($request->rooms)){
            $where.=" AND bedroom=$request->rooms ";
        }
        if (!is_null($request->type)){
            $where.=" AND property_type_id=$request->type ";
        }

        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto')->whereRaw($where)->offset($offset)->limit(20)->get();
        $total=Property::with('PropertyAttribute', 'PropertyMainPhoto')->whereRaw($where)->count();

        $data = ['property'=>$property , 'total'=>$total];
        return json_encode($data);
    }


    public function adminSettings(){
        return view('admin.adminSettings');
    }

    public function submitAdminSettings(Request $request){
        $request->validate([
            'password' =>'required',
            'new_password' =>'required|min:8',
            'new_password_conformation' =>'required',
        ]);

        $id=session('admin')['id'];
        $admin=Admin::where('id', $id)->first();

        if (Hash::check($request->password,  $admin->password)){
            $query=Admin::where('id', $id)->update(['password'=> Hash::make($request->new_password)]);
            if ($query){
                return back()->with('message', 'Password updated successfully.');
            }
            else{
                return back()->with('error', 'Something went wrong.');
            }
        }
        else{
            return back()->with('error', 'Current Password is incorrect.');
        }
    }

    public function countries(){
        return view('admin.countries');
    }

    public function addCountry(Request $request){
        $request->validate([
            'country_name' =>'required|unique:countries,country',
        ],
        [
            'country_name.required' => 'Country name is required.',
            'country_name.unique' => 'Country name already exists.',
        ]);

        $country=new Country();
        $country->country=$request->country_name;
        $query=$country->save();

        if ($query){
            return back()->with('message', 'Country added successfully.');
        }
        else{
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function getCountriesList(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 10;
        }

        $countries=Country::offset($offset)->limit(10)->orderBy('country','asc')->get();
        $total=Country::count();

        $data = ['countries'=>$countries , 'total'=>$total];
        return json_encode($data);
    }

    public function deleteCountry(Request $request){
        $id=$request->id;
        if ($id!=null && $id!=''){
            $check=Property::where('country_id', $id)->first();
            if ($check){
                return json_encode('exists');
            }
            else{
                $query=Country::where('id', $id)->delete();
                if ($query){
                    return json_encode('success');
                }
                else{
                    return json_encode('error');
                }
            }
        }
        else{
            return json_encode('error');
        }
    }

    public function editCountry(Request $request){
        $id=$request->id;
        $country=$request->country;
        if ($id!=null && $id!=''){
            $check=Country::where('country', $country)->first();
            if ($check){
                return json_encode('exists');
            }
            else{
                $query=Country::where('id', $id)->update(['country'=> $country]);
                if ($query){
                    return json_encode('success');
                }
                else{
                    return json_encode('error');
                }
            }
        }
        else{
            return json_encode('error');
        }
    }


    public function siteContent() {

        $data = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;

        $data = $data->toArray() ;

        return view('admin.site_content')->with( 'data' , $data ) ;
    }

    public function siteContentPost( Request $request ) {

         $request->validate([
            'banner_txt' =>'required',
            'facebook_url' =>'required' ,
            'insta_url' =>'required' ,
            'tweeter_url' =>'required' ,
            'tweeter_url' =>'required' ,
            'linkedin_url' =>'required' ,

            'footer_title' =>'required' ,
            'footer_txt' =>'required' ,
            'footer_logo_txt' =>'required' ,
            'footer_Credits' =>'required'
            
        ]);



        $banner = "" ;
        $logo = "" ;

        $headerBannerContent = HeaderBannerContent::find( $request->banner_id ) ;

        $siteContent = SiteContent::find( $request->site_id ) ;

        DB::beginTransaction();

        try {

            if( $request->banner_img != null )
            {

                $rand = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
                $banner = time() . $rand . '.' . $request->banner_img->extension();

                $request->banner_img->move(public_path('propertyUploads'), $banner);

            }

            if( $request->logo != null )
            {

                $rand = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
                $logo = time() . $rand . '.' . $request->logo->extension();

                $request->logo->move(public_path('propertyUploads'), $logo);

            }

            if( $request->favicon_img != null )
            {

                $rand = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
                $favicon_img = time() . $rand . '.' . $request->favicon_img->extension();

                $request->favicon_img->move(public_path('propertyUploads'), $favicon_img);

            }

            if( $request->footer_logo_img != null )
            {

                $rand = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
                $footer_logo_img = time() . $rand . '.' . $request->footer_logo_img->extension();

                $request->footer_logo_img->move(public_path('propertyUploads'), $footer_logo_img);

            }

            $headerBannerContent->site_content_id  = $request->site_id ;
            $headerBannerContent->text  = $request->banner_txt ;

            ( $request->banner_img != null ) ? $headerBannerContent->image  = $banner :

            $siteContent->fb_link = $request->facebook_url ;
            $siteContent->insta_link = $request->insta_url ;
            $siteContent->tweeter_link = $request->tweeter_url ;
            $siteContent->linkin_link = $request->linkedin_url ;
            $siteContent->footer_title = $request->footer_title ;

            ( $request->favicon_img != null ) ? $siteContent->favicon = $favicon_img :

            $siteContent->footer_text = $request->footer_txt ;

            ( $request->logo != null ) ? $siteContent->header_logo = $logo :

            $siteContent->footer_logo_text = $request->footer_logo_txt ;

            ( $request->footer_logo_img != null ) ? $siteContent->footer_logo = $footer_logo_img :

            $siteContent->footer_Credits  = $request->footer_Credits  ;


            $headerBannerContent->save() ;

            $siteContent->save() ;

            DB::commit();
            // all good
        } catch (\Exception $e) {

            dd( $e->getMessage() ) ;
            DB::rollback();
            // something went wrong
        }

        return redirect()->back()->with('success' , 'Site content updated successfully') ;

    }


    public function siteSeo() {

        return view('admin.site_seo') ;
    }

    public function pageSeoContent( Request $request )
    {
        $data = SiteSeo::where('site_page_number' , $request->id)->first() ;

        return json_encode( $data ) ;
    }

    public function siteSeoPost( Request $request ) {

         $request->validate([
            'site_page_number' =>'required',
            'page_title' =>'required' ,
            'keywords' =>'required' ,
            'description' =>'required'
            
        ]);

        $siteSeo = SiteSeo::find($request->seo_id) ;

        $siteSeo->page_title = $request->page_title ;
        $siteSeo->keywords = $request->keywords ;
        $siteSeo->description = $request->description ;

        $siteSeo->save() ;

        return redirect()->back()->with('success' , 'SEO Updated Successfully') ;
    }


    //add admin crud
    public function addAdmin() {

        return view('admin.add_admin') ;
    }

    public function createAdmin( Request $request ) {

        $request->validate([
            'admin_name' =>'required',
            'email' =>'required|email|unique:admins',
            'admin_password' =>'required' ,
            'confirm_admin_password' => 'required',

        ],
        [
            'email.unique' => 'Email already exists.',
            'admin_name.required' => 'Name is required.' ,
            'admin_password.required' => 'Password is required.' ,
            'confirm_admin_password.required' => 'confirm password is required.'


        ]);

        $password=Hash::make($request->admin_password);



        Admin::create([

            'name' => $request->admin_name ,
            'email' => $request->email ,
            'password' => $password
        ]) ;

        return redirect()->back()->with('message' , 'Admin added successfully') ;

    }

    public function adminList( Request $request ) {

        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 10;
        }

        $countries=Admin::offset($offset)->limit(10)->get();
        $total=Admin::count();

        $data = ['countries'=>$countries , 'total'=>$total];
        return json_encode($data);
    }

    public function adminEdit( $id ) {

        $admin = Admin::where('id' , $id)->first() ;

        return view('admin.admin_edit' , compact('admin')) ;

    }

    public function updateAdmin( Request $request ) {


        $request->validate([
            'admin_name' =>'required',
            'email' =>'required|email',
        ]);

        $admin = Admin::find( $request->admin_id ) ;

        $admin->name = $request->admin_name ;

        if( Admin::where('email', '=', $request->email)->exists() ) {

            if( $admin->email == $request->email ) {

                $admin->email = $request->email ;
            }else{

                return redirect()->back()->with('error' , 'Email already exist. ') ;
            }
        }



        if( $request->admin_password != null ) {

            if(Hash::check($request->admin_password, $admin->password)){

                $admin->password = $request->new_password ;
            }else{

                return redirect()->back()->with('error' , 'Incorrect old password. ') ;
            }
        }

        $admin->save() ;

        return redirect()->back()->with('message' , 'Updated successfully') ;

    }

    public function adminDelete( $id ) {

        Admin::where('id' , $id)->delete() ;

        return redirect()->back()->with('message' , 'Deleted Successfully') ;
    }

    //villas
    public function villa() {

        return view('admin.villas') ;
    }

    public function villaAdd( Request $request ) {

        $request->validate([
            'villa_name' =>'required|unique:villas,villa',
        ],
            [
                'villa_name.required' => 'Accommodation name is required.',
                'villa_name.unique' => 'Accommodation name already exists.',
            ]);

        $query = DB::table('villas')->insert([
            ['villa' => $request->villa_name]
        ]);


        if ($query){
            return back()->with('message', 'Accommodation added successfully.');
        }
        else{
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function getVillasList( Request $request ) {

        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 10;
        }

        $countries = DB::table('villas')->offset($offset)->limit(10)->get();
        $total=DB::table('villas')->count();

//        $countries=Country::offset($offset)->limit(10)->get();
//        $total=Country::count();

        $data = ['countries'=>$countries , 'total'=>$total];
        return json_encode($data);
    }


    public function editVilla( Request $request ) {

        $id=$request->id;
        $villa=$request->country;

        if ($id!=null && $id!=''){

            $check = DB::table('villas')->where('villa' , $villa)->first() ;
          //  $check=Country::where('country', $country)->first();
            if ($check){
                return json_encode('exists');
            }
            else{

                $query = DB::table('villas')
                    ->where('id', $id)
                    ->update(['villa' => $villa]);
                //$query=Country::where('id', $id)->update(['country'=> $country]);
                if ($query){
                    return json_encode('success');
                }
                else{
                    return json_encode('error');
                }
            }
        }
        else{
            return json_encode('error');
        }
    }


    public function deleteVilla( Request $request ) {

        $id=$request->id;
        if ($id!=null && $id!=''){

            $check = DB::table('properties')->where('villa_id' , $id)->first() ;

           // $check=Property::where('country_id', $id)->first();
            if ($check){
                return json_encode('exists');
            }
            else{
                $query=DB::table('villas')->where('id', $id)->delete();
                if ($query){
                    return json_encode('success');
                }
                else{
                    return json_encode('error');
                }
            }
        }
        else{
            return json_encode('error');
        }
    }

    public function propertyType() {

        return view('admin.property_type') ;
    }

    public function AddPropertyType( Request $request ) {

        $request->validate([
            'property_type_name' =>'required|unique:property_types,name',
        ],
            [
                'property_type_name.required' => 'Accommodation type name is required.',
                'property_type_name.unique' => 'Accommodation type name already exists.',
            ]);

        $query = DB::table('property_types')->insert([
            ['name' => $request->property_type_name]
        ]);


        if ($query){

            return back()->with('message', 'Accommodation type name added successfully.');
        }
        else{
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function getPropertyTypeList( Request $request ) {

        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 10;
        }

        $countries = DB::table('property_types')->offset($offset)->limit(10)->get();
        $total=DB::table('property_types')->count();

//        $countries=Country::offset($offset)->limit(10)->get();
//        $total=Country::count();

        $data = ['countries'=>$countries , 'total'=>$total];
        return json_encode($data);
    }

    public function editPropertyType( Request $request ) {

        $id=$request->id;
        $property_name=$request->property_name;

        if ($id!=null && $id!=''){

            $check = DB::table('property_types')->where('name' , $property_name)->first() ;
            //  $check=Country::where('country', $country)->first();
            if ($check){
                return json_encode('exists');
            }
            else{

                $query = DB::table('property_types')
                    ->where('id', $id)
                    ->update(['name' => $property_name]);
                //$query=Country::where('id', $id)->update(['country'=> $country]);
                if ($query){
                    return json_encode('success');
                }
                else{
                    return json_encode('error');
                }
            }
        }
        else{
            return json_encode('error');
        }
    }

    public function deletePropertyType( Request $request ) {

        $id=$request->id;
        if ($id!=null && $id!=''){

            $check = DB::table('properties')->where('property_type_id' , $id)->first() ;

            // $check=Property::where('country_id', $id)->first();
            if ($check){
                return json_encode('exists');
            }
            else{
                $query=DB::table('property_types')->where('id', $id)->delete();
                if ($query){
                    return json_encode('success');
                }
                else{
                    return json_encode('error');
                }
            }
        }
        else{
            return json_encode('error');
        }
    }

}
