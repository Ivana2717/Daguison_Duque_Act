@extends('layouts.app')

@section('title', 'Members')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-users me-2"></i>Members
            </h1>
            <p class="page-subtitle">Manage library members and their borrowing history</p>
        </div>
        <a href="{{ route('members.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Member
        </a>
    </div>
</div>

@if($members->count() > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Member Details</th>
                    <th>Email</th>
                    <th>Borrowed Books</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="icon-circle icon-circle-sm bg-success bg-opacity-10 me-3">
                                    <i class="fas fa-user text-success"></i>
                                </div>
                                <div>
                                    <strong class="d-block">{{ $member->name }}</strong>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted">{{ $member->email }}</span>
                        </td>
                        <td>
                            <span class="badge bg-success bg-opacity-10 text-success">
                                {{ $member->borrowRecords->count() }} books
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('members.edit', $member) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" 
                                            onclick="return confirm('Are you sure you want to delete this member?')">
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
            <i class="fas fa-users fa-2x text-muted"></i>
        </div>
        <h3 class="text-muted mb-3">No members found</h3>
        <p class="text-muted mb-4">Start by registering your first library member.</p>
        <a href="{{ route('members.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Member
        </a>
    </div>
@endif
@endsection
