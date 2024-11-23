@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                @session('status')
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endsession
                <p class="pb-3 h2">Welcome, {{ $user->name }}</p>
                <div class="card">
                    <div class="card-header">
                        <h4>Categories List
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger float-end ms-2">Log out</button>
                            </form>
                            <a href="{{ url('category/create') }}" class = "btn btn-primary float-end">Add category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class = "table table-stiped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->status == 1 ? 'Visible':'Hidden' }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-info">Show</a>

                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection