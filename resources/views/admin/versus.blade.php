@extends('layout.app')

@section('css')
<style>
    .scrolling table {
        table-layout: inherit;
        *margin-left: -100px;/*ie7*/
    }
    .scrolling td, th {
        vertical-align: top;
        padding: 10px;
        min-width: 70px;
        text-align: center;
    }
    .scrolling th {
        position: absolute;
        *position: relative; /*ie7*/
        left: 0;
        width: 120px;
    }

    .outer {
        position: relative
    }
    .inner {
        overflow-x: auto;
        overflow-y: visible;
        margin-left: 120px;
    }
    .table th {
        padding: 9px !important;
    }
    tr:hover {
        background-color: #aeff9c !important;
    }
    table {
        overflow: hidden;
    }

    td, th {
        padding: 10px;
        position: relative;
        outline: 0;
    }

    body:not(.nohover) tbody tr:hover {
        background-color: #aeff9c;
    }

    td:hover::after,
    thead th:not(:empty):hover::after,
    td:focus::after,
    thead th:not(:empty):focus::after {
        content: '';
        height: 10000px;
        left: 0;
        position: absolute;
        top: -5000px;
        width: 100%;
        z-index: -1;
    }

    td:hover::after,
    th:hover::after {
        background-color: #aeff9c;
    }

    td:focus::after,
    th:focus::after {
        background-color: lightblue;
    }

    /* Focus stuff for mobile */
    td:focus::before,
    tbody th:focus::before {
        background-color: lightblue;
        content: '';
        height: 100%;
        top: 0;
        left: -5000px;
        position: absolute;
        width: 10000px;
        z-index: -1;
    }
    .btn-xs {
        padding: 0px 5px;
        font-size: 0.8em;
        line-height: 1.3;
        border-radius: .2rem;
    }
</style>
@endsection

@section('content')
    <div class="row">
        @if(session('updated'))
            <div class="alert alert-success my-4 col-sm-12" role="alert">
                Successfully Updated!
            </div>
            <hr />
        @endif

        <div class="col-md-12 my-5">
            <form method="post" class="pull-right">
                {{ csrf_field() }}
                <div class="input-group pull-right">
                    <select class="custom-select" name="type">
                        <option value="">All</option>
                        <?php $key = \Illuminate\Support\Facades\Session::get('versusKeyword');?>
                        @foreach($types as $row)
                        <option @if($key==$row->name) selected @endif>{{ $row->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Filter</button>
                    </div>
                </div>
            </form>
            <h3>
                Type Attribute


            </h3>
            <hr />
            <div class="scrolling outer">
                <div class="inner">
                    <table class="table table-bordered table-hover table-condensed">
                        <tr>
                            <th class="fixed">Types:</th>
                            @foreach($types as $row)
                            <td class="fixed">{{ $row->name }}</td>
                            @endforeach

                        </tr>
                        @foreach($filter as $atk)
                        <tr>
                            <th>{{ $atk->name }}</th>
                            @foreach($types as $def)
                            <td>
                                <?php $damage =\App\Http\Controllers\AdminCtrl::compareType($atk->id,$def->id) ?>
                                @if($damage==0)
                                    <a href="#damageModal" class="btn-damage text-danger" data-defender="{{ $def->id }}" data-attacker="{{ $atk->id }}" data-toggle="modal">
                                        1/2
                                    </a>
                                @elseif($damage==2)
                                    <a href="#damageModal" class="btn-damage text-success" data-defender="{{ $def->id }}" data-attacker="{{ $atk->id }}" data-toggle="modal">
                                        x2
                                    </a>
                                @else
                                    <a href="#damageModal" class="btn-damage" data-defender="{{ $def->id }}" data-attacker="{{ $atk->id }}" data-toggle="modal">
                                        -
                                    </a>
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="damageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Damage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-success btn-block btn-submit" data-status="win" data-dismiss="modal">x2</button>
                    <button class="btn btn-danger btn-block btn-submit" data-status="lose" data-dismiss="modal">1/2</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        // whatever kind of mobile test you wanna do.
        if (screen.width < 500) {
            $("body").addClass("nohover");
            $("td, th")
                .attr("tabindex", "1")
                .on("touchstart", function() {
                    $(this).focus();
                });
        }

        var attacker = 0;
        var defender = 0;
        $('.btn-damage').on('click',function () {
            attacker = $(this).data('attacker');
            defender = $(this).data('defender');
        })

        $('.btn-submit').on('click',function () {
            var status = $(this).data('status');
            var link = "{{ url('admin/pokemon/versus/') }}/"+attacker+"/"+defender+"/"+status;
            window.location.href = link;
        })

    </script>
@endsection