# WoodCraft


## Features

- **Web-Based Platform** — Access the application through a web browser.
- **Structured Architecture** — Organized application, database, public assets, and routing directories.
- **Database Integration** — A dedicated database layer for managing application data.
- **User-Friendly Interface** — A foundation for an accessible and intuitive browsing experience.
- **Maintainable Codebase** — Organized project structure designed to support future development.

## Tech Stack

The project uses a web application architecture with the following components:

- **Backend:** Laravel / PHP
- **Frontend:** Web technologies
- **Database:** Configured database system
- **Version Control:** Git and GitHub

## Project Structure

```text
WoodCraft/
├── app/          # Application logic
├── database/     # Database migrations, seeders, and factories
├── public/       # Public assets and application entry point
├── routes/       # Application routes
└── README.md     # Project documentation
```

## Getting Started

### Prerequisites

Make sure you have the following installed:

- PHP
- Composer
- Node.js and npm, if frontend dependencies are required
- A supported database configured for the project
- Git

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/AltinKonjusha/WoodCraft.git
   ```

2. Navigate to the project directory:

   ```bash
   cd WoodCraft
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Create your environment configuration:

   ```bash
   cp .env.example .env
   ```

   On Windows, you can also copy `.env.example` to `.env` manually.

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure your database connection in the `.env` file.

7. Run database migrations:

   ```bash
   php artisan migrate
   ```

8. If the project includes frontend dependencies, install them:

   ```bash
   npm install
   ```

9. Start the development server:

   ```bash
   php artisan serve
   ```

10. Open the local URL displayed in your terminal, usually `http://127.0.0.1:8000`.
