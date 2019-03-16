<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use \App\Movies;

class HomeController extends Controller
{
    private $Movies;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->Movies = new Movies;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $movies = $this->Movies->search($request->term, $request->page);
        return Response::json($movies, 200);
    }

    public function genres()
    {
        $genres = $this->Movies->getGenres();
        return Response::json($genres, 200);
    }

    public function movies(Request $request)
    {
        $movies = $this->Movies->getMovies($request->genre, $request->page);
        return Response::json($movies, 200);
    }

    public function details(Request $request)
    {
        $details = $this->Movies->getDetails($request->movie);
        return Response::json($details, 200);
    }


}
