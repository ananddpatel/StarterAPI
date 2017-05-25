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

	public function index()
	{
		$comments = Comment::all();
		// return $comments;
		return $this->respondOk([
			'data' => $this->commentTransformer->transformCollection($comments)
		]);
	}

	public function show($id)
	{
		$comment = Comment::find($id);
		if(!$comment) {
			return $this->respondNotFound("Comment doesn't exist");
		}
		return $this->respondOk([
			'data' => $this->commentTransformer->transform($comment)
		]);
	}
}
