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
                    Successfully added!
                </div>
            @endif

            @if(session('updated'))
                <div class="alert alert-success my-4" role="alert">
                    Map successfully updated!
                </div>
            @endif

            @if(session('deleted'))
                <div class="alert alert-info my-4" role="alert">
                    Successfully deleted!
                </div>
            @endif

            <div class="card text-white bg-dark  my-4">
                <div class="card-header">Search Pokemon</div>
                <div class="card-body">
                    <form method="post" action="{{ asset('admin/pokemon/evolve/search') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Select Pokemon</label>
                            <select class="select2 form-control" name="pokemon">
                                <option value="">Any</option>
                                @foreach($all as $row)
                                    <option @if(Session::get('evolvePokemon')==$row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
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
                    <div class="card-header">Update Evolve</div>
                    <div class="card-body">
                        <form method="post" action="{{ asset('admin/pokemon/evolve/update/'.$info->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Base Pokemon</label>
                                <select class="select2 form-control" name="base">
                                    <option value="0">None</option>
                                    @foreach($pokemon as $row)
                                        <option @if($info->base==$row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Level 15 Evolve</label>
                                <select class="select2 form-control" name="lvl15">
                                    <option value="0">None</option>
                                    @foreach($pokemon as $row)
                                        <option @if($info->lvl15==$row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Level 22 Evolve</label>
                                <select class="select2 form-control" name="lvl22">
                                    <option value="0">None</option>
                                    @foreach($pokemon as $row)
                                        <option @if($info->lvl22==$row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mega Evolve</label>
                                <select class="select2 form-control" name="mega">
                                    <option value="0">None</option>
                                    @foreach($pokemon as $row)
                                        <option @if($info->mega==$row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr />
                            <button class="btn btn-success btn-block" type="submit">Update</button>
                        </form>
                    </div>
                @else
                    <div class="card-header">Add Evolve</div>
                    <div class="card-body">
                        <form method="post" action="{{ asset('admin/pokemon/evolve') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Base Pokemon</label>
                                <select class="select2 form-control" name="base">
                                    <option value="0">None</option>
                                    @foreach($pokemon as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Level 15 Evolve</label>
                                <select class="select2 form-control" name="lvl15">
                                    <option value="0">None</option>
                                    @foreach($pokemon as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Level 22 Evolve</label>
                                <select class="select2 form-control" name="lvl22">
                                    <option value="0">None</option>
                                    @foreach($pokemon as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mega Evolve</label>
                                <select class="select2 form-control" name="mega">
                                    <option value="0">None</option>
                                    @foreach($pokemon as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
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
                    List of Evolves
                    <div class="pull-right">
                        <a href="{{ url('admin/pokemon/evolve') }}" class="btn btn-success btn-sm">
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
                                                <?php
                                                    $pokemon = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($row->base);
                                                ?>
                                                @if($pokemon->rarity)
                                                    <img src="{{ url('uploads/'.$pokemon->image) }}" class="img-thumbnail pull-right" width="50" />
                                                @endif
                                                <label>Base:</label><br />
                                                <span class="{{ strtolower($pokemon->rarity) }}">{{ $pokemon->name }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <?php
                                                $pokemon = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($row->lvl15);
                                                ?>
                                                @if($pokemon->rarity)
                                                    <img src="{{ url('uploads/'.$pokemon->image) }}" class="img-thumbnail pull-right" width="50" />
                                                @endif
                                                <label>Level 15:</label><br />
                                                <span class="{{ strtolower($pokemon->rarity) }}">{{ $pokemon->name }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <?php
                                                $pokemon = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($row->lvl22);
                                                ?>
                                                @if($pokemon->rarity)
                                                    <img src="{{ url('uploads/'.$pokemon->image) }}" class="img-thumbnail pull-right" width="50" />
                                                @endif
                                                <label>Level 22:</label><br />
                                                <span class="{{ strtolower($pokemon->rarity) }}">{{ $pokemon->name }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <?php
                                                $pokemon = \App\Http\Controllers\PokemonCtrl::getPokemonInfo($row->mega);
                                                ?>
                                                @if($pokemon->rarity)
                                                    <img src="{{ url('uploads/'.$pokemon->image) }}" class="img-thumbnail pull-right" width="50" />
                                                @endif
                                                <label>Mega Evolve:</label><br />
                                                <span class="{{ strtolower($pokemon->rarity) }}">{{ $pokemon->name }}</span>
                                            </li>
                                            <li class="list-group-item text-right" style="padding-top:8px;">
                                                <a href="{{ url('admin/pokemon/evolve/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="#" data-link="{{ url('admin/pokemon/evolve/delete/'.$row->id) }}" class="btn-delete btn btn-sm btn-danger">Delete</a>

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
                            <strong>Opps! </strong> No data found.
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
                var result = confirm("Want to delete this map?");
                if (result) {
                    var link = $(this).data('link');
                    window.location.href = link;
                }

            });
        });
    </script>
@endsection