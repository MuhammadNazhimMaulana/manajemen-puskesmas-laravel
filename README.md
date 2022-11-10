# Manajemen Puskesmas Laravel

<!-- Requirements -->
### Requirements
- WSL2 (For Docker)
- PHP 7.4^


Starting with downloading all vendor dependencies using this command

```
composer update
```

Anda then you can copy **.env.example** into a file namede **.env**  using this command:

```
cp .env.example .env
```

<!-- For linking the storage and public folder -->
After that you may pass this command 
```
php artisan storage:link
```

Move on, you will need to open your wsl terminal right in your computer and you have to open in the folder of the laravel project, after that you may pass this command

```
./vendor/bin/sail up
```

After this you may see that the app will start and you could visit **localhost/login/admin** for login as admin and you could use the app if you don't want to use docker is also okay for the development.
