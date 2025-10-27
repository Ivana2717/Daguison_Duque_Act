<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use App\Models\Member;
use App\Models\BorrowRecord;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Categories
        $fiction = Category::create([
            'name' => 'Fiction',
            'description' => 'Novels, short stories, and other fictional works'
        ]);

        $science = Category::create([
            'name' => 'Science',
            'description' => 'Scientific books, research papers, and educational materials'
        ]);

        $history = Category::create([
            'name' => 'History',
            'description' => 'Historical books, biographies, and historical accounts'
        ]);

        // Create Books
        $books = [
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'published_year' => 1960,
                'category_id' => $fiction->id
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'published_year' => 1949,
                'category_id' => $fiction->id
            ],
            [
                'title' => 'A Brief History of Time',
                'author' => 'Stephen Hawking',
                'published_year' => 1988,
                'category_id' => $science->id
            ],
            [
                'title' => 'The Selfish Gene',
                'author' => 'Richard Dawkins',
                'published_year' => 1976,
                'category_id' => $science->id
            ],
            [
                'title' => 'Sapiens',
                'author' => 'Yuval Noah Harari',
                'published_year' => 2011,
                'category_id' => $history->id
            ]
        ];

        foreach ($books as $bookData) {
            Book::create($bookData);
        }

        // Create Members
        $members = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com'
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com'
            ],
            [
                'name' => 'Bob Johnson',
                'email' => 'bob.johnson@example.com'
            ]
        ];

        foreach ($members as $memberData) {
            Member::create($memberData);
        }

        // Create Borrow Records
        $borrowRecords = [
            [
                'book_id' => 1, // To Kill a Mockingbird
                'member_id' => 1, // John Doe
                'borrow_date' => '2024-01-15',
                'return_date' => '2024-02-15'
            ],
            [
                'book_id' => 3, // A Brief History of Time
                'member_id' => 2, // Jane Smith
                'borrow_date' => '2024-02-01',
                'return_date' => null // Still borrowed
            ]
        ];

        foreach ($borrowRecords as $recordData) {
            BorrowRecord::create($recordData);
        }
    }
}
