<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CookieController extends Controller {

    public function setCookie(Request $request){
        //set cookie forever
        $response = new Response('set-cookie');
        $response->withCookie(cookie()->forever('privacy_policy', 'Set'));
        return $response;

        //set cookies untill browser is closed
//        $response = new Response('set-cookie');
//        $response->withCookie(cookie('privacy_policy', 'Set'));
//        return $response;
    }

    //just to check and debug
    public function getCookie(Request $request){
        $value = $request->cookie('privacy_policy');
        return $value;
    }


}