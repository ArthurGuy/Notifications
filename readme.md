# Notifications

## Installation

First, pull in the package through Composer.

```js
"require": {
    "arthurguy/notifications": "~1.0"
}
```

And then, if using Laravel 5, include the service provider within `app/config/app.php`.

```php
'providers' => [
    'ArthurGuy\Notifications\NotificationServiceProvider'
];
```

And, for convenience, add a facade alias to this same file at the bottom:

```php
'aliases' => [
    'Flash' => 'ArthurGuy\Notifications\NotificationFacade'
];
```

## Usage

Within your controllers, before you perform a redirect...

```php
public function store()
{
    Notification::message('Welcome Aboard!');

    return Redirect::home();
}
```

You may also do:

- `Notification::info('Message')`
- `Notification::success('Message')`
- `Notification::error('Message')`
- `Notification::warning('Message')`

Again, if using Laravel, this will set a few keys in the session:

- 'flash_notification.message' - The message you're flashing
- 'flash_notification.details' - A MessageBag object, ideal for field error messages
- 'flash_notification.level' - A string that represents the type of notification (good for applying HTML class names)

Alternatively, again, if you're using Laravel, you may reference the `flash()` helper function, instead of the facade. Here's an example:

```
/**
 * Destroy the user's session (logout).
 *
 * @return Response
 */
public function destroy()
{
    Auth::logout();

    notification()->success('You have been logged out.');

    return home();
}
```

Or, for a general information flash, just do: `notification('Some message');`.

With this message flashed to the session, you may now display it in your view(s). Maybe something like:

```html
@if (Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ Session::get('flash_notification.message') }}
    </div>
@endif
```

