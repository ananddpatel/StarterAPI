<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StarterAPI\Transformers\BlogTransformer;
use App\Blog;

class BlogController extends ApiController
{
    protected $blogTransformer;

    function __construct(BlogTransformer $blogTransformer)
    {
    	$this->blogTransformer = $blogTransformer;
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
    	if (!$blog) {
    		return $this->respondNotFound("Blog post doesn't exist");
    	}
    	return $this->respondOk([
    		'data' => $this->blogTransformer->transform($blog)
    	]);
    }

}
