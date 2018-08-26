<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<!-- <link rel='stylesheet' type='text/css' href='style.css'> -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
                        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                        crossorigin="anonymous">
		</script>
		<title>HTML DOC</title>
	</head>
	<body>
    <form action="http://ec2-34-228-26-214.compute-1.amazonaws.com/api/index.php" method="post">
    <input type=hidden name='controller' value='profiles'/>
    <input type=hidden name='action' value='insert' />
        Name: <input type="text" name="name"><br>
         
        <input type="submit"   value ="insert">
    </form>
        
		<script>

		$(document).ready(function(){
			console.log('jquery is ready.');
           
            $.get("http://ec2-34-228-26-214.compute-1.amazonaws.com/api/index.php/profiles/getAllSkills/1", function(data, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    console.log(data);
                });
           
                $.get("http://ec2-34-228-26-214.compute-1.amazonaws.com/api/index.php/profiles/read", function(data, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    console.log(data);
                });
               /* $("button").click(function(){
                    $.post("http://localhost:8888/getajob/api.php/profiles/insert",
                    {
                        controller: "profiles",
                        action: "insert",
                        name: "Earny"
                       
                    },
                    function(data, status){
                        alert("Data: " + data + "\nStatus: " + status);
                        console.log(data);
                    });
                });*/
		});
		(function(){
		    console.log('modular design pattern');
		}());
		</script>
	</body>
</html>
