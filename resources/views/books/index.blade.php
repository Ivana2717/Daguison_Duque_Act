@extends('layouts.app')

@section('title', 'Books')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-book me-2"></i>Books
            </h1>
            <p class="page-subtitle">Manage your library collection</p>
        </div>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Book
        </a>
    </div>
</div>

@if($books->count() > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Book Details</th>
                    <th>Author</th>
                    <th>Year</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="icon-circle icon-circle-sm bg-primary bg-opacity-10 me-3">
                                    <i class="fas fa-book text-primary"></i>
                                </div>
                                <div>
                                    <strong class="d-block">{{ $book->title }}</strong>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted">{{ $book->author }}</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark">{{ $book->published_year }}</span>
                        </td>
                        <td>
                            <span class="badge bg-primary bg-opacity-10 text-primary">{{ $book->category->name }}</span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('books.edit', $book) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" 
                                            onclick="return confirm('Are you sure you want to delete this book?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="empty-state">
        <div class="icon-circle icon-circle-lg bg-light d-inline-flex mb-4">
            <i class="fas fa-book fa-2x text-muted"></i>
        </div>
        <h3 class="text-muted mb-3">No books found</h3>
        <p class="text-muted mb-4">Start building your library by adding your first book.</p>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Book
        </a>
    </div>
@endif
@endsection
