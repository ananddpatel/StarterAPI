<?php

namespace App\StarterAPI\Transformers;

/**
* Transforms People data
*/
class PeopleTransformer extends Transformer
{
    /**
     * transforms a single person array
     * @param  array $person the Person array
     * @return array
     */
	public function transform($person)
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