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
            <!-- Categories Widget -->
            @if(session('added'))
                <div class="alert alert-success my-4" role="alert">
                    1 Pokemon Added!
                </div>
            @endif

            @if(session('updated'))
                <div class="alert alert-success my-4" role="alert">
                    Pokemon successfully updated!
                </div>
            @endif

            @if(session('deleted'))
                <div class="alert alert-info my-4" role="alert">
                    Successfully Deleted!
                </div>
            @endif

            @if(session('duplicate'))
                <div class="alert alert-danger my-4" role="alert">
                    <strong>Error!</strong> Duplicate pokemon name.
                </div>
            @endif

            <div class="card text-white bg-dark  my-4">
                <div class="card-header">Search Pokemon</div>
                <div class="card-body">
                    <form method="post" action="{{ asset('admin/pokemon/search') }}">
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
                @if($info)
                    <div class="card-header">Update Pokemon</div>
                    <div class="card-body">
                        <form method="post" action="{{ asset('admin/pokemon/update') }}" enctype="multipart/form-data">
                            <input type="hidden" name="currentId" value="{{ $info->id }}" />
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Pokemon Name</label>
                                <input type="text" value="{{ $info->name }}" class="form-control" name="name" required placeholder="Name of Pokemon">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="select2 form-control" name="types[]" multiple="multiple" required>
                                    @foreach($type as $row)
                                        <?php
                                            $selected = \App\PokemonType::where('pokemonId',$info->id)
                                                ->where('typeId',$row->id)
                                                ->first();
                                        ?>
                                        <option @if($selected) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Rarity</label>
                                <select class="select2 form-control" name="rarity" required>
                                    <option @if($info->rarity=='Common') selected @endif>Common</option>
                                    <option @if($info->rarity=='Normal') selected @endif>Normal</option>
                                    <option @if($info->rarity=='Rare') selected @endif>Rare</option>
                                    <option @if($info->rarity=='Epic') selected @endif>Epic</option>
                                    <option @if($info->rarity=='Legendary') selected @endif>Legendary</option>
                                    <option @if($info->rarity=='Mythical') selected @endif>Legendary</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Current Picture</label>
                                <img class="img-thumbnail img-responsive" src="{{ url('uploads/'.$info->image) }}">
                            </div>
                            <div class="form-group">
                                <label>Change Picture</label>
                                <input type="file" name="file" accept="image/*">
                            </div>
                            <hr />
                            <button class="btn btn-info btn-block" type="submit">Update</button>
                            <button class="btn btn-danger btn-delete btn-block" data-link="{{ url('admin/pokemon/delete/'.$info->id) }}" type="button">Delete</button>
                        </form>
                    </div>
                @else
                    <div class="card-header">Add Pokemon</div>
                    <div class="card-body">
                        <form method="post" action="{{ asset('admin/pokemon') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Pokemon Name</label>
                                <input type="text" autofocus class="form-control" name="name" required placeholder="Name of Pokemon">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="select2 form-control" name="types[]" multiple="multiple" required>
                                    @foreach($type as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Rarity</label>
                                <select class="select2 form-control" name="rarity" required>
                                    <?php $tmpRarity = \Illuminate\Support\Facades\Session::get('pokemonRarity'); ?>
                                    <option @if($tmpRarity=='Common') selected @endif>Common</option>
                                    <option @if($tmpRarity=='Normal') selected @endif>Normal</option>
                                    <option @if($tmpRarity=='Rare') selected @endif>Rare</option>
                                    <option @if($tmpRarity=='Epic') selected @endif>Epic</option>
                                    <option @if($tmpRarity=='Legendary') selected @endif>Legendary</option>
                                    <option @if($tmpRarity=='Mythical') selected @endif>Mythical</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Upload Picture</label>
                                <input type="file" name="file" accept="image/*">
                            </div>
                            <hr />
                            <button class="btn btn-success btn-block" type="submit">Save</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-8">
            <div class="content-right">
                <h3>
                    List of Pokemons
                    <div class="pull-right">
                        <a href="{{ url('admin/pokemon') }}" class="btn btn-success btn-sm">
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
                            <div class="card my-4 background-{{ strtolower($row->rarity) }}">
                                <a href="{{ url('admin/pokemon/info/'.$row->id) }}">
                                    <img class="card-img-top img-thumbnail" src="{{ url('uploads/'.$row->image) }}" alt="Card image cap">
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
                                            <li class="list-group-item">
                                                <label>Rarity:</label><br />
                                                <span class="">{{ $row->rarity }}</span>
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
                        <strong>Opps! </strong> Please add pokemon!
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

        $('.btn-delete').on('click',function(){
            var result = confirm("Want to delete this pokemon?");
            if (result) {
                var link = $(this).data('link');
                window.location.href = link;
            }

        });
    });
</script>
@endsection