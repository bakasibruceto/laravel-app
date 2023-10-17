Laravel 10

## Cuztomize Email Template Breeze
Type to Terminal

    php artisan vendor:publish
choose
> laravel-mail 12 <br />

> laravel-notifications 13

new vendor file will be inserted to `resoureces/views`

Will create a notifcation folder inside app and create class

    php artisan make:notification classname

To cuztomize default breeze verify email and reset password

click vendor outside app folder and navigate

> vendor/laravel/framework/src/illuminate/Auth/notifications

you will find `ResetPassword.php` and `VerifyEmail.php`
		
copy the code insde the class and copy necessary use cases to your new notification file

go to user model add to class

    class User extends Authenticatable implements MustVerifyEmail

add use case

    use App\Notifications\NewEmailVerificationNotification;
    use App\Notifications\NewResetPasswordNotification;

add code inside class


    public function sendPasswordResetNotification($token){
        $this->notify(new NewResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification(){
        $this->notify(new NewEmailVerificationNotification);
    }


