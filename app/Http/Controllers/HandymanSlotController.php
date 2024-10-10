<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Models\Setting;
use App\Models\User;
use App\Models\Service;
use Config;
use Hash;
use Validator;
use App\Models\HandymanSlotMapping;
use App\Http\Requests\UserRequest;
use App\Models\NotificationTemplate;
use Auth;

class HandymanSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pageTitle = null;
        $slotsArray = [];
        $activeDay = 'mon';
        $handyman_id = null;
        $page = 'time_slot';

        // $pageTitle = __('messages.slot');
        $auth_user = authSession();
        $user_id = $auth_user->id;
        $settings = AppSetting::first();
        $user_data = User::find($user_id);
        $envSettting = $envSettting_value = [];
        if($auth_user['user_type'] == 'handyman'){
            date_default_timezone_set($admin->time_zone ?? 'UTC');

            $current_time = \Carbon\Carbon::now();
            $time = $current_time->toTimeString();

            $current_day = strtolower(date('D'));

            $handyman_id = $request->id ?? auth()->user()->id;

            $days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

            $slotsArray = ['days' => $days];
            // $activeDay = 'mon';
            $activeSlots = [];

            foreach ($days as $value) {
                $slot = HandymanSlotMapping::where('handyman_id', $handyman_id)
                ->where('days', $value)
                ->orderBy('start_at', 'DESC')
                ->selectRaw("SUBSTRING(start_at, 1, 5) as start_at")
                ->pluck('start_at')
                ->toArray();

                $obj = [
                    "day" => $value,
                    "slot" => $slot,
                ];
                $slotsArray[] = $obj;
                $activeSlots[$value] = $slot;

            }
            $pageTitle = __('messages.slot', ['form' => __('messages.slot')]);
        }
        if (count($envSettting) > 0) {
            $envSettting_value = Setting::whereIn('key', array_keys($envSettting))->get();
        }
        if ($settings == null) {
            $settings = new AppSetting;
        } elseif ($user_data == null) {
            $user_data = new User;
        }

        return view('timeslot.index', compact('user_data', 'page','slotsArray', 'pageTitle', 'activeDay', 'handyman_id', 'activeSlots'))->render();
        // return response()->json($data);
        // return view('timeslot.index', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $slotdata = $request->all();
        $handyman_id = !empty($request->handyman_id) ? $request->handyman_id :\Auth::user()->id;

        $handyman_slot = HandymanSlotMapping::where('handyman_id',$handyman_id)->get();
        if(count($handyman_slot) > 0){
            $handyman_slot->each->delete();
        }
        if(!empty($slotdata['slots'])){
            foreach ($slotdata['slots'] as $key => $value) {
                if(!empty($value['time'])){
                    foreach ($value['time'] as $t => $time) {
                        $slotArray = [
                            'handyman_id' => $handyman_id,
                            'days' => $value['day'],
                            'start_at' => $time,
                            'end_at' => date('H:i',strtotime('+1 hour',strtotime($time)))
                        ];
                        $res = HandymanSlotMapping::create($slotArray);
                        $message = __('messages.update_form',[ 'form' => __('messages.handymanslot') ] );
                        if($res->wasRecentlyCreated){
                            $message = __('messages.save_form',[ 'form' => __('messages.handymanslot') ] );
                        }
                
                    }
                }
                $message = __('messages.update_form',[ 'form' => __('messages.handymanslot') ] );
               
            }
        }
       
        return comman_message_response($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $handymandata = User::where('user_type','handyman')->where('id',$id)->first();
        $auth_user = authSession();

        $pageTitle = null;
        $slotsArray = [];
        $activeSlots = [];
        $activeDay = 'mon';

        $pageTitle = __('messages.slot');

        // if($auth_user['user_type'] == 'handyman'){
            date_default_timezone_set($admin->time_zone ?? 'UTC');

            $current_time = \Carbon\Carbon::now();
            $time = $current_time->toTimeString();

            $current_day = strtolower(date('D'));

            $days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

            $slotsArray = ['days' => $days];
            // $activeDay = 'mon';
            $activeSlots = [];

            foreach ($days as $value) {
                $slot = HandymanSlotMapping::where('handyman_id', $id)
                ->where('days', $value)
                ->orderBy('start_at', 'DESC')
                ->selectRaw("SUBSTRING(start_at, 1, 5) as start_at")
                ->pluck('start_at')
                ->toArray();

                $obj = [
                    "day" => $value,
                    "slot" => $slot,
                ];
                $slotsArray[] = $obj;
                $activeSlots[$value] = $slot;

            }
            $pageTitle = __('messages.slot', ['form' => __('messages.slot')]);
        // }
        return view('timeslot.view', compact('slotsArray', 'pageTitle', 'activeDay', 'activeSlots', 'handymandata'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
