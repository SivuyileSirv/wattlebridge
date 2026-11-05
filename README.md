# Wattlebridge Technical Recruitment

A custom WordPress theme developed for Wattlebridge Technical Recruitment.

## Technology Stack

- WordPress 7.1.4 (verified local version)
- PHP 8.5.12 (verified local version)
- MariaDB 12.3.3 (verified local version)
- Docker and Docker Compose
- PHP, SCSS and vanilla JavaScript
- Advanced Custom Fields Pro (planned)

## Local Development

### Requirements

- Docker Desktop
- Docker Compose
- Git
- Node.js and npm (for front-end tooling)

### Getting Started

1. Clone the repository.
2. Copy `.env.example` to `.env`.
3. Set unique database passwords in `.env`.
4. Configure `WORDPRESS_PORT` if the default port is occupied.
5. Start the containers:

   ```bash
   docker compose up -d
   ```

6. Open `http://localhost:<WORDPRESS_PORT>`.
7. Complete the WordPress installation wizard.

### Useful Commands

Start the environment:

```bash
docker compose up -d
```

Stop the environment:

```bash
docker compose down
```

Check container status:

```bash
docker compose ps
```

View logs:

```bash
docker compose logs --tail=50
```

Check PHP:

```bash
docker compose exec wordpress php -v
```

## Project Structure

- `app/wp-content/themes/wattlebridge/` — custom WordPress theme
- `compose.yaml` — local Docker services
- `.env.example` — environment configuration template
- `.github/workflows/` — planned CI workflows

## Development Approach

The project uses a custom WordPress theme rather than a page builder.

The architecture will prioritize:

- Semantic, accessible HTML
- Modular PHP templates
- Reusable components
- SCSS with BEM naming conventions
- WordPress-native APIs
- Secure data handling
- Responsive layouts
- Maintainable code

## Deployment

The finished custom theme will be deployed to the existing staging WordPress installation.

The local Docker database and WordPress installation are not intended to replace the staging server's infrastructure.

## Status

Local Docker development environment configured successfully.

Theme development is the next milestone.
