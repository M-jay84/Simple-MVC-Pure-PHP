<?php

use libs\DB;

use libs\SimpleThumbnail;
use models\M_users;
use models\M_guests;

// Translate String To Language
function Txt($s)
{
    global $LANG;
    if ($ret = (isset($LANG[$s]) ? $LANG[$s] : null)) {
        return $ret;
    }
    if ($ret = (isset($LANG["{$s}[0]"]) ? $LANG["{$s}[0]"] : null)) {
        return $ret;
    }
    return $s;
}

function Visitor($name)
{
    global $CURRENTUSER;
	if (isset($CURRENTUSER[$name])) {
        $CURRENTUSER['loggedin'] = true;
        return $CURRENTUSER[$name];
    } else {
        return false;
    }
}

function Redirect($url, $message = false, $time = 5)
{
    if (!$message) {
        if (!headers_sent()) {
            header("Location: " . $url, true, 302);
            exit();
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $url . '";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0; url=' . $url . '" />';
            echo '</noscript>';
            exit();
        }
    } else {
        header1("info");
        block_begin("Info");
        echo "\n<meta http-equiv=\"refresh\" content=\"$time; url=$url\">\n"; ?>
            <center>
            <b><?php echo $message; ?></b><br>
            <b>Redirecting ...</b>&nbsp;
            <b>[ <a href='<?php echo $url; ?>'>link</a> ]</b>&nbsp;
            </center>
            <?php
        block_end();
        footer();
        die();
    }
}

function Url($url = URLROOT, $referer = false)
{
    if ($referer) {
        if (!($_SERVER['HTTP_REFERER'])) {
            return $_SERVER['HTTP_REFERER'];
        } else {
            $path = URLROOT . '/' . $url;
            return $path;
        }
    } elseif ($url == URLROOT) {
        return URLROOT;
    } else {
        $path = URLROOT . '/' . $url;
        return $path;
    }
}

	// Get Config Array
    function config($name) {
		global $config;
        if (isset($config[$name])) {
            return $config[$name];
        } else {
            return false;
        }
	}


    // Include Header
    function header1($title = "", $portal = false)
    {
        if (!isset($_SESSION['loggedin'])) {
            //M_guests::guestadd();
        }
        if ($title == "") {
            $title = config('SITENAME');
        } else {
            $title = config('SITENAME') . " : " . htmlspecialchars($title);
        }
        if ($portal) {
            require_once "assets/themes/default/header.php";
        } else {
            require_once "assets/themes/default/header.php";
        }
    }
    
    // Include Footer
    function footer($portal = false)
    {
        if ($portal) {
            require_once "assets/themes/default/footer.php";
        } else {
            require_once "assets/themes/default/footer.php";
        }
    }
    
    // Begin Page/Block Frame
    function block_begin($caption = "-", $p = 3)
    {
        ?>
        <div class="tt_block rounded">
            <div class="tt_blockhead text-center">
                <?= $caption ?>
            </div>
            <div class="p-<?= $p ?>">
        <?php
    }

    // End Page/Block Frame
    function block_end()
    {
        ?>
            </div>
        </div>
        <?php
    }
