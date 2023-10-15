# Laravel 10

## Cuztomize Email Template
Type to Terminal
    php artisan vendor:publish
> laravel-mail 12 <br />
> laravel-notifications 13

new vendor file will be inserted to `resoureces/views`

    php artisan make:notification classname

For verify email and reset password

> click vendor outside app folder

    vendor/laravel/framework/src/illuminate/Auth/notifications

you will find `ResetPassword.php` and `VerifyEmail.php`
		
copy the code insde the class and copy necessary use cases to you new notification file

go to user model add and modify the code


    public function sendPasswordResetNotification($token){
        $this->notify(new NewResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification(){
        $this->notify(new NewEmailVerificationNotification);
    }


