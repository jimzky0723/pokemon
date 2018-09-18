@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="{{ url('/') }}/vendor/select2/css/select2.min.css"/>
    <style>
        .disclaimer {
            text-align: justify;
            color: #404040;
            background: #fffec3;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
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
            <div align="center" class="embed-responsive embed-responsive-16by9">
                <video muted autoplay loop class="embed-responsive-item">
                    <source src="{{ url('video/video.mp4') }}" type="video/mp4">
                </video>
            </div>
            <hr />
            <div class="disclaimer">
                <h3>Disclaimer</h3>
                <p>Welcome to Legend Trainer Guide! This is a free site for all trainers for easy hunting of Pokemon.</p>
                <p>The information provided by our website is for general information purposes and guidance only. All information on the site is based on the Legend Trainer Game. However, we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability or completeness of any information on the site.</p>
                <p>Under no circumstance shall we have any liability to you for any loss or damage of any kind incurred as a result of the use of the site. Your use of the site and your reliance on any information on the site is solely at your own risk.</p>

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
                    <a href="http://kdnxen.pokemongj.com/download.php" target="_blank" class="btn btn-block btn-success">
                        Download Game
                    </a>
                    <a href="http://pay.lzcservice.com/lzc/kdnxPayE.html" target="_blank" class="btn btn-block btn-warning">
                        Recharge Link
                    </a>
                    <a href="https://www.facebook.com/Legend-Trainer-195039927987143/" target="_blank" class="btn btn-block btn-info">
                        Fan Page
                    </a>
                </div>
            </div>
            @include('page.donate')
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