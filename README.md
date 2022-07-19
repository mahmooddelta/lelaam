# Lelaam.af

## Installation

1. Install dependencies
```bash
    composer install
```

2. Install NPM dependencies
```bash
    npm install
```

## Building

3. Compile JS and Styles
```bash
    # based on the environment
    # For development
    npm run dev
    # For production
    npm run build
```

## Config

4. Config database and connection
```bash
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=DB Name
    DB_USERNAME=YOUR CONNECTION USERNAME
    DB_PASSWORD=YOUR CONNECTION PASSWORD
```

## Data preparation

5. Migrate and Seed
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

## Credentials config

8. Update pusher credentials
```bash
    PUSHER_APP_ID=APP ID
    PUSHER_APP_KEY=APP_KEY
    PUSHER_APP_SECRET=APP_SECRET
    PUSHER_APP_CLUSTER=APP_CLUSTER
```

9. Update Google Analytics View Key
```bash
    ANALYTICS_VIEW_ID=VIEW_ID
```

## JWT Config for API

10. Generate JWT secret key
```bash
    php artisan jwt:secret
```

11. Generate JWT certificate
```bash
    php artisan jwt:generate-certs
```
