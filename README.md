# Laravel Agent
## The [Agent] package seems to be incompatible with Laravel 11. Let's move forward with a different approach to achieve the desired functionality.
## Warning: This package is for [demonstration purposes / personal learning only]. Use at your own risk! It may have bugs or functionalities not suitable for production. 
## In Laravel versions below 11, you'll need to use **[Agent](https://github.com/jenssegers/agent)** recommended.
## Laravel Agent acts as a bridge between your Laravel application and the user's device, 
## allowing you to make informed decisions about how to present your content and interact with your users 
## based on the device they're using. This results in a more tailored and user-friendly experience for everyone.

## Focusing on Functionality:

- "Another package relies on the features provided by package-name above. We need to ensure it's included as a dependency."

## Installation

Install using composer:

```bash
composer require spinzar/laravel-agent
```

## Laravel (optional)

Add the service provider in `config/app.php`:

```php
Spinzar\LaravelAgent\AgentServiceProvider::class,
```

And add the LaravelAgent alias to `config/app.php`:

```php
'LaravelAgent' => Spinzar\LaravelAgent\Facades\LaravelAgent::class,
```

## Basic Usage

Start by creating an `LaravelAgent` instance (or use the `LaravelAgent` Facade if you are using Laravel):

```php
use Spinzar\LaravelAgent\LaravelAgent;

$larvaelagent = new LaravelAgent();
```

If you want to parse user agents other than the current request in CLI scripts for example, you can use the `setUserAgent` and `setHttpHeaders` methods:

```php
$larvaelagent->setUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2');
$larvaelagent->setHttpHeaders($headers);
```

### Is?

Check for a certain property in the user agent.

```php
$larvaelagent->is('Windows');
$larvaelagent->is('Firefox');
$larvaelagent->is('iPhone');
$larvaelagent->is('iPad');
$larvaelagent->is('OS X');
```

### Magic is-method

Magic method that does the same as the previous `is()` method:

```php
$larvaelagent->isAndroidOS();
$larvaelagent->isNexus();
$larvaelagent->isSafari();
```

### Mobile detection

Check for mobile device:

```php
$larvaelagent->isMobile();
$larvaelagent->isTablet();
```

### Match user agent

Search the user agent with a regular expression:

```php
$larvaelagent->match('regexp');
```

## Additional Functionality

### Accept languages

Get the browser's accept languages. Example:

```php
$languages = $larvaelagent->languages();
// ['nl-nl', 'nl', 'en-us', 'en']
```

### Device name

Get the device name, if mobile. (iPhone, Nexus, AsusTablet, ...)

```php
$device = $larvaelagent->device();
```

### Operating system name

Get the operating system. (Ubuntu, Windows, OS X, ...)

```php
$platform = $larvaelagent->platform();
```

### Browser name

Get the browser name. (Chrome, IE, Safari, Firefox, ...)

```php
$browser = $larvaelagent->browser();
```

### Desktop detection

Check if the user is using a desktop device.

```php
$larvaelagent->isDesktop();
```

_This checks if a user is not a mobile device, tablet or robot._

### Phone detection

Check if the user is using a phone device.

```php
$larvaelagent->isPhone();
```

### Robot detection

Check if the user is a robot. This uses [jaybizzle/crawler-detect](https://github.com/JayBizzle/Crawler-Detect) to do the actual robot detection.

```php
$larvaelagent->isRobot();
```

### Robot name

Get the robot name.

```php
$robot = $larvaelagent->robot();
```

### Browser/platform version

MobileDetect recently added a `version` method that can get the version number for components. To get the browser or platform version you can use:

```php
$browser = $larvaelagent->browser();
$version = $larvaelagent->version($browser);

$platform = $larvaelagent->platform();
$version = $larvaelagent->version($platform);
```

_Note, the version method is still in beta, so it might not return the correct result._

## License

Laravel User Agent is licensed under [The MIT License (MIT)](LICENSE).
