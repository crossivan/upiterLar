<?php

namespace App\Http\Controllers;

use App\Models\UploadPhoto;
use File;
use http\Client\Response;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use Str;
use Validator;

class UploadPhotoController extends Controller
{

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $clientIP  = $request->ip();
        $macAddr   = substr(exec('getmac'), 0, 17);

        $file      = $request->file('photo');
        $path      = 'public/photos/'.$macAddr;
        $size      = $file->getSize();
        $hash_name = $file->hashName();
        $orig_name = $file->getClientOriginalName();

//        $file->storeAs('public/avatars', $orig_name);
        $file->store($path.'/origin');
        $thumbnail = Image::make(Storage::path($path).'/origin/'.$hash_name);
        $thumbnail->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg',70);
        Storage::makeDirectory($path.'/thumbnail');
        $thumbnail->save(Storage::path($path).'/thumbnail/'.$hash_name);

        $db = UploadPhoto::create(
            [
                'name_original' => $orig_name,
                'name_hash' => $hash_name,
                'file_size' => $size
            ]
        );

        return response()->json([
            'message' => 'File upload',
            'hash_name' => $hash_name,
            'path' => '/storage/photos/'.$macAddr.'/thumbnail/'.$hash_name
        ], 201);
    }


    public function replace(Request $request)
    {
        $nameOld      = $request->nameOld;
        $cropParams   = json_decode($request->cropParams, true);
        $macAddr      = substr(exec('getmac'), 0, 17);
        $path         = 'public/photos/'.$macAddr;

        $flipH        = $request->flipH;
        $flipV        = $request->flipV;
        $angle        = $request->angle;
        $canvasWidth  = $request->canvasWidth;
        $canvasHeight = $request->canvasHeight;
        $x            = $cropParams['x'];
        $y            = $cropParams['y'];
        $width        = $cropParams['width'];
        $height       = $cropParams['height'];

//        dd($request->cropParams);

        $nameNew = rand(0,99).$nameOld;

        $thumbnail = Image::make(Storage::path($path).'/origin/'.$nameOld);
        Storage::delete($path . '/origin/' . $nameOld);
        $thumbnail->save(Storage::path($path).'/origin/'.$nameNew);

        $thumbnail
            ->resizeCanvas($canvasWidth, $canvasHeight, 'center', false, '#ffffff')
            ->rotate(-$angle, '#ffffff');

        if ($flipV == 'true') $thumbnail->flip('v');
        if ($flipH == 'true') $thumbnail->flip('h');

        $dx = round(($thumbnail->width() - $canvasWidth)/2);
        $dy = round(($thumbnail->height() - $canvasHeight)/2);

        $thumbnail
            ->crop($width, $height, $x+$dx, $y+$dy)
            ->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg',70);

        Storage::makeDirectory($path.'/thumbnail');
        Storage::delete($path . '/thumbnail/' . $nameOld);
        $thumbnail->save(Storage::path($path).'/thumbnail/'.$nameNew);

        $db = UploadPhoto::where('name_hash', $nameOld)-> update(
            [
                'name_hash' => $nameNew
            ]
        );

        return response()->json([
            'message' => 'File replace',
            'hash_name' => $nameNew,
            'path' => '/storage/photos/'.$macAddr.'/thumbnail/'.$nameNew
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UploadPhoto  $uploadPhoto
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $name)
    {
        $macAddr = substr(exec('getmac'), 0, 17);
        $path    = 'public/photos/'.$macAddr;


//        $photo = Image::make(Storage::path($path).'/origin/'.$name);
        Storage::delete($path . '/origin/' . $name);
        Storage::delete($path . '/thumbnail/' . $name);

        $db = UploadPhoto::where('name_hash', $name)-> delete();

        return response()->json([
            'message' => 'File deleted'
        ], 201);

//        return response()->json([
//            'message' => 'File replace',
//            'hash_name' => $name,
//            'path' => '/storage/photos/'.$macAddr.'/thumbnail/'.$name
//        ], 201);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UploadPhoto  $uploadPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(UploadPhoto $uploadPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UploadPhoto  $uploadPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(UploadPhoto $uploadPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UploadPhoto  $uploadPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadPhoto $uploadPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UploadPhoto  $uploadPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadPhoto $uploadPhoto)
    {
        //
    }
}
