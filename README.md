# Website Arsa Jaya Prima

A Laravel-based company profile and training management website developed for **Arsa Jaya Prima (Arsa Training & Consulting)**. The application provides information about professional training programs, certification services, company profiles, and online registration for participants.

---

## Overview

Website Arsa Jaya Prima is designed to simplify the management and publication of training information. It includes an administration panel for managing training programs, schedules, galleries, articles, and participant registrations while providing visitors with an easy-to-use interface to explore available services.

---

## Features

- Company profile website
- Training program management
- Kemnaker RI certification programs
- BNSP certification programs
- Upskill training programs
- Training schedule management
- Online participant registration
- News and article management
- Gallery management
- Admin dashboard
- File and image upload
- Responsive user interface

---

## Tech Stack

| Technology | Description |
|------------|-------------|
| Laravel | PHP Framework |
| PHP | Backend Language |
| MySQL | Database |
| Blade | Template Engine |
| Bootstrap | Frontend Framework |
| JavaScript | Client-side Interaction |
| Vite | Asset Bundler |

---

## Project Structure

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

---

## Installation

Clone the repository.

```bash
git clone https://github.com/fahrezypurbaa/Website-Arsa-Jaya-Prima.git
```

Move into the project directory.

```bash
cd Website-Arsa-Jaya-Prima
```

Install dependencies.

```bash
composer install
npm install
```

Create the environment file.

```bash
cp .env.example .env
```

Generate the application key.

```bash
php artisan key:generate
```

Configure the database in the `.env` file, then run the required migrations or import the database backup.

Create the storage symlink.

```bash
php artisan storage:link
```

Run the development server.

```bash
npm run dev

php artisan serve
```

---

## Screenshots

> Screenshots will be added in a future update.

<img width="949" height="437" alt="image" src="https://github.com/user-attachments/assets/734521f2-b9c9-4a88-bf7e-fdde0a4d987d" />


## Notes

This repository does not include:

- `.env`
- Database dump
- Uploaded user files
- Production credentials

Please configure your own environment before running the project.

---

## Author

**Fahrezy Purba**

- GitHub: https://github.com/fahrezypurbaa
- LinkedIn: www.linkedin.com/in/fahrezyromeropurba 

---

## License

This project is intended for portfolio and educational purposes.
