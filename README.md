## Job Search Portal Plan

This project is moving from a simple job scraping script to a job search portal.

### Target stack

- Backend: Laravel
- Frontend: Inertia + Vue
- Database: PostgreSQL
- Styling: simple, clean UI with good spacing and readable typography

### MVP scope

Start with these core tables:

- users
- companies
- jobs
- saved_searches

### What the database is for

The database will store:

- job listings and their publish dates
- company details
- user accounts
- saved filters and search preferences
- future alert and notification data

### Main features

- search jobs by date of publishment
- filter by experience level
- filter by field of expertise like CE, SE, and similar categories
- filter by specific conditions like remote, hybrid, visa, contract, or salary range
- save searches for later use

### UI direction

Keep the interface simple but polished:

- a clear search bar at the top
- filter panel on desktop
- filter drawer on mobile
- job cards instead of dense tables
- saved searches in the user dashboard
- plenty of spacing and calm colors

### Build plan

1. Create the Laravel project with Composer.
2. Configure PostgreSQL.
3. Install Inertia and Vue.
4. Create the base layout and navigation.
5. Build the `users`, `companies`, `jobs`, and `saved_searches` migrations.
6. Add models and relationships.
7. Create job listing and job detail pages.
8. Add search and filter controls.
9. Add the saved searches feature.
10. Polish the UI and test the core flow.

### Suggested first command

```bash
composer create-project laravel/laravel job-search-portal
```

From there, install Inertia, Vue, and PostgreSQL configuration.
