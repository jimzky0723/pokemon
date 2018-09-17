@extends('layout.app')

@section('css')

@endsection

@section('content')
    <div class="row">
        @if(session('deleted'))
            <div class="alert alert-success my-4 col-sm-12" role="alert">
                Successfully Deleted!
            </div>
            <hr />
        @endif

        <div class="col-md-12 my-5">
            <h3>
                Suggestions from the Trainers!
            </h3>
            <hr />
            @if(count($data) > 0 )
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th width="3%" class="text-center"></th>
                                <th width="20%">IP</th>
                                <th width="20%">Name</th>
                                <th width="15%">Server</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>
                                    <a href="#" data-link="{{ url('admin/suggestion/delete/'.$row->id) }}" class="btn-delete btn-sm btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                                <td>{{ $row->ipAddress }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->server }}</td>
                                <td>{!! $row->message !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-12">
                        {{ $data->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            @else
                <div class="alert alert-warning my-4 col-sm-12" role="alert">
                    No suggestions from trainers!
                </div>
            @endif
        </div>
    </div>
@endsection


@section('script')

    <script>
        $('.btn-delete').on('click',function(){
            var result = confirm("Want to delete?");
            if (result) {
                var link = $(this).data('link');
                window.location.href = link;
            }
        });
    </script>
@endsection