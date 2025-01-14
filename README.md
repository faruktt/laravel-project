# Hotel & Room Reservation Management System

A comprehensive web-based Hotel & Room Reservation Management System built with **Laravel**. This application manages hotel operations including room inventory, categories, booking reservations, customer invoicing, real-time notifications, and RESTful API endpoints for mobile or external integration.

---

## 🚀 Key Features

### 🏨 Room & Inventory Management
- **Room Types**: Categorize rooms (e.g., Deluxe, Suite, Standard) with custom descriptions and attributes.
- **Room Statuses**: Real-time status tracking (Available, Booked, Under Maintenance).
- **Room Directory**: Manage room numbers, capacity, pricing, views, and active/inactive status toggles.

### 👥 Customer & Booking Management
- **Reservation Processing**: Register customer reservations with arrival (`from_date`) and departure (`until_date`) dates.
- **Financial Calculations**: Automated tracking of total price, payment amounts, and balance due.
- **Customer List & History**: Complete records of guest profiles and previous stays.

### 📊 Dashboard & Analytics
- **Interactive Overview**: Visual customer and booking trends.
- **Customer Charts**: Dynamic charts showing booking volumes and occupancy metrics.
- **Invoicing System**: Generate and view detailed invoices for completed and pending customer stays.

### 🔔 Notifications & Communication
- **System Notifications**: Real-time alert notifications for administrative events and booking updates.
- **Guest Inquiries**: Public contact form for guest queries and message management.

### 🌐 RESTful API
- Dedicated RESTful API endpoints under `/api/` for headless, mobile app, or external integration:
  - `GET /api/rooms` - Retrieve rooms with room types and status
  - `GET /api/types` - Retrieve room categories
  - `GET /api/room-statuses` - Retrieve available room statuses
  - `GET /api/customers` - Retrieve guest bookings
  - `GET /api/contact-messages` - Manage customer inquiries
  - `GET /api/notifications` - Retrieve alerts

---

## 🛠️ Technology Stack

- **Backend**: Laravel (PHP 8.2+)
- **Frontend**: Blade templates, TailwindCSS, Bootstrap, Vite
- **Database**: MySQL / SQLite (Eloquent ORM)
- **Authentication**: Laravel Breeze / Session-based Auth

---

## ⚙️ Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/faruktt/laravel-project.git
   cd laravel-project
   ```

2. **Install PHP and JavaScript dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Configure Environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Migration & Seeding:**
   ```bash
   php artisan migrate
   ```

5. **Build Frontend Assets & Serve:**
   ```bash
   npm run build
   php artisan serve
   ```
   Open your browser and navigate to `http://localhost:8000`.

---

## 📄 License
This project is open-source software licensed under the [MIT license](LICENSE).
