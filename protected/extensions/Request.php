<?php class Request{
	public static function getParam($name,$default = null) {
        return isset($_GET[$name]) ? $_GET[$name] : (isset($_POST[$name]) ? $_POST[$name] : $default);
    }
}