<?php

class PilotesController extends BaseController {

	/**
	 * Pilote Repository
	 *
	 * @var Pilote
	 */
	protected $pilote;

	public function __construct(Pilote $pilote)
	{
		$this->pilote = $pilote;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pilotes = $this->pilote->orderBy('nom')->get();

		return View::make('pilotes.index', compact('pilotes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pilotes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Pilote::$rules);

		if ($validation->passes())
		{
			$this->pilote->create($input);

			return Redirect::route('pilotes.index');
		}

		return Redirect::route('pilotes.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pilote = $this->pilote->findOrFail($id);

		return View::make('pilotes.show', compact('pilote'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pilote = $this->pilote->find($id);

		if (is_null($pilote))
		{
			return Redirect::route('pilotes.index');
		}

		return View::make('pilotes.edit', compact('pilote'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Pilote::$rules);

		if ($validation->passes())
		{
			$pilote = $this->pilote->find($id);
			$pilote->update($input);

			return Redirect::route('pilotes.show', $id);
		}

		return Redirect::route('pilotes.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->pilote->find($id)->delete();

		return Redirect::route('pilotes.index');
	}

}
