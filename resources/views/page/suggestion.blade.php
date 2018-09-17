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
            @if(session('sent'))
                <div class="alert alert-success my-4" role="alert">
                    Thank you trainer for  your suggestion!
                </div>
            @endif

            <div class="card text-white bg-dark  my-4">
                <div class="card-header">Help us improve this guide for you. Send us your suggestions!</div>
                <div class="card-body">
                    <form method="post" action="{{ asset('suggestion') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" class="form-control" autofocus autocomplete="off"  name="name" placeholder="Enter Your Name" required>
                        </div>
                        <div class="form-group">
                            <label>Your Server</label>
                            <input type="text" class="form-control" autocomplete="off"  name="serverName" placeholder="Enter Your Server" required>
                        </div>
                        <div class="form-group">
                            <label>Your Suggestion</label>
                            <textarea class="form-control" name="message" rows="5" style="resize: none;" placeholder="Your suggestoin here..." required></textarea>
                        </div>

                        <hr />
                        <button class="btn btn-warning btn-block" type="submit">Send</button>
                    </form>
                </div>
            </div>
            @include('page.donate')
        </div>

        <div class="col-md-8">
            <div class="content-right">
                <img src="{{ url('img/suggestion.png') }}" class="img-thumbnail"/>
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