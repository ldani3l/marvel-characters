<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller{

    public function index(){
        if(auth()->user())
            return view('character.index', [
                'characters' => Character::where('user_id',auth()->user()->id)->paginate()
            ]);
        else
            return view('character.index', [
                'characters' => Character::latest()->paginate()
            ]);
    }

    public function create(){
        //
    }
    public function getCharactersAPI(){
        $str = file_get_contents('https://gateway.marvel.com:443/v1/public/characters?limit=100&ts=1&apikey=fcba37e651fcb37a37b649f17c721170&hash=c55e456be2b2ce97a3d15902e39c2951');
        $json = json_decode($str, true);
        $characters = $json['data']['results'];
        return $characters;
    }
    public function store($idMarvel){
        //dd($idMarvel);
        $characters = $this->getCharactersAPI();
        foreach($characters as $c){
            //$compara = strpos($c['id'], $idMarvel);
            if ($idMarvel == $c['id']){
                $character = new Character();
                $character->idMarvel = $c['id'];
                $character->name = $c['name'];
                $character->resourceURI = $c['urls'][0]['url'];
                $character->user_id = auth()->user()->id;

                //$character->description = $c['description'];
                //$character->urlimg = $c['thumbnail']['path'].".".$c['thumbnail']['extension'];
                $character->save();
                return Redirect('/');
            }
        }
    }

    public function show(Character $character){
        //
    }
    public function lookFor(){
        return view('character.look-for');
    }

    public function find(Request $request){
        $characters = $this->getCharactersAPI();
        $persons = Array();
        foreach($characters as $c){
            $compara = strpos($c['name'], $request->name);
            if ($compara !== false)
                $persons[] = $c;
        }
        #dd($persons);
        return view('character.find',compact('persons'));
    }

    public function edit(Character $character, $mjs = ''){
        return view('character.edit',compact('character','mjs'));
    }

    public function update(Request $request, Character $character){
        $character->idMarvel = $request->idMarvel;
        $character->name = $request->name;
        $character->description = $request->description;
        $character->resourceURI = $request->resourceURI;
        $character->score = $request->score;
        $character->urlimg = $request->urlimg;
        if($character->save())
            $mjs = "El personaje se actualizó correctamente.";
        else
            $mjs = "Error al actualizar el personaje.";
        return $this->edit($character, $mjs);
    }

    public function destroy(Character $character){
        $character->delete();
        return Redirect('/');
    }
}
