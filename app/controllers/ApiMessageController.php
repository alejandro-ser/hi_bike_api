<?php

class ApiMessageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postStore()
  {
    $reglas = array('message_from' => 'numeric|max:11',
                    'message_to' => 'numeric|max:11',
                    'content' => 'required|min:1|max:255');

    $validator = Validator::make(Input::all(), $reglas);

    if ($validator->passes()) {
      $message = new Message();
      $message->message_from = Input::get('message_from');
      $message->message_to = Input::get('message_to');
      $message->content = Input::get('content');

      if ($message->save()) {
        User::find(Auth::user()->id)->messages()->attach($message->id, array('estate' => 1));
        return Response::json(array('message' => 'Mensaje enviado',
                                    'status' => 1));
      }
    }else{
      return Response::json(array('messages' => $validator->messages(),
                                  'status' => 0));
    }
  }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postMessages()
	{
		$messages = Auth::user()->messages()->get();
    if (count($messages)) {
      return Response::json(array('user' => $messages,
                                'status' => 1));
    }
    return Response::json(array('messages' => 'No tiene mensajes enviados',
                                'status' => 0));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
