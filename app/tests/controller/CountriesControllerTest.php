<?php 

class CountriesControllerTest extends \TestCase
{
	public function testIndex()
	{
		$this->call('GET', 'country');
        $this->assertResponseOk();
    }

    public function testShow()
    {
        $this->call('GET', 'country/1');
        $this->assertResponseOk();
    }

    public function testCreate()
    {
        $this->call('GET', 'country/create');
        $this->assertResponseOk();
    }

    public function testEdit()
    {
        $this->call('GET', 'country/1/edit');
        $this->assertResponseOk();
    }
}
