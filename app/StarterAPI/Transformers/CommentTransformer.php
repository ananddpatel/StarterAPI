<?php

namespace App\StarterAPI\Transformers;

/**
* Transforms People data
*/
class CommentTransformer extends Transformer
{
    /**
     * transforms a single comment array
     * @param  array $comment the Comment array
     * @return array
     */
	public function transform($comment)
	{
		return [
			'id' => $comment['id'],
			'blog_id' => $comment['blog_id'],
			'person_id' => $comment['person_id'],
			'body' => $comment['body']
		];
	}
}