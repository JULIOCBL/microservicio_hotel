<?php

namespace App\Http\Controllers;

use App\Schemas\GetHoteImage\GetHotelImageV1RQ;
use App\Schemas\GetHotelAvail\GetHotelAvailV2RQ;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class SearchAvailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use ApiResponser;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $searchAvail = new  GetHotelAvailV2RQ();
       return  $this->successResponse($searchAvail($request));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function getImage(Request $request){

        $rules = [
            'txt_hotel_code' => 'required|max:13',
            'txt_code_context' => 'required|min:5|max:6|in :GLOBAL,SABRE'
        ];

        $messages = [
            'txt_hotel_code.required' => 'Ingresa el codigo del hotel',
            'txt_code_context.required' =>'Categorias diponibles [GLOBAL, SABRE]'
        ];

        $this->validate($request,$rules,$messages);

        $getImage = new GetHotelImageV1RQ();

        return  $this->successResponse($getImage($request));
     }
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
