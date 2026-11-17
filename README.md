# Wattlebridge Technical Recruitment

A bespoke WordPress theme developed for Wattlebridge Technical Recruitment as part of a practical development assessment.

The project focuses on a custom-built, responsive homepage with modular PHP templates, self-hosted typography, Secure Custom Fields (SCF) integration and lightweight JavaScript interactions.

The theme is built without a page builder or front-end JavaScript framework.

## Technology Stack

- WordPress — minimum version 6.6
- PHP — minimum version 8.2
- MariaDB — local database
- Docker and Docker Compose — local development
- Secure Custom Fields (SCF) — editable theme content
- Sass (SCSS) and PostCSS — stylesheets
- Vanilla JavaScript — navigation and button interactions
- Node.js 24+ and npm — front-end tooling
- Git — version control

## Implemented Features

### Homepage

The homepage currently contains four custom sections:

1. Hero
2. Our Approach
3. Services
4. Pathways

Each section is implemented as a separate PHP template part with its own SCSS module.

### Theme Functionality

- Custom responsive header and navigation
- Responsive footer with editable SCF content
- Self-hosted DM Sans and DM Serif Display fonts
- Reusable button styles and position-aware hover animation
- WordPress navigation menu locations
- Custom theme favicon
- Responsive layouts and typography
- Accessible HTML foundations and keyboard interaction support
- Modular PHP, SCSS and JavaScript architecture

Additional page templates, components and animation modules are reserved for future development.

## Project Structure

The Git repository contains the Docker configuration and custom theme.

```text
wattlebridge/
├── .github/
├── app/
│   └── wp-content/
│       └── themes/
│           └── wattlebridge/
│               ├── acf-json/
│               ├── assets/
│               │   ├── fonts/
│               │   ├── images/
│               │   ├── js/
│               │   └── scss/
│               ├── inc/
│               ├── template-parts/
│               ├── functions.php
│               ├── front-page.php
│               ├── header.php
│               ├── footer.php
│               ├── package.json
│               └── style.css
├── .env.example
├── compose.yaml
└── README.md
```

## Local Development

### Prerequisites

Install:

- Docker Desktop with Docker Compose
- Git
- Node.js 24 or newer
- npm

### 1. Clone the Repository

```bash
git clone <repository-url>
cd wattlebridge
```

### 2. Configure Environment Variables

Copy `.env.example` to `.env`.

Set unique database credentials and configure `WORDPRESS_PORT` to an available local port.

The `.env` file is excluded from version control.

### 3. Start WordPress

From the repository root:

```bash
docker compose up -d
```

Check the containers:

```bash
docker compose ps
```

Open WordPress at the configured local port and complete the installation if necessary.

### 4. Install Front-End Dependencies

Navigate to the theme directory:

```bash
cd app/wp-content/themes/wattlebridge
npm ci
```

`package-lock.json` is included to support reproducible dependency installation.

### 5. Build the Stylesheets

```bash
npm run build
```

This compiles Sass and applies PostCSS/Autoprefixer.

The generated stylesheet is located at:

```text
assets/dist/main.css
```

The `assets/dist/` directory is excluded from Git and must be generated after cloning or included in a deployment package.

### 6. Start the Development Watchers

```bash
npm run dev
```

This starts the Sass watcher and BrowserSync.

The BrowserSync proxy is currently configured for the original local development environment at `http://localhost:56946`, with BrowserSync listening on port 3000.

Update the proxy URL in `package.json` if your WordPress installation uses a different port.

On Windows PowerShell, use `npm.cmd` instead of `npm` if the PowerShell execution policy blocks `npm.ps1`.

## WordPress Configuration

### Theme Activation

In the WordPress dashboard:

1. Open Appearance → Themes.
2. Activate Wattlebridge.
3. Configure the primary and footer navigation menus.

### Homepage

Create a WordPress page for the homepage.

Navigate to Settings → Reading and select a static homepage.

The theme uses `front-page.php` to render the homepage sections.

### Secure Custom Fields

Install and activate a compatible version of Secure Custom Fields (SCF).

Field-group definitions are maintained in the theme's `acf-json/` directory.

Check the SCF administration interface for any field groups requiring synchronization.

The theme also registers a Footer Settings options page through the SCF/ACF API.

The homepage editor is configured to use the Classic Editor interface while other pages retain the WordPress block editor.

### Content and Database

Git tracks the theme source and field-group JSON definitions, not the complete WordPress database.

Homepage content, menu assignments, uploaded media and SCF field values may need to be configured separately.

A fresh WordPress installation will therefore not necessarily reproduce the populated assessment homepage without the corresponding content.

## Development Commands

From the theme directory:

| Command               | Purpose                             |
| --------------------- | ----------------------------------- |
| `npm ci`              | Install locked dependencies         |
| `npm run build`       | Compile Sass and run PostCSS        |
| `npm run css:compile` | Compile Sass                        |
| `npm run css:prefix`  | Apply PostCSS                       |
| `npm run dev`         | Start Sass and BrowserSync watchers |

From the repository root:

| Command                                | Purpose                     |
| -------------------------------------- | --------------------------- |
| `docker compose up -d`                 | Start local containers      |
| `docker compose down`                  | Stop containers             |
| `docker compose ps`                    | Inspect container status    |
| `docker compose logs --tail=50`        | View container logs         |
| `docker compose exec wordpress php -v` | Check container PHP version |

## Deployment Notes

The custom theme is intended to be deployed to an existing WordPress staging environment.

Before deployment:

- Ensure the target WordPress and PHP versions meet the theme requirements.
- Install and configure SCF.
- Build the production stylesheet.
- Transfer the theme files, including compiled CSS.
- Synchronize the required field groups and configure content.
- Verify navigation, links, responsive layouts and interactive elements.

The local Docker database and WordPress installation are development resources and are not intended to replace the staging infrastructure.

## Current Status

The assessment homepage and supporting theme functionality have been implemented.

The repository also retains scaffolding for additional pages, reusable components and future enhancements.

Further development and quality assurance can continue independently of the assessment submission.
