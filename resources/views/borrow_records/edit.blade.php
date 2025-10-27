@extends('layouts.app')

@section('title', 'Edit Borrow Record')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-edit"></i> Edit Borrow Record</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('borrow-records.update', $borrowRecord) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="book_id" class="form-label">Book <span class="text-danger">*</span></label>
                        <select class="form-select @error('book_id') is-invalid @enderror" 
                                id="book_id" name="book_id" required>
                            <option value="">Select a book</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" 
                                        {{ old('book_id', $borrowRecord->book_id) == $book->id ? 'selected' : '' }}>
                                    {{ $book->title }} by {{ $book->author }}
                                </option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member <span class="text-danger">*</span></label>
                        <select class="form-select @error('member_id') is-invalid @enderror" 
                                id="member_id" name="member_id" required>
                            <option value="">Select a member</option>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}" 
                                        {{ old('member_id', $borrowRecord->member_id) == $member->id ? 'selected' : '' }}>
                                    {{ $member->name }} ({{ $member->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="borrow_date" class="form-label">Borrow Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('borrow_date') is-invalid @enderror" 
                               id="borrow_date" name="borrow_date" 
                               value="{{ old('borrow_date', $borrowRecord->borrow_date) }}" required>
                        @error('borrow_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="return_date" class="form-label">Return Date</label>
                        <input type="date" class="form-control @error('return_date') is-invalid @enderror" 
                               id="return_date" name="return_date" 
                               value="{{ old('return_date', $borrowRecord->return_date) }}">
                        <div class="form-text">Leave empty if the book hasn't been returned yet.</div>
                        @error('return_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('borrow-records.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Borrow Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
