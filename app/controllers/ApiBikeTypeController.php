<?php

class ApiBikeTypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$bike_types = BikeType::where('active', '=', 1)->get();
  	return Response::json(array("bike_types" => $bike_types,
      	                        "status" => 1));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{
		$reglas = array('name' => 'required|min:3|max:50');

    $validator = Validator::make(Input::all(), $reglas);

    if ($validator->passes()) {
      $bike_type = new BikeType();
      $bike_type->name = Input::get('name');
      $bike_type->active = 1;

      if ($bike_type->save()) {
        return Response::json(array('message' => 'Se registro: '.$bike_type->name,
                                    'status' => 1));
      }
    }else{
      return Response::json(array('messages' => $validator->messages(),
                                  'status' => 0));
    }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
