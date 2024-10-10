<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ForntendSetting;
use App\Http\Resources\API\UserResource;

class ProviderController extends Controller
{
  public function getFeaturedProviderList(Request $request){
        $user_type = 'provider';
        $status = 1;

        $featured_providers_setting = ForntendSetting::where('status',1)->where('type','landing-page-setting')->where('key','section_10')->first();

        $user_list = User::orderBy('id','desc')->where('status',$status)->where('user_type',$user_type);
        
        if(isset($featured_providers_setting)){
            $decoded_value = json_decode($featured_providers_setting->value, true);
            $provider_id = $decoded_value['provider_id'];
            $user_list = $user_list->whereIn('id',$provider_id);
        }
        
        $user_list = $user_list->get();

        $items = UserResource::collection($user_list);

        $response = [
            'data' => $items,
        ];
        
        return comman_custom_response($response);
    }

  public function getProvidersCount(Request $request){
        $user_type = 'provider';
        $status = 1;

        $providersCount = User::where('status',$status)->where('user_type',$user_type)->count();

        $response = [
            'count' => $providersCount,
        ];
        
        return comman_custom_response($response);
    }
  
}