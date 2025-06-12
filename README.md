<h1 align="left">Dukatools</h1>

<div align="left">
    <p>Kenya Business Directory</p>
    <p>Sales & Inventory</p>
    <p>Point of sale</p>
    <p>E-commerce & Payments</p>
    <p>Order Management</p>
    <p>Blog</p>
    <p>Admin/Vendor/User Dashboards</p>
</div>

## About Dukatools Project
Dukatools is an application to help business owners and entrepreneurs to digitize the selling process by recording sales, monitoring inventory,digitizing records and showcasing their business in the business directory.

Although the initial project will be private, the components will be published in open-source later.


---

## **Dukatools Software Specification Document**

### Version: 1.0

**Author:** [Francis Njuguna](https://github.com/mwanginjuguna)
**Date:** Oct 8, 2024

### License

Dukatools is an open-source project licensed under the [Apache 2.0 License](https://www.apache.org/licenses/LICENSE-2.0).

## Dukatools Use Case Checklist Table

| Module                 | Use Case Description                               | Admin | Vendor | User/Public | Testable |
| ---------------------- | -------------------------------------------------- | :---: | :----: | :---------: | :------: |
| **Authentication**     | Register a new account                             |       |    ✅   |      ✅      |     ✅    |
|                        | Login/Logout                                       |   ✅   |    ✅   |      ✅      |     ✅    |
|                        | Password reset                                     |   ✅   |    ✅   |      ✅      |     ✅    |
|                        | Email verification                                 |   ✅   |    ✅   |      ✅      |     ✅    |
| **Business Directory** | View list of businesses                            |       |        |      ✅      |     ✅    |
|                        | Search/filter businesses                           |       |        |      ✅      |     ✅    |
|                        | View a single business profile                     |       |        |      ✅      |     ✅    |
|                        | Create a business profile                          |   ✅   |    ✅   |             |     ✅    |
|                        | Edit business profile                              |   ✅   |    ✅   |             |     ✅    |
|                        | Approve or reject new businesses                   |   ✅   |        |             |     ✅    |
|                        | Claim an existing business                         |   ✅   |    ✅   |             |     ✅    |
| **Sales**              | View sales dashboard                               |   ✅   |    ✅   |             |     ✅    |
|                        | Record a sale (manual entry)                       |       |    ✅   |             |     ✅    |
|                        | View sales report (date/product/vendor)            |   ✅   |    ✅   |             |     ✅    |
|                        | Export sales data to CSV                           |   ✅   |    ✅   |             |     ✅    |
| **Inventory**          | Add new inventory item                             |   ✅   |    ✅   |             |     ✅    |
|                        | Edit inventory item                                |   ✅   |    ✅   |             |     ✅    |
|                        | Delete inventory item                              |   ✅   |    ✅   |             |     ✅    |
|                        | Low stock alert                                    |       |    ✅   |             |     ✅    |
|                        | View inventory list                                |   ✅   |    ✅   |             |     ✅    |
|                        | Filter by category or supplier                     |       |    ✅   |             |     ✅    |
| **POS**                | Access POS interface                               |       |    ✅   |             |     ✅    |
|                        | Add product to cart (POS)                          |       |    ✅   |             |     ✅    |
|                        | Complete POS sale with payment method              |       |    ✅   |             |     ✅    |
|                        | Print/email receipt                                |       |    ✅   |             |     ✅    |
| **E-commerce**         | View online store                                  |       |        |      ✅      |     ✅    |
|                        | Add product to cart                                |       |        |      ✅      |     ✅    |
|                        | Checkout and pay                                   |       |        |      ✅      |     ✅    |
|                        | View order history                                 |       |        |      ✅      |     ✅    |
|                        | Manage online products                             |       |    ✅   |             |     ✅    |
|                        | Mark product as out of stock                       |       |    ✅   |             |     ✅    |
| **Order Management**   | View orders received                               |   ✅   |    ✅   |             |     ✅    |
|                        | Change order status (pending, delivered, canceled) |   ✅   |    ✅   |             |     ✅    |
|                        | Notify customer about order updates                |       |    ✅   |             |     ✅    |
|                        | Assign delivery personnel                          |   ✅   |        |             |     ✅    |
|                        | User tracks order status                           |       |        |      ✅      |     ✅    |
| **Blog**               | View blog listing                                  |       |        |      ✅      |     ✅    |
|                        | Read a single blog post                            |       |        |      ✅      |     ✅    |
|                        | Create blog post                                   |   ✅   |    ✅   |             |     ✅    |
|                        | Edit blog post                                     |   ✅   |    ✅   |             |     ✅    |
|                        | Delete blog post                                   |   ✅   |    ✅   |             |     ✅    |
|                        | Schedule a blog post                               |   ✅   |    ✅   |             |     ✅    |
| **Dashboards**         | View admin dashboard (user stats, revenue, logs)   |   ✅   |        |             |     ✅    |
|                        | View vendor dashboard (sales, inventory, orders)   |       |    ✅   |             |     ✅    |
|                        | View user dashboard (orders, saved businesses)     |       |        |      ✅      |     ✅    |
|                        | Manage profile and settings                        |   ✅   |    ✅   |      ✅      |     ✅    |
| **System Management**  | Manage users (ban, promote, delete)                |   ✅   |        |             |     ✅    |
|                        | View logs and activity history                     |   ✅   |        |             |     ✅    |
|                        | Configure system settings (currency, location)     |   ✅   |        |             |     ✅    |


---

## **1. Introduction**

### 1.1. Purpose

Dukatools is a comprehensive web-based platform designed to empower small business owners and entrepreneurs in emerging markets by digitizing their operations. The platform integrates business listing, inventory control, sales tracking, order management, blogging, and payment solutions within an intuitive, modular dashboard system.

### 1.2. Scope

This document outlines the functional and technical specifications of the Dukatools platform. The system will be deployed initially as a private MVP with plans to open-source components in future releases.

---

## **2. System Overview**

### 2.1. Target Users

* Small and medium business owners
* Vendors and store managers
* Customers (general public)
* System administrators

### 2.2. Key Features

* Business Directory
* Sales and Transactions Management
* Inventory Tracking
* Point of Sale (POS)
* E-commerce and Online Payments
* Order Processing
* Content Publishing (Blog)
* Role-Based Dashboards (Admin, Vendor, User)

---

## **3. Functional Modules**

### 3.1. Business Directory

* Public and searchable listing of registered businesses
* Categories, tags, and location-based filtering
* Business profile pages with contact info, services, and photos
* Claim or register a business workflow

### 3.2. Sales Management

* Record manual and automated sales
* Track sales per day, per product, or per store
* Filter and export sales reports
* Integration with POS and inventory

### 3.3. Inventory Management

* Add/update/delete inventory items
* Quantity tracking and stock alerts
* Product categorization (e.g., perishable, service, digital)
* Supplier records and purchase history

### 3.4. Point of Sale (POS)

* Easy-to-use cashier interface
* Barcode scanner support
* Print receipts or email to customers
* Multi-user support for store branches
* Offline-first support (optional)

### 3.5. E-commerce & Payments

* Online store with cart and checkout
* Accept mobile money, card, and cash on delivery
* Product management (photos, variants, prices)
* Customer portal to track orders and download receipts

### 3.6. Order Management

* Centralized order dashboard
* Change order status (pending, processing, delivered, canceled)
* Notify customers of order changes
* Assign delivery agents or pick-up stations

### 3.7. Blog Module

* Admin and vendor ability to publish posts
* Rich text editor, tags, categories
* Commenting system
* Post scheduling and draft saving

### 3.8. Dashboards

* **Admin Dashboard:**

  * Platform analytics
  * User management
  * Revenue reports
  * Module configuration
* **Vendor Dashboard:**

  * Store-specific stats
  * Manage products, orders, and content
* **User Dashboard:**

  * Purchase history
  * Saved businesses and blog posts

---

## **4. Technical Specification**

### 4.1. Tech Stack

* **Backend:** Laravel 10+
* **Frontend:** Blade + Tailwind CSS (Alpine.js for interactivity)
* **Database:** MySQL/SQLite
* **Authentication:** Laravel Breeze & Sanctum (API)
* **Payments:** Integration with M-PESA, Stripe, PayPal
* **Hosting:** VPS/VM cloud hosting (DigitalOcean)

### 4.2. APIs

* RESTful APIs for mobile & external service integrations
* Sanctum API token authentication with rate-limiting

---

## **5. Non-Functional Requirements**

* **Scalability:** Designed to support thousands of concurrent users
* **Security:** Follows OWASP standards, HTTPS, CSRF protection
* **Usability:** Mobile-first, responsive design
* **Localization:** Support for multiple currencies and translation
* **Performance:** Optimized queries and asset bundling

---

## **6. Data Models (Simplified)**

### 6.1. Business

```text
- id
- name
- description
- location
- category_id
- owner_id
```

### 6.2. Product

```text
- id
- name
- sku
- quantity
- price
- vendor_id
- category_id
```

### 6.3. Sale

```text
- id
- product_id
- user_id
- quantity
- total_amount
- payment_method
- sale_date
```

(Other models: Order, BlogPost, User, Transaction, etc.)

---

## **7. Milestones & Roadmap**

| Milestone              | Timeline |
| ---------------------- | -------- |
| Module Setup & Routing | Week 1–2 |
| Dashboard UIs          | Week 3–4 |
| Sales, Inventory, POS  | Week 5–6 |
| E-commerce Integration | Week 7–8 |
| Blog & Directory       | Week 9   |
| QA and Launch          | Week 10  |

---

## **8. Licensing**

This project is released under the **Apache 2.0 License**. Individual modules may be published open-source under the same license in the future.

---

