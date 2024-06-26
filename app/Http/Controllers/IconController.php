<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Icon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreIconRequest;
use App\Http\Requests\UpdateIconRequest;

class IconController extends Controller
{

    private $redis_ttl;

    public function __construct()
    {
        $this->redis_ttl = 3600;
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        try {
            $chaveCache = "IconController_index";
            $icons = Cache::remember($chaveCache, $this->redis_ttl, function () {
                return Icon::with('subclasse')
                    ->has('subclasse') // Somente ícones que têm uma atividade relacionada com uma subclass correspondente
                    ->get();
            });

            return response()->json([
                "success" => [
                    "status" => "200",
                    "title" => "OK",
                    "detail" => ["geojson" => $icons],
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => [
                    "status" => "500",
                    "title" => "Internal Server Error",
                    "detail" => $e->getMessage(),
                ]
            ], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIconRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Icon $icon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Icon $icon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIconRequest $request, Icon $icon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Icon $icon)
    {
        //
    }
}
