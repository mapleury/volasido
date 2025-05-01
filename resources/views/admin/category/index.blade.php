@extends('template.base')

@if(session('message'))
<div class="alert alert-warning">
    {{ session('message') }}
</div>
@endif

@section('title', 'Admin Dashboard')

@section('content')

<div class="col-lg-10 grid-margin stretch-card">
    <div class="card" style="background-color: #EDE4D5; border-left: 5px solid #6A100C;">
        <div class="card-body">

            <div class="page-header">
                <h3 style="font-family: 'Playfair Display', serif; color: #6A100C;">Library Book Category Data - IDN</h3>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0" style="font-family: 'Playfair Display', serif; color: #6A100C;">Book Category List</h4>
                <button class="btn btn-info btn-rounded" data-bs-toggle="modal" data-bs-target="#categoryModal" style="background-color: #6A100C; color: #EDE4D5;">
                    Add Category
                </button>
            </div>

            <table class="table table-striped" style="border: 2px solid #6A100C;">
                <thead>
                    <tr>
                        <th style="color: #6A100C;">Category ID</th>
                        <th style="color: #6A100C;">Name</th>
                        <th style="color: #6A100C;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button class="btn btn-rounded btn-red" data-bs-toggle="modal" data-bs-target="#updateCategoryModal{{ $category->id }}" style="background-color: #6A100C; color: #EDE4D5;">Edit</button>
                            <form action="{{ route('category.delete', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-rounded btn-red" style="background-color: #6A100C; color: #EDE4D5;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add Category -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="categoryModalLabel" style="font-family: 'Playfair Display', serif; color: #6A100C;">Add Book Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" style="font-family: 'Playfair Display', serif; color: #6A100C;">Category</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Category Name">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-gradient-danger" style="background-color: #6A100C; color: #EDE4D5;" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-rounded btn-gradient-primary" style="background-color: #6A100C; color: #EDE4D5;">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update Category -->
@foreach ($categories as $category)
<div class="modal fade" id="updateCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="categoryModalLabel" style="font-family: 'Playfair Display', serif; color: #6A100C;">Update Category {{ $category->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" style="font-family: 'Playfair Display', serif; color: #6A100C;">Category</label>
                        <input name="name" value="{{ old('name', $category->name) }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Category Name">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-gradient-danger" style="background-color: #6A100C; color: #EDE4D5;" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-rounded btn-gradient-primary" style="background-color: #6A100C; color: #EDE4D5;">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@if ($errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'));
        categoryModal.show();
    });
</script>
@endif

@endsection
