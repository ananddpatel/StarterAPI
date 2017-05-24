<?php

namespace App\StarterAPI\Transformers;

/**
* Transforms People data
*/
class BlogTransformer extends Transformer
{    
    /**
     * transforms a single blog array
     * @param  array $blog the Blog array
     * @return array
     */
	public function transform($blog)
	{
		return [
            'blog_id' => $blog['id'],
            'person_id' => $blog['person_id'],
            'post' => [
                'title' => $blog['title'],
                'body' => $blog['body'],
            ],
            'submitted_at' => $blog['created_at']
        ];
	}
}