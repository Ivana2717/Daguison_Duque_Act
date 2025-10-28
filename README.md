# Library Management System

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat&logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat&logo=bootstrap&logoColor=white)

## Description / Overview

A modern, full-featured Library Management System built with Laravel MVC architecture. This web application provides complete CRUD (Create, Read, Update, Delete) operations for managing a library's core operations including categories, books, members, and borrowing records. The system features a beautiful, responsive interface with Bootstrap 5, implementing best practices in web development with proper database relationships, form validation, and user-friendly design.

This project demonstrates the implementation of a real-world application using Laravel's Eloquent ORM, Blade templating engine, and RESTful resource routing patterns.

---

## Objectives

The main goals and learning outcomes of this midterm project include:

1. **Master MVC Architecture**: Implement a complete Laravel application following the Model-View-Controller design pattern
2. **Database Design**: Create and manage relational database structures with proper foreign key constraints
3. **CRUD Operations**: Develop full Create, Read, Update, and Delete functionality for all entities
4. **Eloquent Relationships**: Utilize Laravel's Eloquent ORM to establish and manage database relationships (hasMany, belongsTo)
5. **Form Validation**: Implement server-side validation with user-friendly error messages
6. **Responsive Design**: Build a mobile-first, responsive interface that works seamlessly across all devices
7. **RESTful Routing**: Apply RESTful principles in routing and controller design
8. **Blade Templating**: Create reusable view components using Laravel's Blade template engine
9. **Security Best Practices**: Implement CSRF protection, SQL injection prevention, and XSS protection

---

## Features / Functionality

### Core Features

- **Complete CRUD Operations** for all entities (Categories, Books, Members, Borrow Records)
- **Database Relationships** with proper foreign key constraints and cascade deletes
- **Form Validation** with comprehensive error handling and user feedback
- **Responsive Design** that adapts to mobile, tablet, and desktop screens
- **Modern UI/UX** with minimalistic design principles and smooth animations

### Entity Management

#### 📚 Categories
- Organize books by genre or subject
- Add, edit, and delete categories
- View book count for each category
- Prevent deletion if books are assigned

#### 📖 Books
- Manage complete library collection
- Store book details (title, author, publication year)
- Link books to categories
- Track availability status

#### 👥 Members
- Register and manage library members
- Store member information (name, email)
- View borrowing history for each member
- Unique email validation

#### 📝 Borrow Records
- Track book borrowing and returns
- Record borrow dates and return dates
- Link books with members
- Monitor borrowing status

### Design Features

