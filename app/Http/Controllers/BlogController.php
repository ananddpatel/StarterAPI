<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StarterAPI\Transformers\BlogTransformer;
use App\StarterAPI\Transformers\CommentTransformer;
use App\Blog;
use Validator;

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
        $limit = request()->query('limit') ? : 25;
        $blogs = Blog::paginate($limit);

        if (request()->query('page') > $blogs->lastPage()) {
            return $this->respondNotFound('Page not found.');
        };

        return $this->respondWithPagination([
                'data' => $this->blogTransformer->transformCollection($blogs->toArray()['data']),
            ], $blogs);
    }

    /**
     * shows a single blog post
     * @param  int $id blog post id
     * @return json response
     */
    public function show($id)
    {
    	$blog = Blog::find($id)->toArray();
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

    /**
     * simulates storing a new blog post
     * @return mixed return all data used to create a blog post or an error.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->respondBadRequest('title and body fields are required.');
        }

        return $this->respondCreated([
            'data' => [
                'id' => count(Blog::get()) + 1,
                'person_id' => rand(1, count(\App\Person::get())),
                'post' => [
                    'title' => request('title'),
                    'body' => request('body')
                ],
            ]
        ], "Blog created");
    }

}
