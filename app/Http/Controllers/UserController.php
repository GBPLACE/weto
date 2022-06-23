<?php

namespace App\Http\Controllers;

use App\Property;
use App\SiteContent;
use App\User;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addToWishList($property_id){
        $user_id=session('user')['id'];
        $wishList=new WishList();
        $wishList->user_id=$user_id;
        $wishList->property_id=$property_id;
        $wishList->save();

        return back();
    }

    public function removeFromWishList($wish_list_id){
        WishList::where('id', $wish_list_id)->delete();
        return back();
    }

    public function wishList(){
        return view('user.wishList');
    }

    public function getWishList(Request $request){
        $page_num = $request->page_num;
        if ($page_num==1){
            $offset = 0;
        }
        else{
            $offset = ($page_num-1) * 6;
        }

        $user_id=session('user')['id'];
        $wishList=WishList::where('user_id', $user_id)->get();
        $property_id=$wishList->pluck('property_id')->toArray();
        $wishlist_id=$wishList->pluck('id')->toArray();

        $property=Property::with('PropertyAttribute', 'PropertyMainPhoto')->whereIn('id', $property_id)->where('block', 0)->offset($offset)->limit(6)->get();
        $total=Property::with('PropertyAttribute', 'PropertyMainPhoto')->whereIn('id', $property_id)->where('block', 0)->count();
        //dd($property->toArray());
        $data = ['property'=>$property , 'total'=>$total, 'wishlist_id'=> $wishlist_id];
        return json_encode($data);
    }

    public function deleteFromWishList(Request $request){
        if($request->id!='' && $request->id!=null){
            $query=WishList::where('id', $request->id)->delete();
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

    public function userSettings(){
        $user_id=session('user')['id'];
        $user=User::where('id', $user_id)->first();

        $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;

        $homeContent = $homeContent->toArray() ;

        return view('user.userSettings', compact('user' , 'homeContent'));
    }

    public function submitUserSettings(Request $request){
        $request->validate([
            'name' => 'required|min:3|regex:/^[a-zA-Z\s]*$/',
            'password' =>'required',
            'new_password' =>'required|min:8',
            'new_password_conformation' =>'required',
        ]);

        $id=session('user')['id'];
        $user=User::where('id', $id)->first();

        if (Hash::check($request->password,  $user->password)){
            $query=User::where('id', $id)->update(['name'=> $request->name, 'password'=> Hash::make($request->new_password)]);
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
}
