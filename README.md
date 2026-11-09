# KapeTeria
### Coffee Shop Management System

**KapeTeria** is a web-based Coffee Shop Management System built to streamline and centralize the daily operations of a coffee shop. It provides dedicated workspaces for administrators, staff, and customers, bringing essential business operations into a single platform.

The system is designed to manage products, orders, inventory, and sales while providing a responsive and intuitive interface inspired by the atmosphere of a modern coffee shop.

> **Development Status:** Active Development  
> **Current Stage:** Prototype

---

## Overview

Running a coffee shop involves more than preparing and serving coffee. Managing products, monitoring inventory, processing orders, and keeping track of sales all require an organized workflow.

KapeTeria aims to simplify these responsibilities through a centralized management platform with role-based access and dedicated dashboards.

The system currently focuses on establishing its Laravel foundation, authentication infrastructure, reusable interface components, and initial dashboard prototypes. Development will progressively expand toward fully functional, database-connected business operations.

## Technology Stack

| Component | Technology |
|---|---|
| Backend | PHP / Laravel |
| Frontend | Blade Templates |
| Styling | Tailwind CSS |
| JavaScript | Vanilla JavaScript |
| Data Visualization | Chart.js |
| Database | MySQL / MariaDB |
| Build Tool | Vite |
| Typography | DM Sans, Playfair Display |

## Core Modules

The following modules define the intended scope of KapeTeria.

| Module | Description |
|---|---|
| Authentication | Secure login and role-based access |
| Dashboard | Operational statistics and business insights |
| Product Management | Create, update, and manage coffee shop products |
| Category Management | Organize products into categories |
| Order Management | Process and monitor customer orders |
| Inventory Management | Monitor stock levels and inventory movements |
| Sales & Reports | Track revenue, sales performance, and business activity |
| User Management | Manage administrator and staff accounts |
| Customer Workspace | Browse products and manage customer orders |

## User Roles

KapeTeria is designed around three primary user roles, each with its own workspace and responsibilities.

**Administrator (`admin`)**

- Manage staff and user accounts.
- Create and maintain products and categories.
- Monitor inventory and stock availability.
- Oversee customer orders.
- Access sales reports and business analytics.
- Manage system operations.

**Staff (`staff`)**

- Handle daily order processing.
- Assist with product-related operations.
- Perform inventory-related tasks.
- Access personal account information.

**Customer (`user`)**

- Browse available products.
- Place orders.
- View order history and order status.
- Manage personal account information.

## Current Development Progress

The project is currently transitioning from its foundational setup toward functional business modules.

| Feature | Status |
|---|---|
| Laravel Project Setup | Completed |
| Database Configuration & Migrations | In Progress |
| User Model & Role Structure | Implemented |
| User Authentication | Implemented |
| Login Interface | Implemented |
| Password Visibility Toggle | Implemented |
| Remember Me Functionality | Implemented |
| Logout Functionality | Integrated / Planned |
| Shared Header & Sidebar | Implemented |
| Shared Footer | Implemented |
| Responsive Sidebar | Implemented |
| Header Dropdown Interactions | Implemented |
| Admin Dashboard | Prototype |
| Dashboard KPI Cards | Prototype |
| Dashboard Charts | Prototype |
| Customer Dashboard | Pending |
| Staff Dashboard | Pending |
| Product Management | Pending |
| Category Management | Pending |
| Order Management | Pending |
| Inventory Management | Pending |
| Sales & Reporting | Pending |

*Development statuses reflect the current project documentation and implementation discussions. Some features remain prototypes and are not yet connected to actual business data.*

## Dashboard Workspaces

### Administrator Dashboard

The administrative dashboard is intended to provide an overview of the coffee shop's operations, including:

- Total sales and revenue.
- Order statistics.
- Inventory valuation.
- Low-stock notifications.
- Popular and best-selling products.
- Sales analytics and visual reports.

**Current status:** Interface prototype using mock data.

### Staff Dashboard

