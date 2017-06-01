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
		$comments = Comment::simplePaginate(100)->toArray();
		// return $comments;
		return $this->respondOk([
			'data' => $this->commentTransformer->transformCollection($comments['data']),
			'paginator' => $this->paginator($comments)
		]);
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
