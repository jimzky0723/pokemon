@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="{{ url('/') }}/vendor/select2/css/select2.min.css"/>
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
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-dark  my-4">
                <div class="card-header">Search Pokemon on Map</div>
                <div class="card-body">
                    <form method="post" action="{{ asset('map/search') }}">
                        {{ csrf_field() }}
                        <?php
                        $keyword = \Illuminate\Support\Facades\Session::get('mapKeyword');
                        $tmpPokemon = 0;
                        $tmpName = '';
                        $rarity = \Illuminate\Support\Facades\Session::get('rarityMapKeyword');
                        if($keyword){
                            $keyword = (object)$keyword;
                            $tmpPokemon = $keyword->pokemon;
                            $tmpName = $keyword->name;
                        }
                        ?>
                        <div class="form-group">
                            <label>Map Keyword</label>
                            <input type="text" class="form-control" value="{{ $tmpName }}" autocomplete="off"  name="map" placeholder="Enter Keyword">
                        </div>
                        <div class="form-group">
                            <label>Pokemon</label>
                            <select class="select2 form-control" name="pokemon">
                                <option value="">Any</option>
                                <?php $pokemon = \App\Pokemon::get(); ?>
                                @foreach($pokemon as $row)
                                    <option @if($tmpPokemon==$row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Rarity</label>
                            <select class="select2 form-control" name="rarity">
                                <option value="">Any</option>
                                <option @if($rarity=='common') selected @endif value="common">Common</option>
                                <option @if($rarity=='normal') selected @endif value="normal">Normal</option>
                                <option @if($rarity=='rare') selected @endif value="rare">Rare</option>
                                <option @if($rarity=='epicOrLegendary') selected @endif value="epicOrLegendary">Epic/Legendary</option>
                            </select>
                        </div>
                        <hr />
                        <button class="btn btn-success btn-block" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="content-right">
                <h3>
                    List of Maps
                    <div class="pull-right">
                        <a href="{{ url('admin/map') }}" class="btn btn-success btn-sm">
                            Add New
                        </a>
                    </div>
                </h3>
                <hr />
                <div class="row">
                    @if(count($data) > 0)
                        <div class="col-sm-12">
                            {{ $data->links("pagination::bootstrap-4") }}
                        </div>
                        @foreach($data as $row)
                            <div class="col-sm-4">
                                <div class="card my-3">
                                    <div class="card-body card-list" style="padding: 0px;">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <label>Map Name:</label><br />
                                                <span class="text-success">{{ $row->name }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <?php $info = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($row->common); ?>
                                                @if($info->rarity)
                                                    <img src="{{ url('uploads/'.$info->image) }}" class="img-thumbnail pull-right" width="50" />
                                                @endif
                                                <label>Common:</label><br />
                                                <span class="{{ strtolower($info->rarity) }}">{{ $info->name }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <?php $info = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($row->normal); ?>
                                                @if($info->rarity)
                                                    <img src="{{ url('uploads/'.$info->image) }}" class="img-thumbnail pull-right" width="50" />
                                                @endif
                                                <label>Normal:</label><br />
                                                <span class="{{ strtolower($info->rarity) }}">{{ $info->name }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <?php $info = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($row->rare); ?>
                                                @if($info->rarity)
                                                    <img src="{{ url('uploads/'.$info->image) }}" class="img-thumbnail pull-right" width="50" />
                                                @endif
                                                <label>Rare:</label><br />
                                                <span class="{{ strtolower($info->rarity) }}">{{ $info->name }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <?php $info = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($row->epicOrLegendary); ?>
                                                @if($info->rarity)
                                                    <img src="{{ url('uploads/'.$info->image) }}" class="img-thumbnail pull-right" width="50" />
                                                @endif
                                                <label>Epic / Legendary:</label><br />
                                                <span class="{{ strtolower($info->rarity) }}">{{ $info->name }}</span>
                                            </li>
                                            <li class="list-group-item text-right" style="padding-top:8px;">
                                                <a href="{{ url('admin/map/update/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="#" data-link="{{ url('admin/map/delete/'.$row->id) }}" class="btn-delete btn btn-sm btn-danger">Delete</a>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-sm-12">
                            {{ $data->links("pagination::bootstrap-4") }}
                        </div>
                    @else
                        <div class="alert alert-danger my-4 col-sm-12" role="alert">
                            <strong>Opps! </strong> No map found!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ url('/') }}/vendor/select2/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection