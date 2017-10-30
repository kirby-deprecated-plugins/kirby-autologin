# Kirby Autologin

*Version 0.1*

Login to your panel without a username or password. Simplifies development.

**WARNING: ONLY USE THIS PLUGIN IF YOU ARE AN ADMINISTRATOR**

[Installation instructions](docs/install.md)

## Usage

1. Go to your site and visit `/login` or `/login/your_username` on a localhost enviroment.
1. Congratulations, your are logged in!

## Options (optional)

The following options can be set in your `/site/config/config.php` file:

```php
c::set('plugin.autologin.active', true);
c::set('plugin.autologin.url', 'login');
c::set('plugin.autologin.redirect', 'panel');
c::set('plugin.autologin.username', ''); // Will fallback to the first admin user
c::set('plugin.autologin.whitelist', [
    'localhost',
    '127.0.0.1',
    '::1'
]);
```

### active

The plugin is activated by default but it's possible to disable it completely with this option. However, even if the plugin is active, it will only run on localhost environments by default.

### url

The url for the panel is often `/panel`, but you can't use that url to login automatically. By default auto logins are done with `/login`.

### redirect

After the user has been logged in, you will by default be logged in into the Panel. It's possible to change that with this option.

### username

If you don't set a username, it will login to the Panel as the first created user with an `admin` role.

### whitelist

You can set which domains and IP numbers should be allowed. By default common localhost domains and IPs are set.

If the whitelist is set to the string `all`, all domains and IPs are allowed. It may be very dangerous, because anyone who knows the auto login url will have full access to your panel.

## Config

If you are on a development server, you should, after changing the whitelist, probably also use [multi environment configuration files](https://getkirby.com/docs/developer-guide/configuration/options#multi-environment-setup), like `config.beta.example.com.php` for `https://beta.example.com`.

## Changelog

**0.1**

- Initial release

## Requirements

- [**Kirby**](https://getkirby.com/) 2.5+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/jenstornell/kirby-autologin/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Credits

- [Jens Törnell](https://github.com/jenstornell)
- [Flo Kosiol](https://github.com/flokosiol)
- [Gerard Kleine Deters](https://github.com/gerardkd)
- [Lukas Bestle](https://github.com/lukasbestle)