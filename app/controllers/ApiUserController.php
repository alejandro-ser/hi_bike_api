<?php

class ApiUserController extends \BaseController {

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function postStore()
  {
    $reglas = array('name' => 'required|min:5|max:50',
                    'username' => 'required|min:5|max:20|unique:users,username',
                    'email' => 'required|min:5|max:50|unique:users,email',
                    'phonenumber' => 'numeric|min:5|unique:users,phonenumber',
                    'address' => 'min:5|max:100',
                    'age' => 'required|numeric',
                    'gender' => 'required|boolean',
                    'latitude' => 'min:5|max:50',
                    'longitude' => 'min:5|max:50',
                    'img_user' => 'min:5|max:100',
                    'bike_type' => 'required|numeric',
                    'id_profile' => 'required|numeric',
                    'password' => 'required|min:6|max:20');

    $validator = Validator::make(Input::all(), $reglas);

    if ($validator->passes()) {
      $user = new User();
      $user->name = Input::get('name');
      $user->username = Input::get('username');
      $user->email = Input::get('email');
      $user->phonenumber = Input::get('phonenumber');
      $user->address = Input::get('address');
      $user->age = Input::get('age');
      $user->gender = Input::get('gender');
      $user->latitude = Input::get('latitude');
      $user->longitude = Input::get('longitude');
      $user->img_user = Input::get('img_user');
      $user->bike_type = Input::get('bike_type');
      $user->id_profile = Input::get('id_profile');
      $user->password = Hash::make(Input::get('password'));
      $user->level = 1;
      $user->active = 1;

      if ($user->save()) {
        return Response::json(array('messages' => 'Se ha registrado: '.$user->name,
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
  public function getShow($id)
  {
    $user = User::find($id);
    if (count($user)) {
      return Response::json(array('user' => $user,
                                'status' => 1));
    }
    return Response::json(array('messages' => 'El usuario no esta registrado',
                                'status' => 0));
  }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postSearching()
	{
    $latitude = Input::get('latitude');
    $longitude = Input::get('longitude');

    $latitude_range = $latitude * 2;

		$users = User::whereBetween('latitude', array($latitude, $latitude_range))->get();

    if (count($users)) {
      return Response::json(array('users' => $users,
                                  'status' => 1));
    }

    return Response::json(array('messages' => 'No se encontraron usuarios',
                                'status' => 0));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postEngagement()
	{
		$reglas = array('location' => 'required|min:5|max:50');

    $validator = Validator::make(Input::all(), $reglas);

    if ($validator->passes()) {
      $engagement = new Engagement();
      $engagement->location = Input::get('location');
      $engagement->active = 1;

      if ($engagement->save()) {
        User::find(Auth::user()->id)->engagements()->attach($engagement->id, array('estate' => 1));
        return Response::json(array('message' => 'Engrane guardado',
                                    'status' => 1));
      }
    }else{
      return Response::json(array('messages' => $validator->messages(),
                                  'status' => 0));
    }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEngagements()
	{
		$engagements = Auth::user()->engagements()->get();

    if (count($engagements)) {
      return Response::json(array('engagements' => $engagements,
                                  'status' => 1));
    }

    return Response::json(array('messages' => 'Todavia no tiene engranes',
                                'status' => 0));
	}

}
