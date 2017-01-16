# OrgManager
OrgManager allows Github Organizations to share link invites.

## You can access the hosted version at https://orgmanager.miguelpiedrafita.com.

## Introduction:

OrgManager was created as a personal project for learning Laravel, PHP and the Github API. This means, I am still learning Laravel, so they're probably lot's of things to improve. If you find one, please [open an issue](https://github.com/m1guelpf/orgmanager/issues/new) or better, [make a pull request](https://github.com/m1guelpf/orgmanager/pulls/compare).

## Features:

- Multi-user support: You can add all the organizations/users you want securely. In fact, anyone with a Github organization can use it if you expose it on the internet!
- Uses Github Style: OrgManager uses [PrimeCSS](http://primercss.io/) and [Octicons](https://octicons.github.com) for having a github-like style!
- Caching: OrgManager uses notification caching to reduce load time and provide you an awesome experience!
- More coming soon: OrgManager is under active developement so, if you want to help or have ideas, go ahead and Contribute!

## Requirements:

- PHP >= 5.6.4
- Composer
- MySQL
- MySQL PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Installation:

1. Clone or download this repo to somewhere on your server.
2. Rename .env.example to .env and fill the database settings.
3. Run ```composer update```, ```php artisan key:generate``` and ```php artisan migrate```.
4. [Create a Github OAuth app](https://github.com/settings/applications/new) using ```[YOUR_URL]/callback``` as the **Authorization callback URL** and add them to ```config/eloquent-oauth.php```. As this is complex, you can use the hosted version.
5. Enjoy!

## Status:

Actual version: [```v1.0```](https://github.com/m1guelpf/orgmanager/releases/v1.0)
Remember that you can always download the latest version using [this link](https://github.com/m1guelpf/orgmanager/releases/latest).

## TO DO:

You can check the [```v2.0``` milestone](https://github.com/m1guelpf/orgmanager/milestone/1) to get info about the status of the ```v2.0``` development.

Found an issue? Something to improve? [Open an issue](https://github.com/m1guelpf/orgmanager/issues/new)!

## Credits:

- [PHP](https://php.net) - For his awesome work on developing PHP.
- [MySQL](https://mysql.com) - For that awesome DB software.
- [Laravel](https://laravel.com) - For this awesome framework.
- [Github](https://github.com) - For his [API](https://developers.github.com/v3) and the awesome people at [Github Support](https://github.com/contact).
- [Adam Wathan](https://github.com/adamwathan) - For his [eloquent OAuth library](https://github.com/adamwathan/eloquent-oauth-l5).
- [KNP Labs](https://knplabs.com) - For his awesome [php-github-api](https://github.com/KnpLabs/php-github-api).
- [Graham Campbell](https://gjcampbell.co.uk/) - For his awesome [Laravel Github](https://github.com/GrahamCampbell/Laravel-GitHub).
- [Google](https://hithub.com/google) - For the [php ReCaptcha library](https://github.com/google/recaptcha).
