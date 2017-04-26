install
add in composer.json
```
"require": {
        "ulogin/modulse": "@dev"
    }
    ....
    "repositories": [
            {
                "type": "git",
                "url": "https://github.com/ivankoTut/laravel-ulogin.git"
            }
        ],
```
add in providers /config/app.php

```
Ulogin\Modulse\ServiceProvider::class
```

public vendors
```
php artisan vendor:publish
```
run migration 
```
php artisan migrate
```
include Ulogin form in template
```
@include('ulogin::form')
```
include Ulogin confirm form in template
```
@include('ulogin::confirm_form')
```
add trait in user model
```
use Ulogin\Modulse\Helpers\UloginTrait;

class User extends Authenticatable
{
    use UloginTrait;
    ....
}
```