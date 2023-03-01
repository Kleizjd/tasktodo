@extends('app')
<style>
    .color-container {
        width: 16px;
        height: 16px;
        display: inline-block;
        border-radius: 4px;
    }
</style>
@section('content')
    <div class="container w-25 border p-4 mt-4">

        <form action="{{ route('categories') }}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @error('name')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="name" class="form-label">New category </label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Edit color category</label>
                <input type="color" class="form-control" id="color" name="color">
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
        @foreach ($categories as $category)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a class="d-flex align-items-center gap-2"
                        href="{{ route('categories-edit', ['id' => $category->id]) }}">
                        <span class="color-container" style="background-color: {{ $category->color }}"></span>
                    </a>
                    {{ $category->name }}
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <!-- Button trigger modal -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#modal-{{ $category->id }}">Delete</button>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="modal-{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Al eliminar la categoria <strong> {{ $category->name }}</strong> se eliminan todas las tareas
                            asignadas a la misma.
                            Está seguro que desea eliminar la categoria <strong>{{ $category->name }}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <form action="{{ route('categories-destroy', ['id' => $category->id]) }}" method="POST"> --}}
                            <form action="{{ route('categories-destroy', ['id' => $category->id]) }}" method="POST">

                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
</div>
