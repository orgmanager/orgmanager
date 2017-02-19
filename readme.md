# OrgManager
<p align="center">

  <img src="http://i.imgur.com/KwXdDeX.png" alt="OrgManager">
</p>

OrgManager allows Github Organizations to share link invites.

## You can access the hosted version at https://orgmanager.miguelpiedrafita.com.

## Screenshots:

![Home Page](http://i.imgur.com/6sgmk7I.png)

---

![Login Page](http://i.imgur.com/A3yJoWE.png)

---

![Dashboard Page](http://i.imgur.com/OoWM4p8.png)

---

![Join Page](http://i.imgur.com/fzq4Kpg.png)

---

## Introduction:

OrgManager was created as a personal project for learning Laravel, PHP and the Github API. This means, I am still learning Laravel, so they're probably lot's of things to improve. If you find one, please [open an issue](https://github.com/m1guelpf/orgmanager/issues/new) or better, [make a pull request](https://github.com/m1guelpf/orgmanager/pulls/compare).

## Features:

- Multi-user support: You can add all the organizations/users you want securely. In fact, anyone with a Github organization can use it if you expose it on the internet!
- Uses Github Style: OrgManager uses [PrimeCSS](http://primercss.io/) and [Octicons](https://octicons.github.com) for having a github-like style!
- Caching: OrgManager uses notification caching to reduce load time and provide you an awesome experience!
- More coming soon: OrgManager is under active developement so, if you want to help or have ideas, go ahead and Contribute!
- OrgManager API: Orgmanager provides an awesome API that allows you to integrate it with your application.

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
2. Rename .env.example to .env and fill the required settings.
3. Run ```composer update```, ```php artisan key:generate``` and ```php artisan migrate```.
4. [Create a Github OAuth app](https://github.com/settings/applications/new) using ```[YOUR_URL]/callback``` as the **Authorization callback URL** and add them to ```config/eloquent-oauth.php```. As this is complex, you can use the hosted version.
5. Enjoy!

### Updating from 1.x

Orgmanager v2.0 introduced some breaking changes, so be sure to follow this steps when updating from v1.x

1. Clone or download the new version of Orgmanager and replace the old version (Don't worry, you shouldn't lose any data!).
2. Double-check the ```.env``` file is still there. If it isn't, you may have to repeat Step 2 of the installation process.
3. Run ```composer update``` and ```php artisan migrate```.
4. In you had users registered before upgrading, run ```php artisan orgmanager:tokens```.
5. If any of your user's organizations had a password before upgrading, run ```php artisan orgmanager:orgmanager:orgpwdcrypt``` *IMPORTANT: You should only run this command ONCE!*.
6. Enjoy!

## Status:

Actual version: [```v2.0```](https://github.com/m1guelpf/orgmanager/releases/v2.0)
Remember that you can always download the latest version using [this link](https://github.com/m1guelpf/orgmanager/releases/latest).

## API:

You can access the Orgmanager API documentation [here](http://docs.orgmanager.miguelpiedrafita.com).

## Roadmap:

You can check the [```v3.0``` milestone](https://github.com/m1guelpf/orgmanager/milestone/2) to get info about the status of the ```v3.0``` development.

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
