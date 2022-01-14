<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Jobs\ProcessGame;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::latest()->paginate(3);
        return view('admin.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|unique:games|min:4|max:255',
                'developer' => 'required|min:4|max:255',
                'set_in' => 'required|min:2|max:4',
                'protagonist' => 'required|min:4|max:255',
                'location' => 'required|min:4|max:255',
                'image' => 'required|mimes:png,jpg,jpeg',
                'description' => 'required|min:4|max:255',
            ],
            [
                'name.required' => 'Please insert a game name',
                'name.max' => 'Name less then 255 chars',
                'name.min' => 'Name longer then 4 chars'
            ],
            [
                'developer.required' => 'Please insert a developer',
                'developer.max' => 'Developer less then 255 chars',
                'developer.min' => 'Developer longer then 4 chars'
            ],
            [
                'set_in.required' => 'Please insert a set in year',
                'set_in.max' => 'Set in less then 255 chars',
                'set_in.min' => 'Set in longer then 4 chars'
            ],
            [
                'protagonist.required' => 'Please insert a protagonist',
                'protagonist.max' => 'Protagonist less then 255 chars',
                'protagonist.min' => 'Protagonist longer then 4 chars'
            ],
            [
                'location.required' => 'Please insert a location',
                'location.max' => 'Location less then 255 chars',
                'location.min' => 'Location longer then 4 chars'
            ],
            [
                'description.required' => 'Please insert a game description',
                'description.max' => 'Game less then 255 chars',
                'description.min' => 'Game longer then 4 chars'
            ]);
    
            $image = $request->file('image');
    
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'images/';
            $final_img = $up_location.$img_name;
            $image->move($up_location,$img_name);
    
            Game::insert([
                'name' => $request->name,
                'developer' => $request->developer,
                'set_in' => $request->set_in,
                'protagonist' => $request->protagonist,
                'location' => $request->location,
                'image' => $final_img,
                'description' => $request->description,
            ]);
    
            return redirect('/')->with('success','Game inserted successfully');
        } catch (\Throwable $err) {
            Log::error($err->getMessage());
            return Response::json([
                'error' => $err->getMessage(),
            ]);
        }
    }
    public function getCsvFile()
    {
        try {
            $games = Game::all()->reverse()->toArray();
            $response = ProcessGame::dispatch($games);
            $headers = array(
                'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
                'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                'Content-Disposition' => 'attachment; filename=games.csv',
                'Expires' => '0',
                'Pragma' => 'public',
            );
            $filename =  public_path("csv_archives/games.csv");

            return Response::download($filename, "games.csv", $headers);
        } catch (\Throwable $err) {
            Log::error($err->getMessage());
            return Response::json([
                'error' => $err->getMessage(),
            ]);
        }
    }
}
