<?php
    /*************************
	**  表格：使用者         **
	**        users         ** 
	**************************/
	
	
	
	// get the HTTP method, path and body of the request
	$input = json_decode(file_get_contents("php://input"),true);
 
 
	// 取得參數
	$method = $route->getParameter(2);
	$strId = $route->getParameter(3);
	
	if($method == "") {
		$input_method = $input["method"];
		$input_method_values = array($input_method[0]);
		$method = $input_method_values[0]["type"];
	}
	
	$input_myHead = $input["myHead"];
	$input_myData = $input["myData"];
	
	
	// 回傳結果值
	$response = array();
	// 回傳結果值 - 錯誤清單
	$resultsErr = array();
	// 回傳結果值 - 資料
	$results = array();
	
	
	// 處理結果
	$bolResult=true;
	
	
	// 處理
	switch ($method){
		case "GET":
			// 查詢
			$table = "users";
			if($strId){
				$condition = "userID = :userID";
			}else{
				$condition = "userID != :userID";
			}
			$order_by = "1";
			$fields = "*";
			$limit = "";
			if($strId){
				$data_array = array(":userID" => $strId);
			}else{
				$data_array = array(":userID" => "");
			}
			$results = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);
			
			break;
			
		case "POST":
			/* JSON 格式
			{
				"myHead":[
					{
						"documentNo":""
					}
				]
				,
				"myData":[
					{
						"account":"",
						"password":"",
						"name":"",
						"sex":"",
						"birthday":"",
						"email":"",
						"tel":"",
						"phone":"",
						"address":"",
						"idCard":""
					},
					{
						"account":"",
						"password":"",
						"name":"",
						"sex":"",
						"birthday":"",
						"email":"",
						"tel":"",
						"phone":"",
						"address":"",
						"idCard":""
					}
				]
			}
			*/
			
			/* 用在有「主檔 myHead」、「明細檔 myData」時
			for($i=0;$i<count($input_myHead);$i++){
				$input_myHead_values = array($input_myHead[$i]);
				
				$documentNo = ($input_myHead_values[0]["documentNo"]=="null"?'':$input_myHead_values[0]["documentNo"]);
			}
			*/
			
			// 新增
			for($i=0;$i<count($input_myData);$i++){
				$input_myData_values = array($input_myData[$i]);
				
				$account = ($input_myData_values[0]["account"]=="null"?'':$input_myData_values[0]["account"]);
				$password = ($input_myData_values[0]["password"]=="null"?'':$input_myData_values[0]["password"]);
				$name = ($input_myData_values[0]["name"]=="null"?'':$input_myData_values[0]["name"]);
				$sex = ($input_myData_values[0]["sex"]=="null"?'':$input_myData_values[0]["sex"]);
				$birthday = ($input_myData_values[0]["birthday"]=="null"?'0000-00-00':$input_myData_values[0]["birthday"]);
				$email = ($input_myData_values[0]["email"]=="null"?'':$input_myData_values[0]["email"]);
				$tel = ($input_myData_values[0]["tel"]=="null"?'':$input_myData_values[0]["tel"]);
				$phone = ($input_myData_values[0]["phone"]=="null"?'':$input_myData_values[0]["phone"]);
				$address = ($input_myData_values[0]["address"]=="null"?'':$input_myData_values[0]["address"]);
				$idCard = ($input_myData_values[0]["idCard"]=="null"?'':$input_myData_values[0]["idCard"]);
			
				try {
					// 新增到資料庫
	                $table = "users";
	                $data_array = array(
	                    "account" => $account,
	                    "password" => $password,
	                    "name" => $name,
	                    "sex" => $sex,
	                    "birthday" => $birthday,
	                    "email" => $email,
	                    "tel" => $tel,
	                    "phone" => $phone,
	                    "address" => $address,
	                    "idCard" => $idCard
	                );
	                Database::get()->insert($table, $data_array);

	            // else catch the exception and show the error.
	            } catch(PDOException $e) {
	                $error[] = $e->getMessage();
	                
					$resultErr = array();
					$resultErr["account"] = $account;
					$resultErr["error"] = $error;
					array_push($resultsErr,$resultErr);
					
					$bolResult=false;
				}
			}
		
			break;
			
		case "PUT":
			/* JSON 格式
			{
				"myHead":[
					{
						"documentNo":""
					}
				]
				,
				"myData":[
					{
						"userID":"",
						"password":"",
						"name":"",
						"sex":"",
						"birthday":"",
						"email":"",
						"tel":"",
						"phone":"",
						"address":"",
						"idCard":""
					},
					{
						"userID":"",
						"password":"",
						"name":"",
						"sex":"",
						"birthday":"",
						"email":"",
						"tel":"",
						"phone":"",
						"address":"",
						"idCard":""
					}
				]
			}
			*/
			
			/* 用在有「主檔 myHead」、「明細檔 myData」時
			for($i=0;$i<count($input_myHead);$i++){
				$input_myHead_values = array($input_myHead[$i]);
				
				$documentNo = ($input_myHead_values[0]["documentNo"]=="null"?'':$input_myHead_values[0]["documentNo"]);
			}
			*/
			
			// 修改
			for($i=0;$i<count($input_myData);$i++){
				$input_myData_values = array($input_myData[$i]);
				
				$userID = ($input_myData_values[0]["userID"]=="null"?'':$input_myData_values[0]["userID"]);
				$password = ($input_myData_values[0]["password"]=="null"?'':$input_myData_values[0]["password"]);
				$name = ($input_myData_values[0]["name"]=="null"?'':$input_myData_values[0]["name"]);
				$sex = ($input_myData_values[0]["sex"]=="null"?'':$input_myData_values[0]["sex"]);
				$birthday = ($input_myData_values[0]["birthday"]=="null"?'0000-00-00':$input_myData_values[0]["birthday"]);
				$email = ($input_myData_values[0]["email"]=="null"?'':$input_myData_values[0]["email"]);
				$tel = ($input_myData_values[0]["tel"]=="null"?'':$input_myData_values[0]["tel"]);
				$phone = ($input_myData_values[0]["phone"]=="null"?'':$input_myData_values[0]["phone"]);
				$address = ($input_myData_values[0]["address"]=="null"?'':$input_myData_values[0]["address"]);
				$idCard = ($input_myData_values[0]["idCard"]=="null"?'':$input_myData_values[0]["idCard"]);
				
				try {
	                $table = "users";
	                $data_array = array(
	                    "password" => $password,
	                    "name" => $name,
	                    "sex" => $sex,
	                    "birthday" => $birthday,
	                    "email" => $email,
	                    "tel" => $tel,
	                    "phone" => $phone,
	                    "address" => $address,
	                    "idCard" => $idCard
	                );
	                $key = "userID";
	                $userID = $userID;
	                Database::get()->update($table, $data_array, $key, $userID);

	            // else catch the exception and show the error.
	            } catch(PDOException $e) {
	                $error[] = $e->getMessage();

					$resultErr = array();
					$resultErr["userID"] = $userID;
					$resultErr["error"] = $error;
					array_push($resultsErr,$resultErr);
					
					$bolResult=false;
				}
			}
			
			break;
			
		case "DELETE":
			/* JSON 格式
			{
				"myHead":[
					{
						"documentNo":""
					}
				]
				,	
				"myData":[
					{
						"userID":""
					},
					{
						"userID":""
					}
				]
			}
			*/
			
			/* 用在有「主檔 myHead」、「明細檔 myData」時
			for($i=0;$i<count($input_myHead);$i++){
				$input_myHead_values = array($input_myHead[$i]);
				
				$documentNo = ($input_myHead_values[0]["documentNo"]=="null"?'':$input_myHead_values[0]["documentNo"]);
			}
			*/
			
			// 刪除
			for($i=0;$i<count($input_myData);$i++){
				$input_myData_values = array($input_myData[$i]);
				
				$userID = ($input_myData_values[0]["userID"]=="null"?'':$input_myData_values[0]["userID"]);
				
				try {
	                $table = "users";
	                $key = "userID";
	                $userID = $userID;
	                Database::get()->delete($table, $key, $userID);

	            // else catch the exception and show the error.
	            } catch(PDOException $e) {
	                $error[] = $e->getMessage();

					$resultErr = array();
					$resultErr["userID"] = $userID;
					$resultErr["error"] = $error;
					array_push($resultsErr,$resultErr);
					
					$bolResult=false;
				}
			}
			
			break;
	}
	
			
	// 最後結果
	if($bolResult){
		// 是否錯誤：否
		$response["error"] = false; 

		// 訊息：成功訊息
		$response["message"] = "Get data successfully";
		
		// 資料
		$response["results"] = $results;
	}else{
		// 是否錯誤：是
		$response["error"] = true; 

		// 訊息：錯誤訊息
		$response["message"] = "Some error occurred please try again";
		
		// 錯誤清單
		$response["resultsErr"] = $resultsErr;
	}
	
	
	// displaying the response in json structure 
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Connection, User-Agent, Cookie');
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
	header("Content-Type: application/json");
	echo json_encode($response);
?>