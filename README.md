<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Database Create Table and Migration

`php artisan make:migration users_table`

New file will be make automatically in path ./database/migrations. Then to migrate all of the migration table write this command below on prompt.

`php artisan migrate`

## License

This portfolio is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Reference

1.) Retrieve all data from database and get data by id
https://www.fundaofwebit.com/laravel-8/how-to-fetch-data-from-database-in-laravel
2.) Add existing project to Github
https://www.digitalocean.com/community/tutorials/how-to-push-an-existing-project-to-github

## Error

When build this portfolio, I found several error, there are :
1.) SQLSTATE[01000]: Warning: 1265 Data truncated for column 'role'
Solution : https://www.javatpoint.com/mysql-enum#:~:text=The%20ENUM%20data%20type%20in%20MySQL%20is%20a,may%20have%20one%20of%20the%20specified%20possible%20values.
2.) Target Class does not exist
Solution : https://laravel.com/docs/8.x/releases
3.) BadMethodCallException: Call to undefined method App\Models\User::table()
Solution : https://www.fundaofwebit.com/laravel-8/how-to-fetch-data-from-database-in-laravel