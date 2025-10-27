<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowRecord;
use App\Models\Book;
use App\Models\Member;

class BorrowRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowRecords = BorrowRecord::with(['book', 'member'])->get();
        return view('borrow_records.index', compact('borrowRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $members = Member::all();
        return view('borrow_records.create', compact('books', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
        ]);

        BorrowRecord::create($request->all());

        return redirect()->route('borrow-records.index')
            ->with('success', 'Borrow record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowRecord $borrowRecord)
    {
        return view('borrow_records.show', compact('borrowRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BorrowRecord $borrowRecord)
    {
        $books = Book::all();
        $members = Member::all();
        return view('borrow_records.edit', compact('borrowRecord', 'books', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BorrowRecord $borrowRecord)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
        ]);

        $borrowRecord->update($request->all());

        return redirect()->route('borrow-records.index')
            ->with('success', 'Borrow record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BorrowRecord $borrowRecord)
    {
        $borrowRecord->delete();

        return redirect()->route('borrow-records.index')
            ->with('success', 'Borrow record deleted successfully.');
    }
}
