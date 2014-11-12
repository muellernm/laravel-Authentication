<?php 

class CountriesTableSeeder extends DatabaseSeeder 
{

	public function run()
	{
		$faker = $this->getFaker();

		for($i = 1; $i <= 10; $i++) {
			$country = array(
			);
			Country::create($country);
		}
	}

}
