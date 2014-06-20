<?php

class CatsController extends BaseController {

	/**
	 * Cat Repository
	 *
	 * @var Cat
	 */
	protected $cat;

	public function __construct(Cat $cat)
	{
		$this->cat = $cat;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cats = $this->cat->all();

		return View::make('cats.index', compact('cats'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cats.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Cat::$rules);

		if ($validation->passes())
		{
			$this->cat->create($input);

			return Redirect::route('cats.index');
		}

		return Redirect::route('cats.create')
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
		$cat = $this->cat->findOrFail($id);

		return View::make('cats.show', compact('cat'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cat = $this->cat->find($id);

		if (is_null($cat))
		{
			return Redirect::route('cats.index');
		}

		return View::make('cats.edit', compact('cat'));
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
		$validation = Validator::make($input, Cat::$rules);

		if ($validation->passes())
		{
			$cat = $this->cat->find($id);
			$cat->update($input);

			return Redirect::route('cats.show', $id);
		}

		return Redirect::route('cats.edit', $id)
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
		$this->cat->find($id)->delete();

		return Redirect::route('cats.index');
	}

}
