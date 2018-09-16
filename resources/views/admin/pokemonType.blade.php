@extends('layout.app')

@section('css')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Categories Widget -->
            @if(session('added'))
            <div class="alert alert-success my-4" role="alert">
                Successfully Added!
            </div>
            @endif

            @if(session('deleted'))
            <div class="alert alert-success my-4" role="alert">
                Successfully Deleted!
            </div>
            @endif

            @if(session('duplicate'))
                <div class="alert alert-danger my-4" role="alert">
                    <strong>Error!</strong> Duplicate pokemon type.
                </div>
            @endif
            <div class="card text-white bg-dark  my-4">
                @if(isset($info))
                <div class="card-header">Update Type</div>
                <div class="card-body">
                    <form method="post" action="{{ asset('admin/pokemon/type') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Type Name</label>
                            <input type="text" class="form-control" autocomplete="off" autofocus value="{{ $info->name }}" name="name" required placeholder="Type Name">
                        </div>
                        <hr />
                        <button class="btn btn-block btn-success" type="submit">Update</button>
                        <button class="btn btn-block btn-danger btn-delete" data-link="{{ url('admin/pokemon/type/delete/'.$info->id) }}" type="button">Delete</button>

                    </form>
                </div>
                @else
                <div class="card-header">Add Type</div>
                <div class="card-body">
                    <form method="post" action="{{ asset('admin/pokemon/type') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Type Name</label>
                            <input type="text" class="form-control" autocomplete="off" autofocus name="name" required placeholder="Type Name">
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
                    List of Types
                    <div class="pull-right">
                        <a href="{{ url('admin/pokemon/type') }}" class="btn btn-success btn-sm">
                            Add New
                        </a>
                    </div>
                </h3>
                <hr />

                @if(count($data) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-dark">
                        <tr>
                            <th>Name</th>
                            <th>Date Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                        <tr>
                           <td>
                               <a href="{{ url('admin/pokemon/type/'.$row->id) }}">
                               {{ $row->name }}
                               </a>
                           </td>
                           <td>{{ date('M d, Y h:i A',strtotime($row->updated_at)) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $data->links("pagination::bootstrap-4") }}
                </div>
                @else
                    <div class="alert alert-danger my-4" role="alert">
                        <strong>Opps! </strong> Please add types!
                    </div>
                @endif
            </div>
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