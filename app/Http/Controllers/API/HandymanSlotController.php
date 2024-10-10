<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HandymanSlotMapping;

class HandymanSlotController extends Controller
{
    public function getHandymanSlot(Request $request){
        $handyman_slots = getHandymanServiceTimeSlotByDate($request->provider_id, $request->handyman_id,$request->date);
        $response = [
            'message' => 'Handyman list get successfully.',
            'handymanSlotList' => $handyman_slots,
            'nextAvailableSlotDate' => count($handyman_slots)>0?'':getHandymanServiceNextAvailableSlotByDate($request->provider_id, $request->handyman_id,$request->date),
        ];
        return comman_custom_response($response);
    }
}