<?php
namespace Autologin;
use url;
use c;

$Autologin = new Autologin();
$Autologin->run();

class Autologin {
    function __construct() {
        $this->url = c::get('plugin.autologin.url', 'login');
        $this->username = c::get('plugin.autologin.username', $this->usernameFallback());
        $this->active = c::get('plugin.autologin.active', true);
        $this->redirect = c::get('plugin.autologin.redirect', 'panel');
        $this->whitelist = c::get('plugin.autologin.whitelist', [
            'localhost',
            '127.0.0.1',
            '::1'
        ]);
    }

    // Run all
    function run() {
        if(!$this->active) return;
        if(!$this->isLocalhost()) return;

        $this->routes();
    }

    // Routes
    function routes() {
        kirby()->routes([
            [
                'pattern' => $this->url,
                'action'  => function() {
                    $user = $this->getUser($this->username);
                    if($user) {
                        $user->loginPasswordless();
                        $this->gotoPanel();
                    } else {
                        echo 'Wrong username';
                    }
                }
            ],
            [
                'pattern' => $this->url . '/(:any)',
                'action'  => function($username) {
                    $user = site()->user($username);
                    $user->loginPasswordless();
                    $this->gotoPanel();
                }
            ]
        ]);
    }

    // Get user by username
    function getUser($username) {
        return site()->user($username);
    }

    // Fallback for username config option
    function usernameFallback() {
        $users = site()->users();
        $users = $users->filterBy('role', 'admin')->toArray();
        
        $files = $this->getFiles();
        foreach($files as $file) {
            if(array_key_exists($file, $users)) {
                return $file;
            }
        }
    }

    // Get files in accounts
    function getFiles() {
        $glob = glob(kirby()->roots()->accounts() . DS . '*.php');
        usort($glob, function($a,$b){
            return filemtime($a) - filemtime($b);
        });
        foreach($glob as $item) {
            $parts[] = pathinfo($item)['filename'];
        }
        return $parts;
    }

    // Redirect to panel
    function gotoPanel() {
        go($this->redirect);
    }

    // Check if environment is localhost
    function isLocalhost() {
        if(is_string($this->whitelist) && $this->whitelist == 'all') return true;

        $ip = $_SERVER["REMOTE_ADDR"];

        if(in_array($ip, $this->whitelist)) return true;
        if(in_array(url::host(), $this->whitelist)) return true;
    }
}