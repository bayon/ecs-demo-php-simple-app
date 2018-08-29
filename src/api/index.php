<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

//https://www.leaseweb.com/labs/2015/10/creating-a-simple-rest-api-in-php/
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);
echo(json_encode($_REQUEST));
/*echo('<hr>');
echo($method);
echo('<hr>');
print_r($request);
echo('<hr>');
echo($input);
 */
/*
// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'getajob');
mysqli_set_charset($link,'utf8');
*/
// retrieve the table and key from the path
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = array_shift($request)+0;

// escape the columns and values from the input object
$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
//echo('columns:');
//print_r($columns);
$values = array_map(function ($value) use ($link) {
  if ($value===null) return null;
  return mysqli_real_escape_string($link,(string)$value);
},array_values($input));
//echo('values:');
//print_r($values);
// build the SET part of the SQL command
$set = '';
for ($i=0;$i<count($columns);$i++) {
  $set.=($i>0?',':'').'`'.$columns[$i].'`=';
  $set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
}

// create SQL based on HTTP method
switch ($method) {
  case 'GET':
    //$sql = "select * from `$table`".($key?" WHERE id=$key":''); break;
    echo('get');
  case 'PUT':
    //$sql = "update `$table` set $set where id=$key"; break;
  case 'POST':
    //$sql = "insert into `$table` set $set"; break;
    echo('POST');
  case 'DELETE':
    //$sql = "delete `$table` where id=$key"; break;
}
/*
// excecute SQL statement
$result = mysqli_query($link,$sql);

// die if SQL statement failed
if (!$result) {
  http_response_code(404);
  die(mysqli_error());
}

// print results, insert id or affected row count
if ($method == 'GET') {
  if (!$key) echo '[';
  for ($i=0;$i<mysqli_num_rows($result);$i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
  }
  if (!$key) echo ']';
} elseif ($method == 'POST') {
  echo mysqli_insert_id($link);
} else {
  echo mysqli_affected_rows($link);
}

// close mysql connection
mysqli_close($link);
*/
/*
Running
Save this file as “api.php” in your (Apache) document root and call it using:

http://localhost/api.php/{$table}/{$id}
Or you can use the PHP built-in webserver from the command line using:

$ php -S localhost:8888 api.php
The URL when ran in from the command line is:

http://localhost:8888/api.php/{$table}/{$id}
NB: Don’t forget to adjust the ‘mysqli_connect’ parameters in the above script!
*/