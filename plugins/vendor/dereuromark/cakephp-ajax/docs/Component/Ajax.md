# Ajax Component
This component works together with the AjaxView to easily switch output type from HTML to JSON
format and adds some additional sugar on top.
Please see the View class docs for the main documentation.

## Features
By default the CakePHP RequestHandler, when included, will prevent redirects in AJAX, **but** it will
follow those redirects and return the content via requestAction(). This might not always be desired.

## Usage

```php
$components = array('Ajax.Ajax');
```

You can pass the settings either directly inline here, or use Configure to set them globally.

This component will avoid those redirects completely and pass those down as part of the content of the JSON response object:

	"_redirect":{"url":"http://controller/action","status":200}, ...

Flash messages are also caught and passed down as part of the response:

	"_message":{"success":["Yeah, that was a normal POST and redirect (PRG)."]}, ...

Don't forget `Configure::write('Ajax.flashKey', 'FlashMessage');`
if you want to use it with Tools.Flash component (multi/stackable messages).

You can pass content along with it, as well, those JSON response keys will not be prefixed with a `_` underscore then, as they
are not reserved:

	$content = array('id' => 1, 'title' => 'title');
	$this->Controller->set(compact('content'));
	$this->Controller->set('_serialize', array('content'));

results in

	"content":{...}, ...

## Configs

- 'autoDetect' => true // Detect AJAX automatically, regardless of the extension
-	'resolveRedirect' => true // Send redirects to the view, without actually redirecting
- 'flashKey' => 'Message.flash' // Use "FlashMessage" for Tools plugin Flash component, set to false to disable

