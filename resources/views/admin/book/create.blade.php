@extends('template.base')

@section ('title', 'Admin Dashboard')

@section('content')

@if(session('message'))
<div class="alert alert-success">
  {{ session('message') }}
</div>
@endif

<div class="col-10 grid-margin stretch-card">
  <div class="card vintage-card">
    <div class="card-body">
      <h4 class="card-title" style="font-family: 'Playfair Display', serif; font-weight: 800; color: #6A100C;">Add a New Book</h4>
      <p class="card-description" style="font-family: 'Playfair Display', serif; font-weight: 600; color: #6A100C;">Please fill out the form to add a new book to the collection.</p>
      
      <form class="forms-sample" method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="title">Title</label>
          <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Book Title">
          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="category">Select Book Category</label>
          <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option selected disabled>Choose a category...</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="author">Author</label>
          <input name="author" type="text" class="form-control @error('author') is-invalid @enderror" placeholder="Enter Author Name">
          @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="publisher">Publisher</label>
          <input name="publisher" type="text" class="form-control @error('publisher') is-invalid @enderror" placeholder="Enter Publisher Name">
          @error('publisher')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="year">Year Published</label>
          <input name="year" type="number" class="form-control @error('year') is-invalid @enderror" placeholder="Enter Year of Publication">
          @error('year')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="stock">Book Stock</label>
          <input name="stock" type="number" class="form-control @error('stock') is-invalid @enderror" placeholder="Enter Stock Quantity">
          @error('stock')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="cover">Upload Book Cover</label>
          <input name="cover" type="file" class="form-control @error('cover') is-invalid @enderror">
          @error('cover')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-submit-vintage">Submit</button>
      </form>
    </div>
  </div>
</div>

@endsection
