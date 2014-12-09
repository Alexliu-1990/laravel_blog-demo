<?php

class BlogController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('guest',['only'=>['getLogin']]);
        $this->beforeFilter('auth',['only'=>['getLogout']]);
    }

	/**
	 * Display a listing of the resource.
	 * GET /blog
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $posts                   = Post::orderBy('id', 'desc')->paginate(5);

        $posts->getFactory()->setViewName('pagination::simple');
        $this->layout->title     = 'Home page';
        $this->layout->main      = View::make('home')->nest('content', 'index', compact('posts'));
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /blog/create
	 *
	 * @return Response
	 */
	public function postSearch()
    {

        $searchTerm = Input::get('text');
        if(Request::ajax()){
            if($searchTerm == '')
                return Response::json(['success'=>false]);
            else
                return Response::json(['success'=>true, 'text'=>$searchTerm]);
        }
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /blog
	 *
	 * @return Response
	 */
	public function getSearch()
	{
        $searchTerm = Input::get('text');
		    $posts      = Post::whereRaw('match(title,content) against(? in boolean mode)', [$searchTerm])->paginate(5);
            $posts->getFactory()->setViewName('pagination::simple');
            $posts->appends(['text' => $searchTerm]);
            $this->layout->with('title', 'Search'.$searchTerm);
            $this->layout->main = View::make('home')
                                ->nest('content', 'index',($posts->isEmpty()?['notFound' => true] : compact('posts')));

	}

	/**
	 * Display the specified resource.
	 * GET /blog/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getLogin()
	{
        $this->layout->title    = 'Log in';
        $this->layout->main     = View::make('login');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /blog/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postLogin()
	{
        if(Request::ajax()){
            $email      = Input::get('email');
            $password   = Input::get('password');
            $errors     = array();

        try
        {
            // Login credentials
            $credentials = array(
                'email'    => $email,
                'password' => $password,
            );

            // Authenticate the user
            $user = Sentry::authenticate($credentials, false);

            if ($user) {
                try {
                    Sentry::login($user, false);
                    return Response::json(['success'=>true, 200]);
                }
                catch (\Exception $e) {
                    return Response::json(['success'=>false, 'errors'=>$e->getMessageBag()->toArray()]);
                }
            }
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            return Response::json(['success'=>false, 'errors'=>'Login field is required.']);
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            return Response::json(['success'=>false, 'errors'=>'Password field is required.']);
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            return Response::json(['success'=>false, 'errors'=>'Wrong password, try again.']);
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::json(['success'=>false, 'errors'=>'User was not found.']);
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            return Response::json(['success'=>false, 'errors'=>'User is not activated.']);
        }

        // The following is only required if the throttling is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            return Response::json(['success'=>false, 'errors'=>'User is suspended.']);
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            return Response::json(['success'=>false, 'errors'=>'User is banned.']);
        }


        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /blog/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getLogout()
	{
		Sentry::logout();
        return Redirect::to('/');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /blog/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
