<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
		<title>API Example</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		
		<style>
			body { 
				font-size: 9pt; 
			}

			input {
				font-size: 20pt; 
				background-color: #FF00FF;
			}
		</style>

		<script src="https://code.jquery.com/jquery-1.11.3.js"></script> 
		<script>
			$(function () {
				function getDate() {
					var $disp = $("#dvStatus");
					$disp.text("");

					var $apiUrl = "<?php echo API_URL;?>" + "users/GET";
					$.ajax({
						url: $apiUrl,
						type: "GET",
						contentType: "application/x-www-form-urlencoded; charset=UTF-8",
						statusCode: { //依不同StatusCode執行不同邏輯
							404: function () {
								alert("Page Not Found!");
							},
							500: function (xhr, statusText, err) {
								alert(xhr.responseText);
							}
						},
                        success: function(result){
							var results = result.results;
							var dispText = "";
							dispText += '<table border="2"><tr><td>userID</td><td>name</td><td>birthday</td><td>email</td><td>tel</td><td>phone</td><td>address</td></tr>';
							for(i=0;i<results.length;i++)
							{
								dispText += "<tr>";
								dispText += "<td>"+results[i].userID+"</td>";
								dispText += "<td>"+results[i].name+"</td>";
								dispText += "<td>"+results[i].birthday+"</td>";
								dispText += "<td>"+results[i].email+"</td>";
								dispText += "<td>"+results[i].tel+"</td>";
								dispText += "<td>"+results[i].phone+"</td>";
								dispText += "<td>"+results[i].address+"</td>";
								dispText += "</tr>";
							}
							dispText += "</table>";
							document.getElementById("demo2").innerHTML = dispText;
						},
						error: function (xhr, statusText, err) {
							$disp.text("ERROR->" + statusText + "/" + err);
						}
                    });
				}
				
				$("#btnGet").click(function () {
					getDate();
				});
				
				
				$("#btnPost").click(function () {
					var $disp = $("#dvStatus");
					$disp.text("");

					var $apiDate = $("#postJson").val();
					var $apiUrl = "<?php echo API_URL;?>" + "users";
					$.ajax({
						url: $apiUrl,
						type: "POST",
						contentType: "application/json; charset=UTF-8",
						data: $apiDate ,
						statusCode: { //依不同StatusCode執行不同邏輯
							404: function () {
								alert("Page Not Found!");
							},
							500: function (xhr, statusText, err) {
								alert(xhr.responseText);
							}
						},
                        success: function(result){
							document.getElementById("demo1").innerHTML = "insert success";
							getDate();
						},
						error: function (xhr, statusText, err) {
							$disp.text("ERROR->" + statusText + "/" + err);
						}
                    });
				});
				
				
				
				$("#btnPut").click(function () {
					var $disp = $("#dvStatus");
					$disp.text("");

					var $apiDate = $("#putJson").val();
					var $apiUrl = "<?php echo API_URL;?>" + "users";
					$.ajax({
						url: $apiUrl,
						type: "POST",
						contentType: "application/json; charset=UTF-8",
						data: $apiDate ,
						statusCode: { //依不同StatusCode執行不同邏輯
							404: function () {
								alert("Page Not Found!");
							},
							500: function (xhr, statusText, err) {
								alert(xhr.responseText);
							}
						},
                        success: function(result){
							document.getElementById("demo1").innerHTML = "update success";
							getDate();
						},
						error: function (xhr, statusText, err) {
							$disp.text("ERROR->" + statusText + "/" + err);
						}
                    });
				});
				
				
				
				$("#btnDel").click(function () {
					var $disp = $("#dvStatus");
					$disp.text("");

					var $apiDate = $("#delJson").val();
					var $apiUrl = "<?php echo API_URL;?>" + "users";
					$.ajax({
						url: $apiUrl,
						type: "POST",
						contentType: "application/json; charset=UTF-8",
						data: $apiDate ,
						statusCode: { //依不同StatusCode執行不同邏輯
							404: function () {
								alert("Page Not Found!");
							},
							500: function (xhr, statusText, err) {
								alert(xhr.responseText);
							}
						},
                        success: function(result){
							document.getElementById("demo1").innerHTML = "delete success";
							getDate();
						},
						error: function (xhr, statusText, err) {
							$disp.text("ERROR->" + statusText + "/" + err);
						}
                    });
				});
				
			});
		</script>
	</head>
	
	<body>
		<form id="form1" runat="server">
			<h1>測試項目: api use json </h1>
			<br>
			<hr />
			<div>
				<table border="2">
					<tr>
						<td>
							<input type="button" id="btnPost" value="POST Method 新增" />
						</td>
						<td>
							<input type="button" id="btnPut" value="PUT Method 修改" />
						</td>
						<td>
							<input type="button" id="btnDel" value="DELETE Method 刪除" />
						</td>
					</tr>
					<tr>
						<td>
							<textarea id="postJson" style="width:400px;height:350px;align-content:center; overflow:auto; border:6px outset #000000;">
{"method":[{"type":"POST"}],
 "myHead":[],
 "myData":[
	{
	"account":"222",
	"password":"222",
	"name":"222",
	"sex":"M",
	"birthday":"1922/02/02",
	"email":"222@gmail.com",
	"tel":"2222222222",
	"phone":"2222222222",
	"address":"222",
	"idCard":"222"
	},
	{
	"account":"1",
	"password":"2",
	"name":"3",
	"sex":"F",
	"birthday":"1911/01/01",
	"email":"4",
	"tel":"5",
	"phone":"6",
	"address":"7",
	"idCard":"8"
	}
]}
							</textarea>
						</td>
						<td>
							<textarea id="putJson" style="width:400px;height:350px;align-content:center; overflow:auto; border:6px outset #000000;">
{"method":[{"type":"PUT"}],
 "myHead":[],
 "myData":[
	{
		"userID":"5",
		"password":"111",
		"name":"111",
		"sex":"F",
		"birthday":"1911/01/01",
		"email":"111@gmail.com",
		"tel":"1111111111",
		"phone":"1111111111",
		"address":"111",
		"idCard":"111"
	},
	{
		"userID":"6",
		"password":"9",
		"name":"9",
		"sex":"M",
		"birthday":"1911/09/09",
		"email":"9",
		"tel":"9",
		"phone":"9",
		"address":"9",
		"idCard":"9"
	}
]}
							</textarea>
						</td>
						<td>
							<textarea id="delJson" style="width:400px;height:350px;align-content:center; overflow:auto; border:6px outset #000000;">
{"method":[{"type":"DELETE"}],
 "myHead":[],
 "myData":[
	{
		"userID":"5"
	},
	{
		"userID":"6"
	}
]}
							</textarea>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<input type="button" id="btnGet" value="GET Method 取得" />
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<h2>
								<p id="demo1"></p>
								<p id="demo2"></p>
							</h2>
						</td>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>