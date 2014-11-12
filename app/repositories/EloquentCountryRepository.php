<?php 

class EloquentCountryRepository implements CountryRepositoryInterface
{
	private $country;

	public function __construct(Country $country)
	{
		$this->country = $country;
	}

	public function all()
	{
		return $this->country->paginate(15);
	}

	public function find($id)
	{
		return $this->country->find($id);
	}

	public function store($input)
	{
        $country = new Country;
        
        $country->save();
	}

	public function update($input)
	{
	    $this->country->update($input);
	}

	public function destroy($id)
	{
		$this->country->find($id)->delete();
	}

}
