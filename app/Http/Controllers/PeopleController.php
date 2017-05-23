<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PeopleController extends Controller
{
    public function index()
    {
    	$people = Person::all();
    	return response([
    		'data' => $this->transformCollection($people),
    	], 200);
    }

    public function show($id)
    {
    	$person = Person::find($id);
    	if (!$person) {
    		return response([
    			'error' => ['message' => "Person doesn't exist."]
    		], 404);
    	} 
		return response(['data' => $this->transform($person)], 200);
    }

    private function transformCollection($people)
    {
        return array_map(function($person) {return $this->transform($person);}, $people->toArray());
    }

    private function transform($person)
    {
        return [
                "id" => $person["id"],
                "name" => [
                    "first" => $person["first"],
                    "last" => $person["last"],
                ],
                "username" => $person["username"],
                "email" => $person["email"],
                "address" => [
                    "street_number" => $person["street_number"],
                    "street_name" => $person["street_name"],
                    "state" => $person["state"],
                    "zipcode" => $person["zipcode"]
                ],
                "phone_number" => $person["phone"],
                "occupation" => $person["job"]
        ];
    }

}
