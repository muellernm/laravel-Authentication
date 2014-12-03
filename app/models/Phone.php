<?php 

class Phone extends \Eloquent
{
    protected $table = 'phones';
	protected $fillable = array();

	public function user()
    {
        return $this->belongsTo('User');
    }

}