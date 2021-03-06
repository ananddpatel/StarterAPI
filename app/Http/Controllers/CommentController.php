<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StarterAPI\Transformers\CommentTransformer;
use App\Comment;

class CommentController extends ApiController
{
	/**
	 * @var App\StarterAPI\Transformers\CommentTransformer $commentTransformer
	 */
	protected $commentTransformer;

	function __construct(CommentTransformer $commentTransformer)
	{
		$this->commentTransformer = $commentTransformer;
	}

	/**
	 * returns all comments
	 * @return json
	 */
	public function index()
	{
		$limit = request()->query('limit') ? : 100;
		$comments = Comment::paginate($limit);

        if (request()->query('page') > $comments->lastPage()) {
            return $this->respondNotFound('Page not found.');
        };

		return $this->respondWithPagination([
			'data' => $this->commentTransformer->transformCollection($comments->toArray()['data']),
		], $comments);
	}

	/**
	 * returns a single comment
	 * @param  int $id comment id
	 * @return mixed
	 */
	public function show($id)
	{
		$comment = Comment::find($id);
		if(!$comment) {return $this->respondNotFound("Comment doesn't exist");}
		return $this->respondOk([
			'data' => $this->commentTransformer->transform($comment)
		]);
	}
}
