<?php

	date_default_timezone_set('Asia/Taipei');



	/**
	 * vlucas/phpdotenv：環境變數
	 */

	// 使用命名空間
	use Dotenv\Dotenv;
	
	// 創建
	$dotenv = new Dotenv(__DIR__);
	$dotenv->load();
	
	// 定義-資料庫
	define('DB_HOST', env('DB_HOST', 'localhost'));
	define('DB_PORT', env('DB_PORT', 3306));
	define('DB_DATABASE', env('DB_DATABASE', 'example'));
	define('DB_CHARSET', env('DB_CHARSET', 'utf-8'));
	define('DB_USERNAME', env('DB_USERNAME', 'root'));
	define('DB_PASSWORD', env('DB_PASSWORD', '0710'));

	// 定義-網址
	define('BASE_URL',env('BASE_URL','http://localhost/example_api/'));
	define('API_URL',env('API_URL',''));
	

	
	/**
	 * vlucas/phpdotenv：處理日期時間
	 */

	// 使用命名空間
	use Carbon\Carbon;

	// 設定時區
	Carbon::setLocale('zh-TW');
	
	// 使用方法
	/*
	$total = 10;
	foreach(range(1,10) as $index) {
		echo Carbon::now()->subDays($total - $index);
		echo "-----";
		$create_date = Carbon::now()->subDays($total - $index)->addHours(rand(1,24));
		echo $create_date;
		echo "-----";
		echo "發表於 ".Carbon::createFromformat('Y-m-d H:i:s', $create_date)->diffForHumans();
		echo "<br>";
	}
	*/



	/**
	 * recca0120/laravel-tracy：偵錯工具
	 */

	// 使用命名空間
	use Recca0120\LaravelTracy\Tracy;

	// 創建
	Tracy::instance();

	// 使用方法
	// $sql = "SELECT * FROM 'users'";
	// sql($sql);



	/**
	 * 自定義
	 */

	// 創建 debug
	$my_console = new my_console();
	// 使用方法
	// echo $my_console->log("debug");

	// 創建 $my_string_mutator
	$my_string_mutator = new my_string_mutator();
	// 使用方法
	// echo $my_string_mutator->trim("1234567",0,2,'...');
	// echo $my_string_mutator->trim_created_at("2018-11-22 13:44");



	/**
	 * monolog/monolog：寫 log 到檔案或資料庫
	 */

	// 創建
	$log = new Log();

	// 使用
	$log->error(__FILE__, 'Error Log');
	$log->info(__FILE__, 'Info Log');
	$log->warning(__FILE__, 'Warning Log');



	/**
	 * wixel/gump：數據驗證
	 */

    // 接收表單傳來的資料
	if(isset($_POST))$_POST = GUMP::xss_clean($_POST);



	/**
	 * mesingh/php-flash-messages：flash session 
	 * 它的概念是，這資料只存到下一頁載入後，
	 * 我覺得根本就是為了解決傳遞錯誤訊息這件事而生
	 */
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();



	/*
	 *
	 */

	//搭配 .htaccess 排除資料夾名稱後解析 URL
	$route = new Router(Request::uri()); 


?>