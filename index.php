<?php

echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if (!function_exists('debugvar')) {
	function debugvar($var, $title = false, $fg_col = false, $bg_col = false) {
		$prestr = '<pre style="font-family:Fixedsys,Courier,monospace; ';
		if ($fg_col)
			$prestr .= 'color:#'.$fg_col.'; ';
		if ($bg_col)
			$prestr .= 'background-color:#'.$bg_col.'; ';
		$prestr .= '">';
		echo $prestr;
		if ($title)
			echo $title.': ';
		print_r($var);
		echo "</pre>";
	}
}

require_once __DIR__ . "/ClassLoader.php";
$autoloader = new ClassLoader;
$autoloader->register();
$autoloader->addPrefix("", __DIR__);

$frontController = new FrontController();
$frontController->run();