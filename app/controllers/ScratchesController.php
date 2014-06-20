<?php

class ScratchesController extends BaseController {

	/**
	 * Scratch Repository
	 *
	 * @var Scratch
	 */
	protected $scratch;

	public function __construct(Scratch $scratch)
	{
		$this->scratch = $scratch;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$scratches = $this->scratch->orderBy('pilote_id')->get();

		return View::make('scratches.index', compact('scratches'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('scratches.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Scratch::$rules);

		if ($validation->passes())
		{
			$this->scratch->create($input);

			return Redirect::route('scratches.index');
		}

		return Redirect::route('scratches.create')
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
		$scratch = $this->scratch->findOrFail($id);

		return View::make('scratches.show', compact('scratch'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$scratch = $this->scratch->find($id);

		if (is_null($scratch))
		{
			return Redirect::route('scratches.index');
		}

		return View::make('scratches.edit', compact('scratch'));
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function copy($id)
	{
		$scratch = $this->scratch->find($id);

		if (is_null($scratch))
		{
			return Redirect::route('scratches.index');
		}

		return View::make('scratches.create', compact('scratch'));
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
		$validation = Validator::make($input, Scratch::$rules);

		if ($validation->passes())
		{
			$scratch = $this->scratch->find($id);
			$scratch->update($input);

			return Redirect::route('scratches.index', $id);
		}

		return Redirect::route('scratches.edit', $id)
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
		$this->scratch->find($id)->delete();

		return Redirect::route('scratches.index');
	}

}
