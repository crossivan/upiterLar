<?php

namespace App\Http\Controllers;

use App\Http\Requests\RitualUploadRequest;
use App\Models\Ritual;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

        $file = $request->file('photo');
        $path = 'public/ritual_photos/' . $macAddr;
//        $size         = $file->getSize();
//        $hash_name    = $file->hashName();
//        $orig_name    = $file->getClientOriginalName();

        $hash_name = 'gasvdjjjnsbadjksajk';

//        $file->store($path);

        $user_id = auth()->id();

        $lastOrder = Ritual::where('user_id', $user_id)
            ->latest('id')
            ->first()
            ->order_number;

        $temp = [
            'user_id' => $user_id,
            'order_number' => $lastOrder + 1,
            'hash_name' => $hash_name,
        ];

        $db = Ritual::create($temp + $data);

        return response()->json([
            'message' => 'Data upload',
            'order' => $lastOrder + 1
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        $user_id = auth()->id();

        $list = Ritual::where('user_id', $user_id)->get();

        return response()->json([
            'message' => 'Data read',
            'order' => $list
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

    /**
     * Remove the specified resource from storage.
     *
     * @param Ritual $ritual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ritual $ritual)
    {
        //
    }
}
