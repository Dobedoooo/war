<?php
    namespace lib;

    class cookie {

        function setCookie($attribute, $value, $duration='session') {
            if($duration == 'session') {
                \setcookie($attribute, $value);
            } else {
                \setcookie($attribute, $value, \time() + $duration);                
            }
        }

        function getCookie($attribute) {
            return $_COOKIE[$attribute];
        }

        function delCookie($attribute) {
            \setcookie($attribute, 'About To Be Deleted', \time() - 1);
        }

        function isCookie($attribute) {
            return isset($_COOKIE[$attribute]);
        }
    }