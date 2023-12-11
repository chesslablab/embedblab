## Visualization

Data analysis tool and tutor to learn chess.

### Install and Setup

Create an `.env` file.

```
cp .env.example .env
```

Install the Composer packages.

```
composer install
```

### Run the App

Using PHP's built-in webserver.

```
php -S localhost:8080 -t public
```

Using Docker:

```
docker compose -f docker-compose.prod.yml up -d
```

### File Permissions

Make sure that nginx has write permissions to the `public/assets/img` folder.

```
sudo chown $USER:www-data public/assets/img
```

### Contributions

See the [contributing guidelines](https://github.com/chesslablab/coach/blob/main/CONTRIBUTING.md).

Happy learning and coding!
