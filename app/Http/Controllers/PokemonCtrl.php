<?php

namespace App\Http\Controllers;

use App\Map;
use App\Pokemon;
use App\PokemonType;
use App\Suggestion;
use App\Type;
use App\Versus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PokemonCtrl extends Controller
{
    //
    public function index()
    {
        $data = Pokemon::select('pokemon.*');
        $keyword = Session::get('pokemonKeyword');
        $rarity = Session::get('rarityKeyword');
        $type = Session::get('typeKeyword');

        if($keyword){
            $data = $data->where('pokemon.name','like',"%$keyword%");
        }
        if($rarity){
            $data = $data->where('rarity',$rarity);
        }
        if($type){
            $data = $data->join('pokemontype','pokemontype.pokemonId','=','pokemon.id')
                ->where('pokemontype.typeId',$type);
        }

        $data = $data->orderBy('pokemon.level','asc')
            ->orderBy('pokemon.name','asc')
            ->paginate(12);

        return view('page.pokemon',[
            'type' => Type::orderBy('name','asc')->get(),
            'data' => $data
        ]);
    }

    public function searchPokemon(Request $request)
    {
        if($request->isMethod('post')){
            Session::put('pokemonKeyword',$request->name);
            Session::put('rarityKeyword',$request->rarity);
            Session::put('typeKeyword',$request->type);
        }
        return self::index();
    }

    public function map()
    {
        $session = Session::get('mapKeyword');
        $rarity = Session::get('rarityMapKeyword');
        $data = Map::select('*');
        if($session)
        {
            $session = (object)$session;
            if($session->name)
            {
                $data = $data->where('name','like',"%$session->name%");
            }
            if($session->pokemon)
            {
                $data = $data->where(function($q) use ($session) {
                    $q->where('common',$session->pokemon)
                        ->orwhere('normal',$session->pokemon)
                        ->orwhere('rare',$session->pokemon)
                        ->orwhere('epicOrLegendary',$session->pokemon);
                });
            }
        }
        if($rarity)
        {
            $data = $data->where($rarity,'>',0);
        }
        $data = $data->orderBy('name','asc')
            ->paginate(12);
        return view('page.map',[
            'data' => $data,
            'map' => Map::select('name')->orderBy('name','asc')->groupBy('name')->get(),
            'common' => Pokemon::where('rarity','Common')->orderBy('name','asc')->get(),
            'normal' => Pokemon::where('rarity','Normal')->orderBy('name','asc')->get(),
            'rare' => Pokemon::where('rarity','Rare')->orderBy('name','asc')->get(),
            'legendary' => Pokemon::where('rarity','Legendary')
                ->orwhere('rarity','Epic')
                ->orderBy('name','asc')
                ->get(),
        ]);
    }

    public function searchMap(Request $request)
    {
        if($request->isMethod('post')){
            $data = array(
                'name' => $request->map,
                'pokemon' => $request->pokemon
            );
            Session::put('rarityMapKeyword',$request->rarity);
            Session::put('mapKeyword',$data);
        }
        return self::map();
    }

    public function searchMapById($id)
    {
        Session::put('mapKeyword',[
            'name' => '',
            'pokemon' => $id
        ]);
        return redirect('map/search');
    }

    static function getPokemonInfo($id)
    {
        $info = Pokemon::find($id);
        if($info){
            return $info;
        }else{
            $info = array(
                'rarity' => '',
                'name' => '&nbsp;',
                'image' => ''
            );
            return (object)$info;
        }
    }



    public function suggestion()
    {
        return view('page.suggestion');
    }

    public function sendSuggestion(Request $request)
    {
        $q = new Suggestion();
        $q->ipAddress = $request->ip();
        $q->name = $request->name;
        $q->server = $request->serverName;
        $q->message = $request->message;
        $q->status = 0;
        $q->save();

        return redirect()->back()->with('sent',true);
    }

    public function pokemonInfo($id, $best = false)
    {
        $info = Pokemon::find($id);
        if(!$info)
            return redirect('/pokemon');

        return view('page.info',[
            'info' => $info,
            'best' => $best
        ]);
    }

    public function pokemonInfoWorst($id)
    {
        return self::pokemonInfo($id,true);
    }

    static function getBestOpponent($typeId)
    {
        $opp = Versus::where('attacker',$typeId)
            ->where('damage',2)
            ->get();

        $pokemon = DB::table('pokemontype')
            ->select('pokemontype.pokemonId')
            ->join('pokemon','pokemon.id','=','pokemontype.pokemonId');
        foreach($opp as $row){
            $pokemon = $pokemon->orwhere('typeId',$row->defender);
        }
        return $pokemon->orderBy('pokemon.level','asc')
            ->groupBy('pokemontype.pokemonId')
            ->get();
    }

    static function getWorstOpponent($typeId)
    {
        $opp = Versus::where('attacker',$typeId)
            ->where('damage',0)
            ->get();

        $pokemon = DB::table('pokemontype')
            ->select('pokemontype.pokemonId')
            ->join('pokemon','pokemon.id','=','pokemontype.pokemonId');
        foreach($opp as $row){
            $pokemon = $pokemon->orwhere('typeId',$row->defender);
        }
        return $pokemon->orderBy('pokemon.level','asc')
            ->groupBy('pokemontype.pokemonId')
            ->get();
    }
}