- **Color Scheme**: Professional blue primary color (#4A90E2) with subtle grays
- **Typography**: Inter font family for excellent readability
- **Icons**: Font Awesome icons with circular backgrounds
- **Cards**: Clean white cards with subtle box shadows
- **Buttons**: Rounded corners with gradient backgrounds and hover effects
- **Status Indicators**: Color-coded badges for different states

---

## Installation Instructions

### Prerequisites

Before you begin, ensure you have the following installed:
- PHP 8.1 or higher
- Composer (Dependency Manager)
- MySQL or SQLite database
- Web server (Apache/Nginx) or Laravel development server

### Step-by-Step Installation

#### 1. Clone the Repository
```bash
git clone https://github.com/Ivana2717/Daguison_Duque_Act.git
cd Daguison_Duque_Act
```

#### 2. Install Dependencies
```bash
composer install
```

#### 3. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

#### 4. Database Setup

**Option A: MySQL**
Edit your `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_system
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

**Option B: SQLite**
Edit your `.env` file:
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```
Then create the database file:
```bash
touch database/database.sqlite
```

#### 5. Run Migrations and Seed Data
```bash
php artisan migrate
php artisan db:seed
```

#### 6. Start the Development Server
```bash
php artisan serve
```

#### 7. Access the Application
Open your browser and navigate to: **http://localhost:8000**

---

## Usage

### Navigation

The application features a clean navigation bar with easy access to all sections:
- **Categories**: Manage book categories
- **Books**: Add, edit, and organize books
- **Members**: Register and manage library members
- **Borrow Records**: Track book borrowing and returns

### Managing Categories

1. Navigate to the **Categories** page
2. Click **"Add Category"** to create a new category
3. Fill in the category name and description
4. Click **"Save"** to create the category
5. Use **Edit** to modify existing categories
6. Use **Delete** to remove categories (only if no books are assigned)

### Managing Books

1. Navigate to the **Books** page
2. Click **"Add Book"** to add a new book
3. Fill in the book details:
   - Title
   - Author
   - Publication Year
   - Select Category from dropdown
4. Click **"Save"** to add the book
5. Use **Edit** to update book information
6. Use **Delete** to remove books from the library

### Managing Members

1. Navigate to the **Members** page
2. Click **"Add Member"** to register a new member
3. Enter member details:
   - Full Name
   - Email Address (must be unique)
4. Click **"Save"** to register the member
5. View member details and borrowing history
6. Use **Edit** to update member information
7. Use **Delete** to remove members

### Managing Borrow Records

1. Navigate to the **Borrow Records** page
2. Click **"Add Record"** to create a new borrowing record
3. Fill in the details:
   - Select Book from dropdown
   - Select Member from dropdown
   - Set Borrow Date
   - Optionally set Return Date
4. Click **"Save"** to create the record
5. Update records when books are returned
6. Use **Edit** to modify borrowing details
7. Use **Delete** to remove records

---

## Screenshots or Code Snippets

### Database Schema

```sql
-- Categories Table
CREATE TABLE categories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- Books Table
CREATE TABLE books (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    published_year INT,
    category_id BIGINT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Members Table
CREATE TABLE members (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- Borrow Records Table
CREATE TABLE borrow_records (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    book_id BIGINT NOT NULL,
    member_id BIGINT NOT NULL,
    borrow_date DATE NOT NULL,
    return_date DATE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE,
    FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE CASCADE
);
```

### Model Relationships

```php
// Category Model
class Category extends Model
{
    protected $fillable = ['name', 'description'];
    
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

// Book Model
class Book extends Model
{
    protected $fillable = ['title', 'author', 'published_year', 'category_id'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function borrowRecords()
    {
        return $this->hasMany(BorrowRecord::class);
    }
}

// Member Model
class Member extends Model
{
    protected $fillable = ['name', 'email'];
    
    public function borrowRecords()
    {
        return $this->hasMany(BorrowRecord::class);
    }
}

// BorrowRecord Model
class BorrowRecord extends Model
{
    protected $fillable = ['book_id', 'member_id', 'borrow_date', 'return_date'];
    
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
```

### Controller Example

```php
class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'published_year' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);
        
        Book::create($validated);
        return redirect()->route('books.index')
            ->with('success', 'Book added successfully!');
    }
}
```

### Project Structure

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

---

## Contributors

This project was developed as a midterm examination requirement:

**👨‍💻 Ivana Daguison**
- GitHub: [@Ivana2717](https://github.com/Ivana2717)
- Role: Full-Stack Developer

**👨‍💻 Duque**
- Role: Full-Stack Developer

---

## Academic Information

**Course**: System Integration and Architecture 2 
**Project Type**: Midterm Examination Project  
**Academic Year**: 2025-2026  
**Institution**: DMMMSU - MLUC

**Note**: This project is created for educational purposes as part of academic requirements.

---

## Acknowledgments

- Built with [Laravel](https://laravel.com) framework
- UI components from [Bootstrap](https://getbootstrap.com)
- Icons from [Font Awesome](https://fontawesome.com)
- Inspired by modern library management systems

---

## Support

If you encounter any issues or have questions:
- Check the [Issues](https://github.com/Ivana2717/Daguison_Duque_Act/issues) page
- Create a new issue with detailed description
- Include steps to reproduce any bugs

---

**Made with ❤️ using Laravel**

*Midterm Project - Web Development Course*
