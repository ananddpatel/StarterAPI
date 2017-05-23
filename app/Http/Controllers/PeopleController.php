<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StarterAPI\Transformers\PeopleTransformer;
use App\Person;

class PeopleController extends Controller
{

    protected $peopleTransformer;

    function __construct(PeopleTransformer $peopleTransformer)
    {
        $this->peopleTransformer = $peopleTransformer;
    }

    /**
     * shows all People
     * @return array array of all people
     */
    public function index()
    {
    	$people = Person::all();
    	return response([
    		'data' => $this->peopleTransformer->transformCollection($people),
    	], 200);
    }

    /**
     * shows a single person
     * @param  int $id the id of the person
     * @return array     returns the data of a single person with a status code
     */
    public function show($id)
    {
    	$person = Person::find($id);
    	if (!$person) {
    		return response([
    			'error' => ['message' => "Person doesn't exist."]
    		], 404);
    	} 
		return response(['data' => $this->peopleTransformer->transform($person)], 200);
    }
}
