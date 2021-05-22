<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    protected $requestValidation = [];

    public function __construct()
    {
        $year = date("Y") + 20;

        $this->requestValidation = [
            'title' => 'required|string|max:100',
            'film_director' => 'required|string|max:50',
            'genres' => 'required|string|max:50',
            'summary' => 'required|string',
            'year' => 'required|numeric|min:2010|max:' . $year
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 顯示所有可以的 Movie 清單。
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        /// === 全等於 就把 cover_image 拿掉
        // if ($data['cover_image'] === NULL) {
        //     unset($data['cover_image']);
        // }
        if (filter_var($data['cover_image'], FILTER_VALIDATE_URL) === FALSE) {
            unset($data['cover_image']);
        }
        $request->validate($this->requestValidation);
        $movieNew = Movie::create($data);
        return redirect()->route('movies.index')->with('message', 'create ' . $movieNew->title . ' success');
    }

    /**
     * Display the specified resource.
     *
     * @param  Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->all();

        if ($data['cover_image'] === NULL) {
            unset($data['cover_image']);
        }

        $request->validate($this->requestValidation);

        $movie->update($data);

        return redirect()->route('movies.show', $movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('message', 'Delete Success');
    }
}
