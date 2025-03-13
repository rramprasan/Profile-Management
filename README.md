🎯 **Profile Management System**

📌 **Introduction**
This is a Profile Management System built using Laravel 12 and Bootstrap 5.3.3. The system allows administrators to manage user profiles, assign categories and subcategories, and provide role-based access control.

🚀 **Features**
✔️ User Authentication (Admin & User roles)
✔️ Profile Management (CRUD operations)
✔️ Category and Subcategory Assignment
✔️ Role-based Access Control
✔️ User Profile Image Slider on Homepage

🛠️ **Tech Stack**
- **Backend:** Laravel 10
- **Database:** MySQL
- **Frontend:** Blade Templates with Bootstrap 5.3.3

📖 **Installation Guide**

✅ **Prerequisites**
Ensure you have the following installed:
- PHP 8.1+
- Composer
- MySQL
- Laravel 10

📂 **Step 1: Clone the Repository**
```bash
git clone https://github.com/your-repo-url
cd profile-management-system
```

📦 **Step 2: Install Dependencies**
```bash
composer install
npm install
npm run dev
```

⚙️ **Step 3: Create Environment File**
```bash
cp .env.example .env
```
Update the `.env` file with your database details.

🏗️ **Step 4: Create Database**
Manually create a new database with the following details:
- **Database Name:** profile_management
- **Collation:** utf8mb4_unicode_ci

Run migrations:
```bash
php artisan migrate --seed
```

🔑 **Step 5: Generate Application Key**
```bash
php artisan key:generate
```

🚀 **Step 6: Run the Server**
```bash
php artisan serve
```

🔗 **API Routes**

📌 **User Routes**
- **Login:** POST `/login`
- **Register:** POST `/register`
- **Forgot Password:** POST `/password/request`
- **Reset Password:** POST `/password/reset`

💼 **Admin Routes**
- **Manage Users:** CRUD Operations
- **Manage Categories & Subcategories:** CRUD Operations
- **Assign Roles and Permissions**

🔐 **Admin Login Credentials**
- **Email:** admin@gmail.com
- **Password:** admin123

📜 **License**
This project is open-sourced software licensed under the MIT License.

🎯 **Want to contribute?**
Feel free to fork this repository, open issues, or submit pull requests to enhance the project! 🚀

