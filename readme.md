# Kirby Autologin

*Version 0.1*

Login to your panel without a username or password. Simplifies development.

**WARNING: ONLY USE THIS PLUGIN IF YOU ARE AN ADMINISTRATOR**

[Installation instructions](docs/install.md)

## Usage

1. Go to your domain and visit `/login` or `/login/your_username`.
1. If you are on a localhost environment, you should be logged in automatically. If you are not, nothing should happpen.

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

The url for the panel is often `/panel`, but you can't use that url to login automatically. By default auto logins are done with `/login`.

### protected

By default, this plugin will only run on localhost environments.

If you are on a development server and are aware of the risks of an autologin there you can set this option to `false`. It will bypass the whitelist check.

### redirect

After the user has been logged in, you will by default be logged in into the Panel. It's possible to change that with this option.

### username

If you don't set a username, it will login to the Panel as the first created user with an `admin` role.

### whitelist

You can set which domains and IP numbers should be allowed. By default common localhost domains and IPs are set.

## Config

If you are on a development server and need to set the protected option to `false`, then you should probably also use [custom configuration files](https://getkirby.com/docs/developer-guide/configuration/options#multi-environment-setup), like `config.beta.example.com.php` for `https://beta.example.com`.

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