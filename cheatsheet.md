![image](https://github.com/bakasibruceto/laravel-app/assets/95122978/f4119303-b706-423c-947a-0fe61e718f54)# Laravel 10

## Cuztomize Email Template Breeze
Type to Terminal

    php artisan vendor:publish
choose
> laravel-mail 12 <br />

> laravel-notifications 13

new vendor file will be inserted to `resoureces/views`

    php artisan make:notification classname

To cuztomize default breeze verify email and reset password

click vendor outside app folder and navigate

> vendor/laravel/framework/src/illuminate/Auth/notifications

you will find `ResetPassword.php` and `VerifyEmail.php`
		
copy the code insde the class and copy necessary use cases to your new notification file

go to user model add

    class User extends Authenticatable implements MustVerifyEmail


    public function sendPasswordResetNotification($token){
        $this->notify(new NewResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification(){
        $this->notify(new NewEmailVerificationNotification);
    }


