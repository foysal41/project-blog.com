@component('mail::message')
    <p>hello {{ $user->name }}</p>
    <p>We understand it happens. To reset your password click the button below</p>

 @component('mail::button',['url'=>url('reset/' .$user->remember_token)])Reset Your Password
 @endcomponent   

 <p>In case you have issue please our contact us </p>
 Thanks <br>
 {{ config('app.name') }}
 
@endcomponent