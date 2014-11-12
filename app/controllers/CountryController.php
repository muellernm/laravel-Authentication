<?php 

class CountryController extends \BaseController
{
	protected $country;

	public function __construct(CountryRepositoryInterface $country)
	{
		$this->country = $country;
	}

	public function index()
	{
    	$countries = $this->country->all();
        $this->layout->content = \View::make('country.index', compact('countries'));
	}

	public function create()
	{
        $this->layout->content = \View::make('country.create');
	}

	public function store()
	{
        $this->country->store(\Input::only());
        return \Redirect::route('country.index');
	}

	public function show($id)
	{
        $country = $this->country->find($id);
        $this->layout->content = \View::make('country.show')->with('country', $country);
	}

	public function edit($id)
	{
        $country = $this->country->find($id);
        $this->layout->content = \View::make('country.edit')->with('country', $country);
	}

	public function update($id)
	{
        $this->country->find($id)->update(\Input::only());
        return \Redirect::route('country.show', $id);
	}

	public function destroy($id)
	{
        $this->country->destroy($id);
        return \Redirect::route('country.index');
	}

}
