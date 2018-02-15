# Setup & Build

### 1. Module install

```
$ composer install
$ 　npm i
```

### 2. Create ".env"

```
$ cp .env.example .env
```

### 3. Create "SQLite" & edit ".env"

```
$ touch database/database.sqlite
```

```
...
DB_CONNECTION=sqlite
...
```

### 4. Run migration

```
$ php artisan migrate
```

### 8. Seeding

```
$ php artisan db:seed
```

### 9. Start up local server

```
$ php artisan serve
```