The staff workspace will focus on daily operational activities, particularly order handling and inventory-related responsibilities.

**Current status:** Pending development.

### Customer Dashboard

The customer-facing workspace will provide access to the product catalog, ordering functionality, order history, and account management.

**Current status:** Pending development.

---

## Design & Visual Identity

KapeTeria follows a warm, understated coffee-shop aesthetic, combining espresso-inspired dark surfaces with soft cream backgrounds and muted gold accents.

### Color Palette

| Color | Hex | Usage |
|---|---|---|
| Espresso | `#211812` | Sidebar and primary dark surfaces |
| Dark Coffee | `#2B1D15` | Secondary dark elements |
| Cream | `#F8F1E8` | Main workspace background |
| Gold | `#C99A62` | Primary accents and highlights |
| Beige | `#EAD0A8` | Secondary accents |
| Alert Red | `#B84A3A` | Warnings and important notifications |

**Typography**
- DM Sans — General interface typography.
- Playfair Display — Selected headings and editorial elements.

The interface prioritizes readability, responsive layouts, consistent components, and a visual identity that reflects the character of a contemporary coffee shop.

---

## Getting Started

Follow these instructions to set up a local development environment.

### Prerequisites

Make sure the following tools are installed:

- PHP (version compatible with the Laravel version used by the project).
- Composer.
- Node.js and npm.
- MySQL or MariaDB.
- Git.

### Installation

**1. Clone the repository**

```bash
git clone <repository-url>
```

**2. Navigate to the project directory**

```bash
cd KapeTeria
```

**3. Install PHP dependencies**

```bash
composer install
```

**4. Install frontend dependencies**

```bash
npm install
```

**5. Configure environment variables**

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

**6. Configure the database**

Update the database credentials in your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kapeteria
DB_USERNAME=root
DB_PASSWORD=
```

Create the corresponding database before proceeding.

**7. Run database migrations**

```bash
php artisan migrate
```

**8. Start the development servers**

Run the Laravel application:

```bash
php artisan serve
```

Run the Vite development server in a separate terminal:

```bash
npm run dev
```

The application should now be accessible at:

```text
http://127.0.0.1:8000
```

---

## Development Roadmap

The following development phases establish the planned direction of the project.

- [x] Establish Laravel project structure.
- [x] Implement authentication and user role structure.
- [x] Develop shared dashboard components.
- [x] Create initial administrator dashboard prototype.
- [ ] Finalize database schema and relationships.
- [ ] Implement product management.
- [ ] Implement category management.
- [ ] Develop customer ordering workflow.
- [ ] Implement order processing and status management.
- [ ] Develop inventory monitoring and stock adjustments.
- [ ] Connect dashboard analytics to actual database records.
- [ ] Develop staff workspace.
- [ ] Develop customer workspace.
- [ ] Implement sales reporting.
- [ ] Conduct functional, security, and responsive testing.
- [ ] Prepare production deployment.

---

## Project Structure

KapeTeria follows Laravel's conventional application structure.

```text
KapeTeria/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
│
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
│
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   ├── web.php
│   └── console.php
│
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── vite.config.js
```

*The structure above represents the conventional Laravel layout and may evolve as additional modules are introduced.*

---

## Project Goals

KapeTeria is being developed with the following objectives:

1. **Centralized Operations** — Bring essential coffee shop management activities into one system.
2. **Role-Based Access** — Provide appropriate tools and permissions for administrators, staff, and customers.
3. **Operational Efficiency** — Simplify order processing, product management, and inventory monitoring.
4. **Data-Driven Insights** — Provide meaningful sales statistics and operational analytics.
5. **Responsive Experience** — Maintain a consistent and accessible interface across different screen sizes.
6. **Maintainable Architecture** — Build a foundation that can accommodate additional features and future improvements.

---

## License

This project is currently under active development. Licensing and distribution terms have not yet been finalized.

---

**KapeTeria**  
*A better way to manage the daily grind.*
