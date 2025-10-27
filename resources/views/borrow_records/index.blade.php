@extends('layouts.app')

@section('title', 'Borrow Records')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-exchange-alt me-2"></i>Borrow Records
            </h1>
            <p class="page-subtitle">Track book borrowing and returns</p>
        </div>
        <a href="{{ route('borrow-records.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Record
        </a>
    </div>
</div>

@if($borrowRecords->count() > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Book & Member</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrowRecords as $record)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="icon-circle icon-circle-sm bg-warning bg-opacity-10 me-3">
                                    <i class="fas fa-exchange-alt text-warning"></i>
                                </div>
                                <div>
                                    <strong class="d-block">{{ $record->book->title }}</strong>
                                    <small class="text-muted">by {{ $record->book->author }}</small><br>
                                    <small class="text-muted">
                                        <i class="fas fa-user me-1"></i>{{ $record->member->name }}
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark">
                                {{ \Carbon\Carbon::parse($record->borrow_date)->format('M d, Y') }}
                            </span>
                        </td>
                        <td>
                            @if($record->return_date)
                                <span class="badge bg-light text-dark">
                                    {{ \Carbon\Carbon::parse($record->return_date)->format('M d, Y') }}
                                </span>
                            @else
                                <span class="text-muted">Not returned</span>
                            @endif
                        </td>
                        <td>
                            @if($record->return_date)
                                <span class="badge bg-success bg-opacity-10 text-success">
                                    <i class="fas fa-check me-1"></i>Returned
                                </span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning">
                                    <i class="fas fa-clock me-1"></i>Borrowed
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('borrow-records.edit', $record) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('borrow-records.destroy', $record) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" 
                                            onclick="return confirm('Are you sure you want to delete this borrow record?')">
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
            <i class="fas fa-exchange-alt fa-2x text-muted"></i>
        </div>
        <h3 class="text-muted mb-3">No borrow records found</h3>
        <p class="text-muted mb-4">Start tracking book borrowing by creating your first record.</p>
        <a href="{{ route('borrow-records.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Record
        </a>
    </div>
@endif
@endsection
