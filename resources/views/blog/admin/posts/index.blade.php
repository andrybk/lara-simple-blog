@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{route('blog.admin.posts.create')}}">Add</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Publication date</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($paginator as $blogPost)
                                @php /** @var \App\Models\BlogPost $blogPost */@endphp
                                <tr @if($blogPost->is_published) style="background-color: #cccccc;" @endif>
                                    <td>{{$blogPost->id}}</td>
                                    <td>{{$blogPost->user_id}}</td>
                                    <td>{{$blogPost->category_id}}</td>
                                    <td>
                                        <a href="{{route('blog.admin.posts.edit', $blogPost->id)}}">
                                            {{$blogPost->title}}
                                        </a>
                                    </td>
                                    <td>
                                    {{$blogPost->is_published ? \Carbon\Carbon::create($blogPost->published_at)->format('d M H:i') : '' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($paginator->total() > $paginator->count())
        <br>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="pagination justify-content-center">
                    {{$paginator->links()}}
                </div>
            </div>
        </div>
    @endif

@endsection