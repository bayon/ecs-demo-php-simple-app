<?php 
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

echo('<hr>');
echo($method);
echo('<hr>');
echo('<pre>');
print_r($request);
echo('</pre>');

die();

$controller = $request[0];
$action = $request[1];
$id = $request[2];


print_r($request);




if(isset($controller) && isset($action) ){
    switch ($controller) {
        case 'profiles':
             
                if(function_exists($controller)){
                    profiles($controller,$action,$id,$input);
                }
            break;
        
        default:
            # code...
            echo('controller and action set but no match in switch...');
            break;
    }
}


function profiles($controller='',$action='',$id='',$input=''){
    include_once('db_connect.php');
    switch ($action) {
        case 'read':
            # code...
            $sql="SELECT * FROM ".$controller."  ";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
            $data[] = $row; 
            }
            echo(json_encode($data));
            // Free result set
            mysqli_free_result($result);
            mysqli_close($con);
            break;
        case 'insert':
            # code...
            $sql="INSERT INTO `".$controller."` (`id`,`name`) VALUES (NULL,'".$input['name']."'); ";
            //echo("<br>".$sql);
            $result=mysqli_query($con,$sql);
            echo('INSERT FROM POST AJAX CALL ? ');
            break;
        case 'delete':
            # code...
            $sql="DELETE FROM  `".$controller."` WHERE  id = '".$input['id']."' ; ";
            //echo("<br>".$sql);
            $result=mysqli_query($con,$sql);
            
            break;
        case 'update':
            # code...
            //UPDATE `profiles` SET `id`=[value-1],`name`=[value-2] WHERE 1
            $sql="UPDATE  `".$controller."` SET `name` = '".$input['name']."' WHERE  `id` = '".$input['id']."' ; ";
            //echo("<br>".$sql);
            $result=mysqli_query($con,$sql);
            break;
        case 'getAllSkills':
            # code... 
            /* get all skills names by profile id:: */
            $sql = "SELECT `name` from `skills_types` WHERE `id` IN 
                (
                    SELECT `skills_id`
                    FROM `profiles_skills` 
                    WHERE `profiles_id` IN ($id)
                );";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $data[] = $row; 
            }
            echo(json_encode($data));
            //echo( "<script> let data = ". json_encode($data)."</script>");
            //include_once($controller.'/view.php');
            break;
        default:
            # code...
            echo('controller function called but hit the default switch case.');
            echo($controller."::".$action."");
            break;
    }
 // Free result set
 mysqli_free_result($result);
 mysqli_close($con);


}

function skills($controller='',$action='',$id='',$input=''){
    include_once('db_connect.php');

    switch ($action) {
        case 'insert':
            # code...LEFT OFF HERE use micro api insert skill code...
            break;
        
        default:
            # code...
            break;
    }

     // Free result set
    mysqli_free_result($result);
    mysqli_close($con);
}
?>

