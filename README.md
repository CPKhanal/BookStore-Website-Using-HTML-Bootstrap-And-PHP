# 📚 BookStore Web Application

A dynamic online BookStore project built using **HTML**, **Bootstrap**, **PHP**, and **MySQL**. This project supports user login, cart management, admin dashboard, announcements, and book purchases.

---

## 🌐 Live Demo

🔗 Visit the live site here: [https://bookstore.42web.io/](https://bookstore.42web.io/)

> Hosted using InfinityFree + 000WebHost (or similar free hosting platform).

---

## 🔍 Features

- 👤 User login & signup system
- 🛒 Add to cart & purchase books
- 📢 Announcements section
- 📋 Admin dashboard
- 🗂️ Add/edit/delete books dynamically via admin panel ✅
- 📰 Admin can post announcements dynamically ✅
- 🔍 Book search & popular books
- 📥 Contact form & about page
- 🗃️ MySQL database integration

---

## 🧰 Tech Stack

- **Frontend**: HTML5, CSS3, Bootstrap
- **Backend**: PHP
- **Database**: MySQL (via XAMPP / phpMyAdmin)
- **Others**: JavaScript, PHP includes

---

## 🚀 Getting Started

### 1. Requirements

- [XAMPP](https://www.apachefriends.org/) or similar local server
- Web browser

### 2. Setup Instructions

1. **Clone or copy the project** to your local server directory (e.g., `C:/xampp/htdocs/BookStore`).
2. Open **XAMPP Control Panel** and start `Apache` and `MySQL`.
3. Visit `http://localhost/phpmyadmin/` and import the SQL file:
   - Go to the **Import** tab.
   - Choose the file located at:
     ```
     SQL Query For Database/Instruction_Doc_And_SQL_File.sql
     ```
   - Click **Go** to import the database.

4. Access the app in your browser:
   ```
   http://localhost/BookStore
   ```

---

## 🔐 Default Admin Credentials

> These are hardcoded for development/testing:

- **Username:** `admin`  
- **Password:** `password123`

---

## ⚙️ Admin Feature Highlights

### 📕 Dynamic Book Upload
- Add new books (title, price, image)
- Books appear dynamically on homepage
- Books can be edited or deleted anytime

### 📢 Dynamic Announcements
- Post announcements from the admin panel
- Announcements are shown to users on the main site
- Admin can delete or manage replies

---

## 📁 Folder Structure

```
BookStore/
├── books-img/                # Book cover images
├── images/                   # Static assets/images
├── owner/                    # Admin functions (dashboard, book/announcement management)
├── SQL Query For Database/   # SQL file and setup instructions
├── about.php
├── announcements.php
├── announcement_detail.php
├── connect.php / connect2.php
├── contact-us.php
├── dashboard.php
├── db_connection.php
├── edit_profile.php
├── footer.php / header.php
├── index.php
├── login.php / login_process.php / logout.php
├── manage-cart.php / mycart.php / purchase.php
├── script.js / style.css
└── ... (other PHP files)
```

---

## 📄 License

This project is open-source and can be used for educational purposes or as a base for a full-featured eCommerce platform.

---

## 🙌 Contributions

Have ideas for improvement? Open a pull request or issue — all contributions are welcome!
