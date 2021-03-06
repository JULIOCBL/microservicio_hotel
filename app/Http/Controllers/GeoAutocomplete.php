<?php

namespace App\Http\Controllers;

use App\Schemas\GeoAutocomplete\GeoAutocompleteV2RQ;
use App\Schemas\GeoSearch\GeoSearchV2RQ;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class GeoAutocomplete extends Controller
{

    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['api' => config('services.links.base_uri')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //


        $geoAutocompleteV2RQ = new GeoAutocompleteV2RQ();
        /*     $response       = new GeoAutocompleteV2RS(); */



        return  $this->successResponse($geoAutocompleteV2RQ($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $rules = [
            'query' => 'required|min:3|max:255',
            'category' => 'required|min:3|max:4|in :CITY,RAIL,AIR',
            'limit' => 'min:1|max:255',
            'clientId' => 'required|min:5|max:40',
        ];

        $messages = [
            'query.required' => 'Ingresa al menos 3 letras',
            'category.required' =>'Categorias diponibles [CITY, RAIL, AIR]',
            'limit.required' => 'Cantidad de resultados a retornar',
            'clientId.required' => 'id del usuario'
        ];

        $this->validate($request,$rules , $messages);
      
        $geoAutocompleteV2RQ = new GeoAutocompleteV2RQ();
        /*     $response       = new GeoAutocompleteV2RS(); */

        return  $this->successResponse($geoAutocompleteV2RQ($request));
    }


    public function getSearch(Request $request){

        $geoSearchV2RQ =   new GeoSearchV2RQ();
        return  $this->successResponse($geoSearchV2RQ($request));
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
