# AgroDigital

This is an API-based application that manages a farm system, built using the Laravel framework.

## Key Features

- **Gerant**:
  - Manage fertigation and irrigation programs.
  - Manage workers and assign daily tasks.
  - View statistics on completed treatments and farm disease occurrences.

- **Workers**:
  - View daily tasks.
  - Provide reports after completing tasks.

- **Magazinier**:
  - Manage products.

## Installation

Clone the repository using this command:
```sh
git clone git@github.com:bouanani-soufiane/AgroDigital.git
```

Run the project:
```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

Add the .env file:
```sh
cp .env.example .env
```

Generate the application key:
```sh
./vendor/bin/sail artisan key:generate
```

Run the migrations:
```sh
./vendor/bin/sail artisan migrate
```

---

# Front-end here :
link : https://github.com/bouanani-soufiane/AgroDigitalFrontEnd
