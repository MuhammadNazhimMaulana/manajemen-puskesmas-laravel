# Manajemen Puskesmas
<!-- Requirement -->
### Requirements
- WSL2 (For Docker)
- PHP 7.4^


First start with downloading all dependencies using 

```
composer update
```

Anda then you can copy **.env.example** into a file namede **.env** After that you may pass this command 

<!-- For linking the storage and public folder -->
```
php artisan storage:link
```

Move on, you will need to open your wsl terminal right in your computer and you have to open in the folder of the laravel project, after that you may pass this command

```
./vendor/bin/sail up
```

After this you may see that the app will start and you could visit **localhost/login/admin** for login as admin and you could use the app if you don't want to use docker is also okay for the development
