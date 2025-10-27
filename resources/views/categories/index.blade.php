@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-tags me-2"></i>Categories
            </h1>
            <p class="page-subtitle">Organize your books by categories</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Category
        </a>
    </div>
</div>

@if($categories->count() > 0)
    <div class="row g-4">
        @foreach($categories as $category)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-circle bg-primary bg-opacity-10 me-3">
                                <i class="fas fa-tags text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-0">{{ $category->name }}</h5>
                                <small class="text-muted">{{ $category->books->count() }} books</small>
                            </div>
                        </div>
                        <p class="card-text text-muted flex-grow-1">
                            {{ $category->description ?? 'No description available.' }}
                        </p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-primary btn-sm flex-fill">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="flex-fill">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100" 
                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                    <i class="fas fa-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="empty-state">
        <div class="icon-circle icon-circle-lg bg-light d-inline-flex mb-4">
            <i class="fas fa-tags fa-2x text-muted"></i>
        </div>
        <h3 class="text-muted mb-3">No categories found</h3>
        <p class="text-muted mb-4">Get started by creating your first category to organize your books.</p>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Create Category
        </a>
    </div>
@endif
@endsection
