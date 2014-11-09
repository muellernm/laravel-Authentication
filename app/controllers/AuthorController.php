<?php

class AuthorController extends BaseController{
	//public $restful = true;

	public function get_index(){
		return View::make('authors.index')
				->with('authors', Author::all() );
	}
	public function get_view($author_id){
		
		return View::make('authors.view')
				->with('author', Author::find($author_id) );
	}
}