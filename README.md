# HSO
HSO project for freelancer
## Installation

1. Install dependencies

```bash
  composer install
```

2. Install NPM dependencies

```bash
  yarn
```
or
```bash
  npm install
```

3. Compile JS and Styles

```bash
  yarn mix
```
or
```bash
  npm run [dev\prod]
  # based on the environment
```

4. Config database and connection

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<DB Name>
DB_USERNAME=<YOUR CONNECTION USERNAME>
DB_PASSWORD=<YOUR CONNECTION PASSWORD>
```

5.Migrate and Seed

```bash
  php artisan migrate
```

6. Create admin by following the steps

```bash
  php artisan shield:super-admin
```

7. Generate policies for authorization

```bash
  php artisan shield:generate
```

8. Serve the project

```bash
  php artisan serve
```

9. Visit and login with credentials from step 6

```bash
  https://127.0.0.1:8000/admin
```
or <server address>/admin