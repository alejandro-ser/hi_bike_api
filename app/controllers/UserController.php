<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all()->sortBy('names');
    return Response::json(array("users" => $users,
                                "status" => 1));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$reglas = array('name' => 'required|min:5|max:50',
                    'last_name' => 'min:5|max:50',
                    'username' => 'required|min:5|max:20|unique:users,cedula',
                    'email' => 'required|min:5|max:50|unique:users,mail',
                    'phone' => 'required|numeric|min:5',
                    'address' => 'required|min:5|max:100',
                    'age' => 'required|numeric',
                    'gender' => 'required|boolean',
                    'latitude' => 'required|min:5|max:50',
                    'longitude' => 'required|min:5|max:50',
                    'bike_type' => 'required|numeric',
                    'id_profile' => 'required|numeric',
                    'password' => 'required|min:6|max:20|confirmed');

    $validator = Validator::make(Input::all(), $reglas);

    if ($validator->passes()) {
      $usuario = new User();
      $usuario->name = Input::get('name');
      $usuario->last_name = Input::get('last_name');
      $usuario->username = Input::get('username');
      $usuario->email = Input::get('email');
      $usuario->phone = Input::get('phone');
      $usuario->address = Input::get('address');
      $usuario->age = Input::get('age');
      $usuario->gender = Input::get('gender');
      $usuario->latitude = Input::get('latitude');
      $usuario->longitude = Input::get('longitude');
      $usuario->bike_type = Input::get('bike_type');
      $usuario->id_profile = Input::get('id_profile');
      $usuario->password = Input::get('password');
      $usuario->level = 1;
      $usuario->active = 1;

      if ($usuario->save()) {
        $usuarios = User::all();
        return Response::json(array('usuarios' => $usuarios,
                                    'message' => 'Se ha registrado: '.$user->name.' '.$user->last_name,
                                    'status' => 1));
      }
    }else{
      Input::flash();
      $bike_types = BikeType::where('active', '=', 1)->lists('name', 'id');
      return Response::json(array('bike_types' => $bike_types,
                                    'messages' => $validator->messages(),
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
