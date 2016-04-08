<?php

class ApiProfileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$profiles = Profile::where('active', '=', 1)->get();
    return Response::json(array("profiles" => $profiles,
                                "status" => 1));
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
      $profile = new Profile();
      $profile->name = Input::get('name');
      $profile->active = 1;

      if ($profile->save()) {
        return Response::json(array('message' => 'Se registro: '.$profile->name,
                                    'status' => 1));
      }
    }else{
      return Response::json(array('messages' => $validator->messages(),
                                  'status' => 0));
    }
	}

}
