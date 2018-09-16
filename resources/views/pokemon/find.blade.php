@extends('layout.app')

@section('css')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Find Pokemon</h5>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Pokemon Name">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="button">Button</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <ul class="list-group">
                    <li class="list-group-item active">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

        <div class="col-md-8">
            <div class="content-right">
                <h3>Result</h3>
                <hr />
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-dark">
                            <tr>
                                <th width="33%">Name</th>
                                <th width="33%">Map</th>
                                <th>Others</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="normal">Mr. Mime</span></td>
                                <td>Taekwood 1</td>
                                <td>
                                    <ul>
                                        <li class="legendary">Lugia</li>
                                        <li class="epic">Aeroductyl</li>
                                        <li class="rare">Swampert</li>
                                        <li class="normal">Mr. Mime</li>
                                        <li class="common">Geodude</li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

@endsection