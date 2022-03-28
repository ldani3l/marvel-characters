<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller{

    public function index(){
        $characters = Character::latest()->paginate();
        return $characters;
    }

    public function getCharactersAPI(){
        $str = file_get_contents('https://gateway.marvel.com:443/v1/public/characters?limit=100&ts=1&apikey=fcba37e651fcb37a37b649f17c721170&hash=c55e456be2b2ce97a3d15902e39c2951');
        $json = json_decode($str, true);
        $characters = $json['data']['results'];
        return $characters;
    }

    public function store(Request $request){
        $characters = $this->getCharactersAPI();
        foreach($characters as $c){
            if ($request->idMarvel == $c['id']){
                $character = new Character();
                $character->idMarvel = $c['id'];
                $character->name = $c['name'];
                $character->resourceURI = $c['urls'][0]['url'];
                $character->user_id = auth()->user()->id;
                if($character->save())
                    return response()->json([
                        'mesagge' => 'Success'
                    ]);
                }
        }
    }

    public function buscar(Request $request){
        $characters = $this->getCharactersAPI();
        $persons = Array();
        foreach($characters as $c){
            $compara = strpos($c['name'], $request->name);
            if ($compara !== false)
                $persons[] = $c;
        }
        return response()->json([
            'persons' => $persons
        ]);
    }


    public function show(Character $character){
        return $character;
    }

    public function update(Request $request, Character $character){
        $character->idMarvel = $request->idMarvel;
        $character->name = $request->name;
        $character->description = $request->description;
        $character->resourceURI = $request->resourceURI;
        $character->score = $request->score;
        $character->urlimg = $request->urlimg;
        if($character->save())
            return response()->json([
                'mesagge' => 'Success'
            ]);
    }

    public function destroy(Character $character){
        if($character->delete())
            return response()->json([
                'mesagge' => 'Success'
            ],204);
    }
}
