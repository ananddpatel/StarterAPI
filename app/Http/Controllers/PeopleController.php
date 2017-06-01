<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StarterAPI\Transformers\PeopleTransformer;
use App\StarterAPI\Transformers\BlogTransformer;
use App\StarterAPI\Transformers\CommentTransformer;
use App\Person;

class PeopleController extends ApiController
{
    /**
     * @var App\StarterAPI\Transformers\PeopleTransformer $peopleTransformer
     * @var App\StarterAPI\Transformers\BlogTransformer $blogTransformer
     * @var App\StarterAPI\Transformers\CommentTransformer $commentTransformer
     */
    protected $peopleTransformer;
    protected $blogTransformer;
    protected $commentTransformer;

    /**
     * @param PeopleTransformer $peopleTransformer transformer for people data
     */
    function __construct(PeopleTransformer $peopleTransformer,
                         BlogTransformer $blogTransformer,
                         CommentTransformer $commentTransformer)
    {
        $this->peopleTransformer = $peopleTransformer;
        $this->blogTransformer = $blogTransformer;
        $this->commentTransformer = $commentTransformer;
    }

    /**
     * shows all People
     * @return array array of all people
     */
    public function index()
    {
        $people = Person::simplePaginate(10)->toArray();

    	return $this->respondOk([
    		'data' => $this->peopleTransformer->transformCollection($people['data']),
            'paginator' => $this->paginator($people)
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
        if (!$person) {return $this->respondNotFound("Person doesn't exist");}
        return $this->respondOk([
            'data' => $this->peopleTransformer->transform($person)
        ]);
    }

    /**
     * returns all posts by a person
     * @param  int $id person id
     * @return mixed
     */
    public function blogs($id)
    {
        $person = Person::find($id);
        if (!$person) {return $this->respondNotFound("Person doesn't exist");}
        $blogs = $person->blogs;
        return $this->respondOk([
            'data' => [
                'person' => $this->peopleTransformer->transform($person),
                'blogs' => $this->blogTransformer->transformCollection($blogs)
            ]
        ]);
    }
    
    /**
     * returns all comments by a single person
     * @param  int $id person id
     * @return mixed
     */
    public function comments($id)
    {
        $person = Person::find($id);
        if (!$person) {return $this->respondNotFound("Person doesn't exist");}
        return $this->respondOk([
            'data' => [
                'person' => $this->peopleTransformer->transform($person),
                'comments' => $this->commentTransformer->transformCollection($person->comments)
            ]    
        ]);
    }
    
}
