@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="{{ url('/') }}/vendor/select2/css/select2.min.css"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">Welcome Trainers</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#">Anon of Server 33</a>
            </p>

            <hr>
            <blockquote class="blockquote">
                <p class="mb-0">I would like to proudly welcome you to this 3D open world Pokemon Universe. Come and experience the new challenges the Pokemon World faces and become the Ultimate Pokemon Master!
                    Don’t miss out on the tons of exclusive rewards only available for a limited time!</p>
                <footer class="blockquote-footer">Professor Oak,
                    <cite title="Source Title">Legend Trainer</cite>
                </footer>
            </blockquote>
            <hr />
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ url('video/video.mp4') }}" loop="true" controls="false"></iframe>
            </div>
            <!-- Preview Image -->

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <div class="card text-white bg-dark  my-4">
                <div class="card-header">Search Pokemon</div>
                <div class="card-body">
                    <form method="post" action="{{ asset('pokemon/search') }}">
                        {{ csrf_field() }}
                        <?php
                        $keyword = \Illuminate\Support\Facades\Session::get('pokemonKeyword');
                        $rarity = \Illuminate\Support\Facades\Session::get('rarityKeyword');
                        $typeTmp = \Illuminate\Support\Facades\Session::get('typeKeyword');
                        ?>
                        <div class="form-group">
                            <label>Pokemon Keyword</label>
                            <input type="text" class="form-control" value="{{ $keyword }}" autocomplete="off" name="name" placeholder="Enter Keyword">
                        </div>
                        <div class="form-group">
                            <label>Rarity</label>
                            <select class="select2 form-control" name="rarity">
                                <option value="">Any</option>
                                <option @if($rarity=='Common') selected @endif>Common</option>
                                <option @if($rarity=='Normal') selected @endif>Normal</option>
                                <option @if($rarity=='Rare') selected @endif>Rare</option>
                                <option @if($rarity=='Epic') selected @endif>Epic</option>
                                <option @if($rarity=='Legendary') selected @endif>Legendary</option>
                                <option @if($rarity=='Mythical') selected @endif>Mythical</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="select2 form-control" name="type">
                                <option value="">Any</option>
                                <?php $type = \App\Type::orderBy('name','asc')->get(); ?>
                                @foreach($type as $row)
                                    <option @if($typeTmp==$row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr />
                        <button class="btn btn-success btn-block" type="submit">Search</button>
                    </form>
                </div>
            </div>

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