# Library Management System - Setup Instructions

## Overview
This is a complete Laravel MVC CRUD application for a Library Management System with 4 related tables:
- Categories
- Books  
- Members
- Borrow Records

## Database Setup

### Option 1: Using MySQL (Recommended)
1. Create a MySQL database named `library_system`
2. Update your `.env` file with MySQL credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=library_system
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

### Option 2: Using SQLite
1. Ensure SQLite PDO extension is installed in PHP
2. Update your `.env` file:
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite
   ```

## Installation Steps

1. **Install Dependencies**
   ```bash
   composer install
   ```

2. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

3. **Run Migrations**
   ```bash
   php artisan migrate
   ```

4. **Seed Database with Sample Data**
   ```bash
   php artisan db:seed
   ```

5. **Start Development Server**
   ```bash
   php artisan serve
   ```

## Features Implemented

### Database Design
- ✅ `categories` table with id, name, description, timestamps
- ✅ `books` table with id, title, author, published_year, category_id (foreign key), timestamps
- ✅ `members` table with id, name, email (unique), timestamps
- ✅ `borrow_records` table with id, book_id, member_id, borrow_date, return_date, timestamps

### Eloquent Models & Relationships
- ✅ Category model: fillable [name, description], hasMany(Book)
- ✅ Book model: fillable [title, author, published_year, category_id], belongsTo(Category), hasMany(BorrowRecord)
- ✅ Member model: fillable [name, email], hasMany(BorrowRecord)
- ✅ BorrowRecord model: fillable [book_id, member_id, borrow_date, return_date], belongsTo(Book), belongsTo(Member)

### Controllers
- ✅ CategoryController with full CRUD operations
- ✅ BookController with full CRUD operations
- ✅ MemberController with full CRUD operations
- ✅ BorrowRecordController with full CRUD operations

### Routes
- ✅ Resource routes for all entities:
  - `Route::resource('categories', CategoryController::class)`
  - `Route::resource('books', BookController::class)`
  - `Route::resource('members', MemberController::class)`
  - `Route::resource('borrow-records', BorrowRecordController::class)`

### Blade Views
- ✅ Base layout with Bootstrap 5 and Font Awesome icons
- ✅ Category views: index, create, edit
- ✅ Book views: index, create, edit
- ✅ Member views: index, create, edit
- ✅ Borrow Record views: index, create, edit
- ✅ CSRF protection and method spoofing for delete/update
- ✅ Dropdowns for book and member selection in borrow records

### Sample Data
- ✅ Database seeder with:
  - 3 categories: Fiction, Science, History
  - 5 books assigned to categories
  - 3 sample members
  - 2 sample borrow records

## Usage

1. Navigate to `http://localhost:8000` in your browser
2. Use the navigation menu to access different sections:
   - **Categories**: Manage book categories
   - **Books**: Add, edit, and manage books
   - **Members**: Register and manage library members
   - **Borrow Records**: Track book borrowing and returns

## Key Features

- **Responsive Design**: Bootstrap 5 with mobile-friendly interface
- **Form Validation**: Server-side validation with error display
- **Relationship Management**: Proper foreign key relationships with cascade deletes
- **User-Friendly Interface**: Clean, modern UI with icons and status indicators
- **CRUD Operations**: Complete Create, Read, Update, Delete functionality for all entities

## File Structure

```
app/
├── Http/Controllers/
│   ├── CategoryController.php
│   ├── BookController.php
│   ├── MemberController.php
│   └── BorrowRecordController.php
├── Models/
│   ├── Category.php
│   ├── Book.php
│   ├── Member.php
│   └── BorrowRecord.php

database/
├── migrations/
│   ├── create_categories_table.php
│   ├── create_books_table.php
│   ├── create_members_table.php
│   └── create_borrow_records_table.php
└── seeders/
    └── LibrarySeeder.php

resources/views/
├── layouts/
│   └── app.blade.php
├── categories/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── books/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── members/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
└── borrow_records/
    ├── index.blade.php
    ├── create.blade.php
    └── edit.blade.php
```

The application is now ready to use! Make sure to set up your database according to the instructions above and run the migrations and seeders.
