# Kirby Autologin

*Version 0.1*

Login to your panel without a username or password.

**WARNING: ONLY USE THIS PLUGIN ON A LOCALHOST OR A DEVELOPMENT ENVIROMENT.**

## Usage

1. Go to your domain and visit `/login` or `/login/username`.
1. If you are on a localhost environment, you should be logged in automatically.

## Options (optional)

The following options can be set in your `/site/config/config.php` file:

```php
c::set('plugin.autologin.active', true);
c::set('plugin.autologin.url', 'login');
c::set('plugin.autologin.protected', true);
c::set('plugin.autologin.redirect', 'panel');
c::set('plugin.autologin.username', $this->usernameFallback());
c::set('plugin.autologin.whitelist', [
    'localhost',
    '127.0.0.1',
    '::1'
]);
```

### active

The plugin is activated by default but it's possible to disable it completely with this option. However, even if the plugin is active, it will only run on localhost environments by default.

### url

The url for the panel is often `/panel`, but this is the url for our route that will log us in automatically. It's set to `/login` by default.

### protected

By default, this plugin will only run on localhost environments. If you know what you are doing you can set this to `false`. It will skip the `whitelist` and allow auto logins on the domain no matter what. It can be good if you have a development environment on a server, for example `https://beta.example.com`. In that case you should probably use a custom config file like `config.beta.example.com.php`. Just be aware that anyone who can figure out the url to the auto login, will have full access to your Panel.

### redirect

After the user has been logged in, you will by default be logged in into the Panel. It's possible to change that with this option.

### username

If you don't set a username, it will login to the Panel as the first created user with an `admin` role.

### whitelist

You can set which domains and IP numbers should be allowed. By default common localhost domains and IPs are set.

###

## Changelog

**0.1**

- Initial release

## Requirements

- [**Kirby**](https://getkirby.com/) 2.5+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/username/plugin-name/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Credits

- [Jens Törnell](https://github.com/jenstornell)
- [Flo Kosiol](https://github.com/flokosiol)
- [Gerard Kleine Deters](https://github.com/gerardkd)
- [Lukas Bestle](https://github.com/lukasbestle)