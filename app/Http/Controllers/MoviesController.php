<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Categories;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movies::with('categories')->get();
        return view('pages.movies.movies',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('pages.movies.createMovie',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movies = new Movies();
        $movies->create($request->all());

        return redirect()->route('movies.index')->with('message', 'Pelicula Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $movies = Movies::where('name', 'like', '%'.$request->name.'%')->get();
        return response()->json($movies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movies::findOrFail($id);
        $movie->categories = Categories::all();
        return view('pages.movies.updateMovie',compact('movie'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movies = Movies::findOrFail($id);
        $movies->update($request->all());

        return redirect()->route('movies.index')->with('message', 'Pelicula Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movies = Movies::findOrFail($id);
        $movies->delete();
        return redirect()->route('movies.index')->with('message', 'Pelicula Eliminada');
    }
}
