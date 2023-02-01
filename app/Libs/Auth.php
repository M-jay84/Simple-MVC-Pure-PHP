<?php

namespace libs;

use libs\Cookie;
use libs\traits\Auth_user;

/*
* Check Visitor
*/
class Auth
{
    use Auth_user;

    public $data;

    public function user($class = 0, $force = 0, $autoclean = false)
    {
        // Check Ip
        self::ipBanned();

        // Check Cookies
        if (strlen(Cookie::get("password")) != 60 || !is_numeric($_COOKIE["id"])) {
            $this->isLoggedIn($force);
            return;
        } else {
            // Is User A Member
            try {
                // Lets Build User Array
                $data = array();
                // Get User & Group
                $user = DB::run(
                    "SELECT * FROM `users` 
                     LEFT OUTER JOIN `groups` 
                     ON users.class=groups.group_id 
                     WHERE id = $_COOKIE[id] 
                     AND users.enabled='yes'
                     AND users.status ='confirmed'"
                )->fetch();
                foreach ($user as $key => $value) {
                    $data[$key] = $value;
                }
                // User Role Or Group Role
                $role = $user['role_id'] == 1 ? $user['group_role_id'] : $user['role_id'];
                // Now Get Permission
                $permission = DB::run(
                    "SELECT *
                     FROM `permissions` WHERE `permission_id`=?",
                    [$role]
                )->fetch(\PDO::FETCH_ASSOC);
                foreach ($permission as $key => $value) {
                    $data[$key] = $value;
                }
            } catch (\Exception $e) {
                Cookie::destroyAll();
                Redirect(Url('logout'), Txt('AUTH_ISSUE'));
            }

            // Site closeed
            $this->isClosed($data['class']);

            // Now Compare Checks
            if ($data['password'] != $_COOKIE['password']) {
                Redirect(Url('logout'));
            }
            if ($data['id'] != $_COOKIE['id']) {
                Redirect(Url('logout'));
            }
            if ($class != 0 && $class > $data['class']) {
                Redirect(Url(), Txt("NO_PERMISSION"));
            }

            $GLOBALS['CURRENTUSER'] = $data;
            $_SESSION["loggedin"] = true;

            //$this->data = $data;
            return $data;
        }
    }

    // Check Ip Banned
    public function ipBanned()
    {
        $ip = Ip::getIP();
        if ($ip == '') {
            return;
        }
        Ip::checkipban($ip);
    }

    // Check Logged In Level
    public function isLoggedIn($force = 0)
    {
        // If force 0 guest view, force 1 use config config('MEMBERSONLY'], force 2 always hidden from guest
        if ($force == 1 && config('MEMBERSONLY')) {
            if (!$_SESSION['loggedin']) {
                Redirect(Url('logout'));
            }
        } elseif ($force == 2) {
            if (!$_SESSION['loggedin']) {
                Redirect(Url('user/login'));
            }
        }
    }

    // Check Site Closed
    public function isClosed($class = false)
    {
        if (!config('SITE_ONLINE')) {
            if ($class < _MODERATOR) {
                ob_start();
                ob_clean();
                require_once "assets/themes/" . (Visitor('stylesheet') ?: config('DEFAULTTHEME')) . "/header.php";
                echo '<div class="alert ttalert"><center>' . stripslashes(config('OFFLINEMSG')) . '</center></div>';
                require_once "assets/themes/" . (Visitor('stylesheet') ?: config('DEFAULTTHEME')) . "/footer.php";
                die();
            } else {
                echo '<center>' . stripslashes(config('OFFLINEMSG')) . '</center>';
            }
        }
    }

}