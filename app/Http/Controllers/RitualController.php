<?php

namespace App\Http\Controllers;

use App\Http\Requests\RitualUploadRequest;
use App\Models\Ritual;
use App\Models\UploadPhoto;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Encoders\JpegEncoder;
use Intervention\Image\ImageManager;
use Storage;
use Validator;

class RitualController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param RitualUploadRequest $request
     * @return JsonResponse
     */
    public function upload(RitualUploadRequest $request): JsonResponse
    {
        $data = $request->validated();

        if(auth()->user()->role === 'user') return response()->json(['message' => 'You don`t have access']);

        $clientIP = $request->ip();
        $macAddr = substr(exec('getmac'), 0, 17);

        $path = 'public/ritual_photos/' . $macAddr;

        $user_id = auth()->id();

        try {
            $lastOrder = Ritual::where('user_id', $user_id)
                ->latest('id')
                ->first()
                ->order_number;
        }
        catch (\Exception $e) {
            $lastOrder = 0;
        }

        $temp = [
            'user_id' => $user_id,
            'order_number' => $lastOrder + 1,
        ];

        Ritual::create($temp + $data);

        return response()->json([
            'message' => 'Data upload',
            'order' => $lastOrder + 1
        ], 201);
    }

    public function photo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $macAddr   = substr(exec('getmac'), 0, 17);
        $file      = $request->file('photo');
        $path      = 'public/ritual/'.$macAddr;
        $hash_name = $file->hashName();

        $file->store($path.'/origin');

        $manager = ImageManager::gd(
            autoOrientation: false,
            decodeAnimation: false,
            blendingColor: 'ff5500',
            strip: false
        );

        $thumbnail = $manager->read(Storage::path($path).'/origin/'.$hash_name);
        $thumbnail->scale(300,  300);
        $thumbnail->encode(new JpegEncoder(quality: 70));
        Storage::makeDirectory($path.'/thumbnail');
        $thumbnail->save(Storage::path($path).'/thumbnail/'.$hash_name);

//        $db = UploadPhoto::create(
//            [
//                'name_original' => $orig_name,
//                'name_hash'     => $hash_name,
//                'file_size'     => $size
//            ]
//        );

        return response()->json([
            'message' => 'Photo upload',
            'hash_name' => $hash_name,
            'path' => '/storage/ritual/'.$macAddr.'/thumbnail/'.$hash_name
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ritual $ritual
     * @return JsonResponse
     */
    public function deletePhoto($name)
    {
        $macAddr = substr(exec('getmac'), 0, 17);
        $path    = 'public/ritual/'.$macAddr;

//        $photo = Image::make(Storage::path($path).'/origin/'.$name);
        Storage::delete($path . '/origin/' . $name);
        Storage::delete($path . '/thumbnail/' . $name);

//        Ritual::where('name_hash', $name)-> delete();

        return response()->json([
            'message' => 'Photo deleted'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function orders(): JsonResponse
    {
        $user_id = auth()->id();

        $list = Ritual::where('user_id', $user_id)->get();
        $user_name = User::where('id', $user_id)->value('name');

        return response()->json([
            'message' => 'Data read',
            'user_name' => $user_name,
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

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $id
     * @return JsonResponse
     */
    public function view(Request $id): JsonResponse
    {
        $order = Ritual::where('id', $id)->get();

        return response()->json([
            'message' => 'Data read',
            'order' => $order
        ], 201);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Ritual $ritual
     * @return JsonResponse
     */
    public function edit(Ritual $ritual)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Ritual $ritual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ritual $ritual)
    {
        //
    }

}
