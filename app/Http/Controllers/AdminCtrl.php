<?php

namespace App\Http\Controllers;

use App\Evolve;
use App\Map;
use App\Pokemon;
use App\PokemonType;
use App\Suggestion;
use App\Type;
use App\Versus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class AdminCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('isLogin');
    }

    public function pokemon($id=0)
    {
        $info = Pokemon::find($id);
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

        return view('admin.pokemon',[
            'type' => Type::orderBy('name','asc')->get(),
            'data' => $data,
            'info' => Pokemon::find($id)
        ]);
    }

    public function searchPokemon(Request $request)
    {
        if($request->isMethod('post')){
            Session::put('pokemonKeyword',$request->name);
            Session::put('rarityKeyword',$request->rarity);
            Session::put('typeKeyword',$request->type);
        }
        return self::pokemon();
    }

    public function updatePokemon(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'rarity' => $request->rarity,
            'level' => self::rarityInNumber($request->rarity)
        );
        if(Input::hasFile('file')){
            $filename = self::uploadPicture($request);
            $data['image'] = $filename;
        }

        Pokemon::where('id',$request->currentId)
            ->update($data);
        PokemonType::where('pokemonId',$request->currentId)->delete();
        if(count($request->types) > 0)
        {
            $data = array();
            foreach($request->types as $type){
                $data[] = array(
                    'pokemonId' => $request->currentId,
                    'typeId' => $type
                );
            }
            PokemonType::insert($data);
        }

        Session::put('pokemonKeyword',$request->name);
        return redirect()->back()->with('updated',true);
    }

    public function uploadPicture($request)
    {
        $filename = 'default.jpg';

        if(Input::hasFile('file')){
            $image       = $request->file('file');
            $filename    = $request->name.'.jpg';

            $image_resize = Image::make($image->getRealPath());
//            $image_resize->resize(200, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
            $image_resize->fit(200);
            $image_resize->save('uploads/' .$request->name.'.jpg');
        }
        return $filename;
    }

    public function rarityInNumber($rarity)
    {
        switch ($rarity){
            case 'Mythical':
                return 1;
            case 'Legendary':
                return 2;
            case 'Epic':
                return 3;
            case 'Rare':
                return 4;
            case 'Normal':
                return 5;
            case 'Common':
                return 6;
            default:
                return 0;
        }
    }

    public function savePokemon(Request $request)
    {
        $chk = Pokemon::where('name',$request->name)->first();
        if($chk)
            return redirect()->back()->with('duplicate',true);

        $filename = self::uploadPicture($request);

        $tbl = new Pokemon();
        $tbl->name = $request->name;
        $tbl->rarity = $request->rarity;
        $tbl->level = self::rarityInNumber($request->rarity);
        $tbl->image = $filename;
        $tbl->save();

        if(count($request->types) > 0)
        {
            $data = array();
            foreach($request->types as $type){
                $data[] = array(
                    'pokemonId' => $tbl->id,
                    'typeId' => $type
                );
            }
            PokemonType::insert($data);
        }

        Session::put('pokemonRarity',$request->rarity);
        Session::put('pokemonKeyword',$request->name);
        return redirect()->back()->with('added',true);
    }

    public function deletePokemon($id)
    {
        Pokemon::where('id',$id)->delete();
        PokemonType::where('pokemonId',$id)->delete();
        return redirect('admin/pokemon')->with('deleted',true);
    }

    public function pokemonType()
    {
        $data = Type::orderBy('name','asc')->paginate(10);
        return view('admin.pokemonType',[
            'data' => $data
        ]);
    }

    public function savePokemonType(Request $request)
    {
        $chk = Type::where('name',$request->name)->first();
        if($chk)
            return redirect()->back()->with('duplicate',true);

        $tbl = new Type();
        $tbl->name = $request->name;
        $tbl->save();

        return redirect()->back()->with('added',true);
    }

    public function editPokemonType($id)
    {
        $info = Type::find($id);
        $data = Type::orderBy('name','asc')->paginate(10);
        return view('admin.pokemonType',[
            'data' => $data,
            'info' => $info
        ]);
    }

    public function deletePokemonType($id)
    {
        Type::where('id',$id)->delete();
        return redirect('admin/pokemon/type')->with('deleted',true);
    }

    public function map($info = null)
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
        return view('admin.map',[
            'data' => $data,
            'info' => $info,
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

    public function editMap($id)
    {
        $info = Map::find($id);
        return self::map($info);
    }

    public function saveMap(Request $request)
    {
        $tbl = new Map();
        $tbl->name = $request->name;
        $tbl->common = $request->common;
        $tbl->normal = $request->normal;
        $tbl->rare = $request->rare;
        $tbl->epicOrLegendary = $request->epicOrLegendary;
        $tbl->save();

        Session::put('mapKeyword',[
            'name' => $request->name,
            'pokemon' => ''
        ]);
        return redirect()->back()->with('added',true);
    }

    public function updateMap(Request $request)
    {

        Map::where('id',$request->currentId)
            ->update([
            'name' => $request->name,
            'common' => $request->common,
            'normal' => $request->normal,
            'rare' => $request->rare,
            'epicOrLegendary' => $request->epicOrLegendary,
        ]);

        return redirect()->back()->with('updated',true);
    }

    public function deleteMap($id)
    {
        Map::where('id',$id)->delete();
        return redirect('admin/map')->with('deleted',true);
    }

    public function evolve($info = null)
    {
        $data = Evolve::select('evolves.*');
        $pokemon = Session::get('evolvePokemon');
        if($pokemon){
            $data = $data->join('pokemon','pokemon.evolve','=','evolves.id')
                        ->where('pokemon.id',$pokemon);
        }
        $data = $data->orderBy('evolves.id','desc')
            ->paginate(12);

        $pokemon = Pokemon::where('evolve',0);
        if($info){
            $pokemon = $pokemon->orwhere('evolve',$info->id);
        }
        $pokemon = $pokemon->orderBy('name','asc')->get();

        return view('admin.evolve',[
            'data' => $data,
            'info' => $info,
            'pokemon' => $pokemon,
            'all' => Pokemon::orderBy('name','asc')->get(),
        ]);
    }

    public function searchEvolve(Request $request)
    {
        if($request->isMethod('post')){
            Session::put('evolvePokemon',$request->pokemon);
        }
        return self::evolve();
    }

    public function editEvolve($id)
    {
        $info = Evolve::find($id);
        return self::evolve($info);
    }

    public function saveEvolve(Request $request)
    {

        $data = array(
            'base' => $request->base,
            'lvl15' => $request->lvl15,
            'lvl22' => $request->lvl22,
            'mega' => $request->mega
        );
        $id = Evolve::insertGetId($data);
        foreach($data as $key => $value){
            if($data[$key]){
                Pokemon::where('id',$value)
                    ->update([
                        'evolve' => $id
                    ]);
            }
        }

        return redirect()->back()->with('added',true);
    }


    public function updateEvolve(Request $request,$id)
    {
        Pokemon::where('evolve',$id)->update(['evolve' => 0]);
        $data = array(
            'base' => $request->base,
            'lvl15' => $request->lvl15,
            'lvl22' => $request->lvl22,
            'mega' => $request->mega
        );

        Evolve::where('id',$id)
            ->update($data);

        foreach($data as $key => $value){
            if($data[$key]){
                Pokemon::where('id',$value)
                    ->update([
                        'evolve' => $id
                    ]);
            }
        }

        return redirect()->back()->with('updated',true);
    }

    public function deleteEvolve($id)
    {
        Evolve::where('id',$id)->delete();
        Pokemon::where('evolve',$id)->update([
            'evolve' => 0
        ]);
        return redirect('admin/pokemon/evolve')->with('deleted',true);
    }

    public function suggestion()
    {
        return view('admin.suggestion',[
            'data' => Suggestion::orderBy('id','desc')->paginate(20)
        ]);
    }

    public function deleteSuggestion($id)
    {
        Suggestion::where('id',$id)->delete();
        return redirect()->back()->with('deleted',true);
    }


    public function versus()
    {
        $filter = Type::select('*');
        $keyword = Session::get('versusKeyword');
        if($keyword){
            $filter = $filter->where('name',$keyword);
        }
        $filter = $filter->orderBy('name','asc')->get();

        return view('admin.versus',[
            'types' => Type::orderBy('name','asc')->get(),
            'filter' => $filter
        ]);
    }

    public function searchVersus(Request $req)
    {
        Session::put('versusKeyword',$req->type);
        return self::versus();
    }

    static function compareType($attacker,$defender)
    {
        $chk = Versus::where('attacker',$attacker)
                    ->where('defender',$defender)
                    ->orderBy('id','desc')
                    ->first();
        if($chk){
            return $chk->damage;
        }
        return -1;
    }

    public function updateVersus($attacker,$defender,$status)
    {
        $damage = 2;
        if($status=='lose')
        {
            $damage = 0;
        }
        $versus = Versus::updateOrCreate([
            'attacker' => $attacker,
            'defender' => $defender
        ],[
            'damage' => $damage
        ]);

        return redirect()->back()->with('updated',true);
    }
}
