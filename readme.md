# OrgManager
[![Build Status](https://travis-ci.org/orgmanager/orgmanager.svg?branch=master)](https://travis-ci.org/orgmanager/orgmanager) [![Code Coverage](https://scrutinizer-ci.com/g/orgmanager/orgmanager/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/orgmanager/orgmanager/?branch=master) [![GitHub release](https://img.shields.io/github/release/orgmanager/orgmanager.svg)](https://github.com/orgmanager/orgmanager/releases) [![license](https://img.shields.io/github/license/orgmanager/orgmanager.svg)](LICENSE.md) [![Codacy grade](https://img.shields.io/codacy/grade/e27821fb6289410b8f58338c7e0bc686.svg)](https://www.codacy.com/app/m1guelpiedrafita/orgmanager/dashboard) [![Packagist](https://img.shields.io/packagist/v/orgmanager/orgmanager.svg)](https://packagist.org/packages/orgmanager/orgmanager)

OrgManager takes Github Organization invites to a new level!

## Hosted version

Not everyone can afford a server, nor do they have the skills to set up a modern PHP application, so OrgManager provides a hosted version you can use **for FREE**. You can access the hosted version at [https://orgmanager.miguelpiedrafita.com](https://orgmanager.miguelpiedrafita.com). In exchange, please report any bugs you encounter, so we can continue inproving!

### On joining the OrgManager Github organization
As you may have guessed, you can use OrgManager to [join the OrgManager organization](https://orgmanager.miguelpiedrafita.com/o/orgmanager).

## Development version

These instructions will get you the beta version of the project up and running on your local machine for **development and testing** purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

To install OrgManager you'll need:

- A web server of your choice - (We recommend [hotel](https://github.com/typicode/hotel), as it is easy to setup and doesn't require any configuration.)
- PHP - (At least v5.6.4, although v7.* is recommended. [Installing PHP](http://php.net/manual/en/install.php))
- Some PHP libraries - (OpenSSL, PDO, Mbstring, Tokenizer, XML) (Google is your friend :smile:)
- Composer - ([Install Composer](https://getcomposer.org/download/))
- MySQL database - ([You can get them online for free](https://www.google.com/search?q=free+mysql+database))
- Git - ([Install GIT](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git))

### Installing

Now that you've verified that you have that, let's start...

1. Download beta version (Just clone the master branch)

Just open your terminal/console and run
```
git clone https://github.com/orgmanager/orgmanager
```
and you'll have the beta version on your new `orgmanager` folder.

2. Add OrgManager to your server.

Just google instructions for your server. If you're using [hotel](https://github.com/typicode/hotel), just open the OrgManager folder with the terminal/console and run

```sh
hotel add 'php artisan serve --port $PORT'
```

Now, if you configured custom domains, you can now access `orgmanager.{yourtld}`. If you didn't, access `localhost:2000` and click OrgManager. Yeah, it should be showing that huge error, don't worry :smile:

3. Setup .env

Copy the `.env.example` file to a `.env` file. Open the .env file with your favorite text editor/IDE and fill the database, reCaptcha and GitHub settings. (You can leave the rest as they are)

4. Finish the setup

Open the OrgManager folder with the terminal/console and run
```php
php artisan orgmanager:install
```

5. Done!

You have now the OrgManager beta version up an running in your server! (Note that OrgManager is not auto-updated, read the updating section for more info).

## Testing

We use the Laravel testing functionalities and PHPUnit to add automated testing to OrgManager.

### Setting up the testing enviroment

By default, the tests will run in an special database called `orgmanager_test` in `localhost` with username `root` and password `root`. If you need to change this, edit the `.env.testing` file. This is an example of a customized .env.testing file:

``` php
APP_ENV=testing
APP_KEY=base64:GIkaQ57IIVtTeTQOIh7eAFo1FAcoWkfwYPkfcOyusW4=

DB_CONNECTION=travis

DB_TEST_HOST=database_host
DB_TEST_DATABASE=database_name
DB_TEST_USERNAME=database_username
DB_TEST_PASSWORD=database_password

CACHE_DRIVER=array
SESSION_DRIVER=array
QUEUE_DRIVER=sync
```

Once you've customized your .env.testing file, you have to migrate the database to your test database. You can do this by running `php artisan migrate --env=testing`.

To run the tests, just run `composer test`.


## Deployment

These instructions will get you the lastest stable version of the project up and running on your server for **production** purposes. See the development version section for notes on how to setup the beta version on your local machine.

### Prerequisites

To install OrgManager you'll need:

- A web server of your choice - (We recommend Apache or Ngix for production, but any web server you have should work).
- PHP - (At least v5.6.4, although v7.* is recommended. [Installing PHP](http://php.net/manual/en/install.php))
- Some PHP libraries - (OpenSSL, PDO, Mbstring, Tokenizer, XML) (Google is your friend :smile:)
- Composer - ([Install Composer](https://getcomposer.org/download/))
- MySQL database - (Although this isn't recommanded for a production enviroment, [you can get them online for free](https://www.google.com/search?q=free+mysql+database))
- SSH access to your server (physical access is also valid)

### Installing

Now that you've verified that you have that, let's start...

1. Download lastest stable version

Download [the lastest release](https://github.com/orgmanager/orgmanager/releases/latest) and unzip it on your server.

2. Add OrgManager to your server.

Just google instructions for your server.
Yeah, it should be showing that huge error after setup, don't worry :smile:

3. Setup .env

Copy the `.env.example` file to a `.env` file. Open the .env file with your favorite text editor/IDE and fill the database, reCaptcha and GitHub settings. (You can leave the rest as they are, although it is recommended setting up [Bugsnag](https://www.bugsnag.com/) in production).

**REMEMBER TO SET DEBUG TO FALSE, AND TO CHANGE APP_ENV TO PROD IF THEY AREN'T!**

4. Finish the setup

Open the OrgManager folder with the terminal/console and run

```sh
composer install
```
and

```sh
php artisan orgmanager:install
```

5. Done!

You have now the lastest OrgManager stable version up an running in your server! (Note that OrgManager is not auto-updated, read the updating section for more info).

## Updating

OrgManager is under active development, and that means it gets lots of updates, bug fixes and new features. Follow the below guides to update OrgManager to the lastest version:

### Updating a development enviroment

This is the easiest one.

1. Get lastest code

Open the orgmanager folder in the terminal/console and run
```sh
git pull origin master
```
and you're done.

**FOR NEW RELEASES, REMEMBER TO CHECK THE UPGRADING GUIDE, IF ANY. YOU CAN FIND IT IN THE [RELEASES PAGE](https://github.com/orgmanager/orgmanager/releases).**

### Updating a production enviroment

New features deserve it, go ahead!

1. Download lastest stable version

Download the [lastest release](https://github.com/orgmanager/orgmanager/releases/latest) and unzip it on your server.

**REMEMBER TO FOLLOW THE UPGRADING GUIDE, IF ANY. YOU CAN FIND IT IN THE [RELEASE PAGE](https://github.com/orgmanager/orgmanager/releases/latest).**

## Built With

* [PHP](https://php.net) - The programming language used.
* [MySQL](https://mysql.com) - Database software used.
* [Laravel 5.3](https://laravel.com) - The web framework used.
* [Composer](https://getcomposer.org) - The Dependency Management software used.
* [Github](https://github.com) - Thank you for your awesome API, and to the awesome people at [Github Support](https://github.com/contact)!
* [Eloquent OAuth (Laravel 5)](https://github.com/adamwathan/eloquent-oauth-l5) - The OAuth library used.
* [PHP Github API](https://github.com/KnpLabs/php-github-api) & [Laravel Version](https://github.com/GrahamCampbell/Laravel-GitHub) - The API clients used
* [PHP reCaptcha](https://github.com/google/recaptcha) - The reCaptcha Client
* [PrimerCSS](http://primercss.io/), [Bootstrap](https://getbootstrap.com/) & [MaterializeCSS](http://materializecss.com/) - The frontend frameworks used
* [Octicons](https://octicons.github.com/) - The icons used

## Contributing

Please read [CONTRIBUTING.md](https://github.com/orgmanager/orgmanager/blob/master/.github/CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [releases page](https://github.com/orgmanager/orgmanager/releases).

## Support Channels

Facing an issue? Want to meet other OrgManager users? Just want to say hello?

Here are the official support channels we provide:

* Github Issues - You can [open an issue](https://github.com/orgmanager/orgmanager/issues/new) for things like requesting new features or reporting bugs.
* Hosted Version Chat - If you've used the hosted version, you migth have noticed that there is a chat icon on the bottom rigth corner. That chat is used for things related to the hosted version.
* [Gittler chat](https://gitter.im/orgmanager/) - We have a little Gitter chatroom for discussing things about the project, meeting other users and anything else you think of. Don't be afraid to say hello!
* Email - You can send a mail to [orgmanager@miguelpiedrafita.com](mailto:orgmanager@miguelpiedrafita.com) to discuss about anything with the main developer, [Miguel Piedrafita](https://miguelpiedrafita.com).

## Sponsors

Does your organization use OrgManager?  Ask your manager or marketing team if you'd be interested in supporting our project.  Support will allow the maintainers to dedicate more time for maintenance and new features for everyone.  Also, your company's logo will show on GitHub and on our site --who doesn't want a little extra exposure?

## Authors

* [**Miguel Piedrafita**](https://miguelpiedrafita.com) - *Idea, Code & Hosting*

See also the list of [contributors](https://github.com/orgmanager/orgmanager/contributors) who participated in this project.

## License

This project is licensed under the Mozilla Public License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* [Laracasts](https://laracasts.com/) & The Laravel Community - You are fantastic!
* [@simonv3](https://github.com/simonv3) and [@jancborchardt](https://github.com/jancborchardt) - Your issues have helped OrgManager improve lots of things!
* [Elio Qoshi](https://github.com/elioqoshi) - You made the OrgManager branding great!
