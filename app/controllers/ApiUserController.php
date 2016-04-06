<?php

class ApiUserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		$reglas = array('name' => 'required|min:5|max:50',
                    'last_name' => 'min:5|max:50',
                    'username' => 'required|min:5|max:20|unique:users,username',
                    'email' => 'required|min:5|max:50|unique:users,email',
                    'phonenumber' => 'required|numeric|min:5|unique:users,phonenumber',
                    'address' => 'required|min:5|max:100',
                    'age' => 'required|numeric',
                    'gender' => 'required|boolean',
                    'latitude' => 'required|min:5|max:50',
                    'longitude' => 'required|min:5|max:50',
                    'bike_type' => 'required|numeric',
                    'id_profile' => 'required|numeric',
                    'password' => 'required|min:6|max:20');

    $validator = Validator::make(Input::all(), $reglas);

    if ($validator->passes()) {
      $user = new User();
      $user->name = Input::get('name');
      $user->last_name = Input::get('last_name');
      $user->username = Input::get('username');
      $user->email = Input::get('email');
      $user->phonenumber = Input::get('phonenumber');
      $user->address = Input::get('address');
      $user->age = Input::get('age');
      $user->gender = Input::get('gender');
      $user->latitude = Input::get('latitude');
      $user->longitude = Input::get('longitude');
      $user->bike_type = Input::get('bike_type');
      $user->id_profile = Input::get('id_profile');
      $user->password = Hash::make(Input::get('password'));
      $user->level = 1;
      $user->active = 1;

      if ($user->save()) {
        return Response::json(array('message' => 'Se ha registrado: '.$user->name.' '.$user->last_name,
                                    'status' => 1));
      }
    }else{
      Input::flash();
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
	public function getShow($id)
	{
		$user = User::find($id);
    return Response::json(array("user" => $user,
                                "status" => 1));
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
