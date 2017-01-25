<?php

class EmployeesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id = null)
	{
		if ($id == null) {
			return Employee::orderBy('id', 'asc')->get();
		} else {
			return $this->show($id);
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$employee = new Employee;

		$employee->name = Input::get('name');
		$employee->email = Input::get('email');
		$employee->contact_number = Input::get('contact_number');
		$employee->position = Input::get('position');
		$employee->save();

		return 'Employee record successfully created with id ' . $employee->id;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Employee::find($id);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$employee = Employee::find($id);

		$employee->name = Input::get('name');
		$employee->email = Input::get('email');
		$employee->contact_number = Input::get('contact_number');
		$employee->position = Input::get('position');
		$employee->save();

		return "Sucess updating user #" . $employee->id;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$employee = Employee::find($id);

		$employee->delete();

		return "Employee record successfully deleted #" .  $employee->id;
	}


}
