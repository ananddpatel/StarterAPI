<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StarterAPI\Transformers\PeopleTransformer;
use App\Person;

class PeopleController extends ApiController
{
    /**
     * @var App\StarterAPI\Transformers\PeopleTransformer
     */
    protected $peopleTransformer;

    /**
     * @param PeopleTransformer $peopleTransformer transformer for people data
     */
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
    	return $this->respondOk([
    		'data' => $this->peopleTransformer->transformCollection($people)
    	]);
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
            return $this->respondNotFound("Person doesn't exist");
        }
        return $this->respondOk([
            'data' => $this->peopleTransformer->transform($person)
        ]);
    }
}
