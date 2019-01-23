@extends('admin-panel.admin_template')

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="posts/create">add post</a>
        </li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Posts</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>slug</th>
                        <th>content</th>
                        <th>created_at</th>
                        <th>update_at</th>
                        <th>button</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>slug</th>
                        <th>content</th>
                        <th>created_at</th>
                        <th>update_at</th>
                        <th>button</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <a href="{{ route('posts.edit', $post->id)}}">Edit</a><br>

                                {!! Form::open(['method'=>'DELETE', 'route'=>['posts.destroy', $post->id]]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <script>
        $('body').on('click','.delete',function(e){
            e.preventDefault();
            var url = $(this).data('href');
            var el = $(this).parents('tr');
            $.ajax({
                url: url,
                type: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    el.detach();
                },
                error: function (msg) {
                    alert('Ошибка');
                }
            });
        });
    </script>
@endsection
