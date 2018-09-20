@extends('layout.app')

@section('css')
    <style>
        .card-list label {
            margin-bottom: 0px;
            color: #9a9a9a;
            font-weight: bold;
            font-size: 0.8em;
        }
        .card {
            padding: 5px;
        }
        li.list-group-item {
            padding: 3px 7px;
        }

        .pokemon-body label {
            margin-bottom: 0px;
            color: #9a9a9a;
            font-weight: bold;
            font-size: 0.8em;
        }
        .card-pokemon {
            padding: 5px;
        }
        .card-pokemon li.list-group-item {
            padding: 3px 7px;
        }
        .card-pokemon .list-group-item {
            background: none;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-dark my-4 card-pokemon">
                <div class="card-header">Pokemon Info</div>
                <div class="card-body pokemon-body">
                    <center>
                        <img src="{{ url('uploads/'.$info->image) }}" class="img-thumbnail img-responsive" />
                    </center>
                    <?php
                    $types = \App\PokemonType::where('pokemonId',$info->id)->get();
                    $tmp = array();
                    foreach($types as $type){
                        $tmp[] = \App\Type::find($type->typeId)->name;
                    }
                    $types = implode(', ',$tmp);
                    ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label>Name:</label><br />
                            <span class="{{ strtolower($info->rarity) }}">{{ $info->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <label>Type:</label><br />
                            <span class="">{{ $types }}</span>
                        </li>
                        <li class="list-group-item">
                            <label>Rarity:</label><br />
                            <span class="">{{ $info->rarity }}</span>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('map/search/'.$info->id) }}" class="btn btn-sm btn-warning btn-block my-2">
                                Search in Map
                            </a>
                            @if($best)
                            <a href="{{ url('pokemon/info/'.$info->id) }}" class="btn btn-sm btn-success btn-block my-2">
                                Best Opponent
                            </a>
                            @else
                            <a href="{{ url('pokemon/info/worst/'.$info->id) }}" class="btn btn-sm btn-danger btn-block my-2">
                                Worst Opponent
                            </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card text-white bg-dark my-4 card-pokemon">
                <div class="card-header">Evolve</div>
                <div class="card-body pokemon-body">
                    <ul class="list-group list-group-flush">
                        <?php
                            $evolve = \App\Evolve::find($info->evolve);
                        ?>

                        <li class="list-group-item">
                            <a href="{{ url('pokemon/info/'.$evolve->base) }}">
                            <?php
                            $pokemon = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($evolve->base);
                            ?>
                            @if($pokemon->rarity)
                                <img src="{{ url('uploads/'.$pokemon->image) }}" class="img-thumbnail pull-right" width="50" />
                            @endif
                            <label>Base:</label><br />
                            <span class="{{ strtolower($pokemon->rarity) }}">{{ $pokemon->name }}</span>
                            </a>
                        </li>
                        @if($evolve->lvl15)
                        <li class="list-group-item">
                            <a href="{{ url('pokemon/info/'.$evolve->lvl15) }}">
                            <?php
                            $pokemon = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($evolve->lvl15);
                            ?>
                            @if($pokemon->rarity)
                                <img src="{{ url('uploads/'.$pokemon->image) }}" class="img-thumbnail pull-right" width="50" />
                            @endif
                            <label>Level 15:</label><br />
                            <span class="{{ strtolower($pokemon->rarity) }}">{{ $pokemon->name }}</span>
                            </a>
                        </li>
                        @endif
                        @if($evolve->lvl22)
                        <li class="list-group-item">
                            <a href="{{ url('pokemon/info/'.$evolve->lvl22) }}">
                            <?php
                            $pokemon = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($evolve->lvl22);
                            ?>
                            @if($pokemon->rarity)
                                <img src="{{ url('uploads/'.$pokemon->image) }}" class="img-thumbnail pull-right" width="50" />
                            @endif
                            <label>Level 22:</label><br />
                            <span class="{{ strtolower($pokemon->rarity) }}">{{ $pokemon->name }}</span>
                            </a>
                        </li>
                        @endif
                        @if($evolve->mega)
                        <li class="list-group-item">
                            <a href="{{ url('pokemon/info/'.$evolve->mega) }}">
                            <?php
                            $pokemon = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($evolve->mega);
                            ?>
                            @if($pokemon->rarity)
                                <img src="{{ url('uploads/'.$pokemon->image) }}" class="img-thumbnail pull-right" width="50" />
                            @endif
                            <label>Mega Evolve:</label><br />
                            <span class="{{ strtolower($pokemon->rarity) }}">{{ $pokemon->name }}</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="content-right">
                <?php
                    $types = \App\PokemonType::where('pokemonId',$info->id)->get();
                ?>
                @foreach($types as $row)
                <h3>
                    {{ (!$best) ? 'Best':'Worst' }} Opponent for <span class="{{ (!$best) ? 'text-success':'text-danger' }}">{{ \App\Type::find($row->typeId)->name }}</span>
                </h3>
                    <?php
                        if(!$best){
                            $opp = \App\Http\Controllers\PokemonCtrl::getBestOpponent($row->typeId);
                        }else{
                            $opp = \App\Http\Controllers\PokemonCtrl::getWorstOpponent($row->typeId);
                        }
                        ?>
                    <hr />
                    <div class="row">
                        @foreach($opp as $r)
                            <?php $row = \App\Pokemon::find($r->pokemonId); ?>
                            <div class="col-sm-3">
                                <div class="card my-4 background-{{ strtolower($row->rarity) }}">
                                    <a href="{{ url('pokemon/info/'.$row->id) }}">
                                        <img class="card-img-top" src="{{ url('uploads/'.$row->image) }}" alt="{{ $row->name }}">
                                    </a>
                                    <div class="card-body card-list" style="padding: 0px;">
                                        <?php
                                        $types = \App\PokemonType::where('pokemonId',$row->id)->get();
                                        $tmp = array();
                                        foreach($types as $type){
                                            $tmp[] = \App\Type::find($type->typeId)->name;
                                        }
                                        $types = implode(', ',$tmp);
                                        ?>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <label>Name:</label><br />
                                                <span class="{{ strtolower($row->rarity) }}">{{ $row->name }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <label>Type:</label><br />
                                                <span class="">{{ $types }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr />
                @endforeach
            </div>
        </div>
    </div>
@endsection


@section('script')
@endsection