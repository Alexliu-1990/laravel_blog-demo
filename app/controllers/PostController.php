<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /post
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the content.
	 * GET /post/{post}/show
	 *
	 * @return Response
	 */
	public function showPost(Post $post)
	{
        $comments               = $post->comments()->orderBy('id','desc')->get();
        $this->layout->title    = $post->title;
        $this->layout->main     = View::make('home')->nest('content', 'posts.single', compact('post', 'comments'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /post
	 *
	 * @return Response
	 */
	public function postForm(Post $post)
    {
        $comment    = [
                'email'      => Input::get('email'),
                'commenter'  => Input::get('commenter'),
                'comment'    => Input::get('comment'),
        ];

        $rule       = [
                'email'      => 'required|email',
                'commenter'  => 'required',
                'comment'    => 'required',

        ];

        $validator  = Validator::make($comment, $rule);
        if(Request::ajax()) {
            if($validator->passes()){
                $comments           = new Comment;
                $comments->email    = $comment['email'];
                $comments->commenter= $comment['commenter'];
                $comments->comment  = $comment['comment'];
                $post->comments()->save($comments);

                return Response::json(['success' => true, 200]);
            }
            else {
                return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
            }
        }
	}

	/**
	 * Display the specified resource.
	 * GET /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /post/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
