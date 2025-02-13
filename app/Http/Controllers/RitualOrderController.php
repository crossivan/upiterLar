<?php

namespace App\Http\Controllers;

use App\Models\Ritual;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\ImageManager;
use Storage;
use Validator;

class RitualOrderController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function ordersList(): JsonResponse
    {
        $user_id = auth()->id();

        if($user_id == 1) {
            $list = Ritual::leftJoin('users', 'rituals.user_id', '=', 'users.id')->get();

//            $list = Ritual::where('user_id', $user_id)->get();
//            $user_name = User::where('id', $user_id)->value('name');
        } else {
            $list = Ritual::where('user_id', $user_id)->leftJoin('users', 'rituals.user_id', '=', 'users.id')->get();
//            $list = Ritual::leftJoin('users', 'rituals.user_id', '=', 'users.id')->where('user_id', $user_id)->get();
//            $list = Ritual::where('user_id', $user_id)->get();
//            $user_name = User::where('id', $user_id)->value('name');
        }

        return response()->json([
            'message' => 'Orders read',
            'order' => $list
        ], 201);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Ritual $ritual
     * @return JsonResponse
     */
    public function deleteOrder($id)
    {
        Ritual::where('id', $id)-> delete();

        return response()->json([
            'message' => 'Order deleted'
        ], 201);
    }
}
