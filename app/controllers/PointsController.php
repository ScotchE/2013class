<?php

class PointsController extends BaseController {

	/**
	 * Point Repository
	 *
	 * @var Point
	 */
	protected $point;

	public function __construct(Point $point)
	{
		$this->point = $point;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$points = $this->point->all();

		return View::make('points.index', compact('points'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('points.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Point::$rules);

		if ($validation->passes())
		{
			$this->point->create($input);

			return Redirect::route('points.index');
		}

		return Redirect::route('points.create')
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
		$point = $this->point->findOrFail($id);

		return View::make('points.show', compact('point'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$point = $this->point->find($id);

		if (is_null($point))
		{
			return Redirect::route('points.index');
		}

		return View::make('points.edit', compact('point'));
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
		$validation = Validator::make($input, Point::$rules);

		if ($validation->passes())
		{
			$point = $this->point->find($id);
			$point->update($input);

			return Redirect::route('points.show', $id);
		}

		return Redirect::route('points.edit', $id)
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
		$this->point->find($id)->delete();

		return Redirect::route('points.index');
	}

}
