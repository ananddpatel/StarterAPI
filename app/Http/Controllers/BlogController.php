<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StarterAPI\Transformers\BlogTransformer;
use App\StarterAPI\Transformers\CommentTransformer;
use App\Blog;

class BlogController extends ApiController
{
    protected $blogTransformer;
    protected $commentTransformer;

    function __construct(BlogTransformer $blogTransformer, CommentTransformer $commentTransformer)
    {
        $this->blogTransformer = $blogTransformer;
    	$this->commentTransformer = $commentTransformer;
    }

    /**
     * shows all blog posts
     * @return json response
     */
    public function index()
    {
    	$blogs = Blog::all();
    	return $this->respondOk([
    		'data' => $this->blogTransformer->transformCollection($blogs),
    	]);
    }

    /**
     * shows a single blog post
     * @param  int $id blog post id
     * @return json response
     */
    public function show($id)
    {
    	$blog = Blog::find($id);
    	if (!$blog) {return $this->respondNotFound("Blog post doesn't exist");}
    	return $this->respondOk([
    		'data' => $this->blogTransformer->transform($blog)
    	]);
    }

    /**
     * returns all comments assocaited with a blog post
     * @param  int $id blog id
     * @return mixed
     */
    public function comments($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {return $this->respondNotFound("Blog post doesn't exist");}
        $comments = $blog->comments;
        return $this->respondOk([
            'data' => [
                'blog' => $this->blogTransformer->transform($blog),
                'comments' => $this->commentTransformer->transformCollection($comments)
            ]
        ]);
    }

}
