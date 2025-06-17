# BnB Booking App

**BnB Booking App** is a simple web-based booking management system built with PHP and HTML. It demonstrates a basic full-stack workflow: users can create, view, edit, and delete bookings for a fictional bed and breakfast. It also includes a simple login mechanism and uses a database configuration for data storage.

---

## ⚙️ Features

- 📄 **Booking Form:** Clean HTML form for guests to make bookings.
- 🗂️ **CRUD Operations:** Create, view, edit, and delete bookings.
- 🔑 **User Login:** Simple PHP login system to manage bookings securely.
- 🔄 **Dynamic Data:** Uses PHP and MySQL (via `config.php`) to store booking data.
- ✏️ **Editable Bookings:** Admins can edit or remove bookings as needed.

---

## 🚀 How to Run Locally

1. **Prerequisites:**
   - PHP installed (e.g. using [XAMPP](https://www.apachefriends.org/) or [MAMP](https://www.mamp.info/))
   - MySQL server (if using database features)
   - Web browser

2. **Setup:**
   - Clone or download this repository.
   - Place the project folder inside your local server directory (`htdocs` for XAMPP, `www` for MAMP).

3. **Database:**
   - Update your database credentials in `config.php` to match your local MySQL settings.
   - Create a database and relevant tables if not already done.

4. **Run:**
   - Start Apache and MySQL in XAMPP/MAMP.
   - Open your browser and navigate to:
     ```
     http://localhost/bnb-booking-app/MakeBooking.html
     ```
   - Use the booking form, then log in to view, edit, or delete bookings.

---

## 📁 File Structure

| File | Purpose |
| ---- | ------- |
| `MakeBooking.html` | Main booking form |
| `config.php` | Database connection settings |
| `login.php` | User login script |
| `createBooking.php` | Handles creating a new booking |
| `listbookings.php` | Lists all bookings |
| `ViewBooking.php` | Shows booking details |
| `editBooking.php` | Handles editing a booking |
| `deletebooking.php` | Handles deleting a booking |

---

## 📚 Purpose

This project was originally created as an educational assessment and is now part of my portfolio to demonstrate practical PHP, HTML, and full-stack fundamentals.

---

## ✅ License

This project is shared for learning and portfolio purposes.
