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
            $list = Ritual::Join('users', 'users.id', '=', 'rituals.user_id')->select(
                'rituals.id',
                'rituals.user_id',
                'name',
                'order_number',
                'hash_name',
                'shape',
                'orientation',
                'holes',
                'sizes',
                'frame',
                'background',
                'cross',
                'withText',
                'withoutPhoto',
                'colored',
                'epitaph',
                'last_name',
                'first_name',
                'patronymic',
                'birthday',
                'death',
                'rituals.created_at',
            )->get();
        } else {
            $list = Ritual::where('user_id', $user_id)->Join('users', 'users.id', '=', 'rituals.user_id')->select(
                'rituals.id',
                'name',
                'order_number',
                'hash_name',
                'shape',
                'orientation',
                'holes',
                'sizes',
                'frame',
                'background',
                'cross',
                'withText',
                'withoutPhoto',
                'colored',
                'epitaph',
                'last_name',
                'first_name',
                'patronymic',
                'birthday',
                'death',
                'rituals.created_at',
            )->get();
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
        $user_id = auth()->id();

        if ($user_id == 1) {
            $user_id = Ritual::where('id', $id)->value('user_id');
        }

        $path    = 'public/ritual/'.$user_id;

        $name = Ritual::where('id', $id)->value('hash_name');

        Storage::delete($path . '/origin/' . $name);
        Storage::delete($path . '/thumbnail/' . $name);

        Ritual::where('id', $id)-> delete();

        return response()->json([
            'message' => 'Order deleted'
        ], 201);
    }
}
