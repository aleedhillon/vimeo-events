<?php

namespace App\Http\Controllers;

use App\Events\BannerCreated;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255'
        ]);

        $banner = Banner::create($validated);

        broadcast(new BannerCreated($banner))->toOthers();

        return response()->json([
            'banner' => $banner
        ]);
    }
}
