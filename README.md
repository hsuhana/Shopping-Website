# Shopping Website

This project is a shopping website where visitors can register as members, browse products, and make purchases. The website also includes an admin interface for managing products and user data.

## Live Demo
You can visit the live website here: http://wood.42web.io/index.php?i=1

---

## Features

### User Features
- **Registration**: Users can create an account on the website.
- **Login/Logout**: Users can log in to access member-exclusive features and log out when done.
- **Product Browsing**: View and explore the products available for purchase.
- **Cart Management**: Add products to the shopping cart and update or remove items.
- **Account Management**: Update user account details.

### Admin Features
- **Product Management**: Add, update, and delete products.
- **User Management**: Manage user data and accounts.

---

## Project Structure

### Files and Folders

- **admin/**
  - `add_product.php`: Page for the admin to add new products.

- **css/**: Folder containing CSS files for styling the website.

- **image/**: Folder containing images used in the website.

- **page_structure/**
  - `connection.php`: Database connection setup.
  - `footer.php`: Footer included on pages.
  - `header.php`: Header included on pages.

- **product_images/**: Folder containing images of the products.

- **Database and Functionality**
  - `common_function.php`: Common functions used across the project.
  - `create_database_table.sql`: SQL script to set up the database tables.

- **Account Management**
  - `account_record.php`: Displays user account details.
  - `edit_account.php`: Allows users to edit their account details.
  - `delete_account.php`: Allows users to delete their account.

- **Cart Management**
  - `cart.php`: Displays the shopping cart.
  - `update_cart.php`: Allows users to update the items in their cart.
  - `delete_cart.php`: Removes items from the cart.

- **Authentication**
  - `login.html`: Login page (HTML).
  - `login.php`: Login processing script.
  - `logout.php`: Log out functionality.
  - `register.html`: Registration page (HTML).
  - `register.php`: Registration processing script.

- **Other Pages**
  - `index.php`: Main landing page of the website.

---

## Getting Started

### Prerequisites
1. **Web Server**: Ensure you have a web server like Apache or Nginx installed.
2. **PHP**: Install PHP to run the server-side code.
3. **MySQL**: Set up a MySQL database.

### Installation Steps
1. Clone the repository:
   ```bash
   git clone [repository_url]
   ```
2. Upload the project files to your web server's root directory.
3. Set up the database:
   - Import `create_database_table.sql` into your MySQL database.
   - Update `connection.php` with your database credentials.
4. Start the web server and access the website at `http://localhost` or your server's domain.

---

## Technologies Used
- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
