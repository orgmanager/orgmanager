# Notes

## Toast Notification

```php
$notification = array(
	'message' => 'I am a successful message!', 
	'alert-type' => 'success'
);

return Redirect::to('/')->with($notification);
```
