# ROCS - Symfony 5.*


Launch your server and read the instructions.

## Requirements

- Php ^7.2 http://php.net/manual/fr/install.php;
- Composer https://getcomposer.org/download/;
- Yarn https://classic.yarnpkg.com/en/docs/install/#debian-stable;
- Node https://nodejs.org/en/;

## Installation

1. Clone the current repository.

2. Move into the directory and create an `.env.local` file.
   **This one is not committed to the shared repository.**
   Set `db_name` to **inspire_expire**.

3. Execute the following commands in your working folder to install the project:

```bash
# Install dependencies
composer install
yarn install

# Create 'inspire_expire' DB
php bin/console doctrine:database:create

# Execute migrations and create tables
php bin/console doctrine:migrations:migrate

# Load fixtures
php bin/console doctrine:fixtures:load
```

> Reminder: Don't use composer update to avoid problem

## Usage

Run `yarn encore dev` to build assets

Run `php -S localhost:8000 -t public` or `symfony server:start` to launch server

### Testing

1. Run `.vendor/bin/phpcs` to launch PHP code sniffer
2. Run `.vendor/bin/phpstan analyse src --level max` to launch PHPStan
3. Run `.vendor/bin/phpmd src text phpmd.xml` to launch PHP Mess Detector
3. Run `./node_modules/.bin/eslint assets/js` to launch ESLint JS linter
3. Run `../node_modules/.bin/sass-lint -c sass-linter.yml -v` to launch Sass-lint SASS/CSS linter

### Windows Users

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command :

`git config --global core.autocrlf true`


## Authors

Benos Jean Loic
