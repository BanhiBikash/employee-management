<?php
include_once"config.php";

$eno=$ename=$job=$manager=$hire=$dno=$comm=$salary="";
$hire_radio=$comm_radio=$salary_radio="";
$error="";
$result="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(!empty(trim($_POST["eno"])))
    $eno=trim($_POST["eno"]);

    
    if(empty($eno))
    {
        $error="In order to delete employee data enter employee no.";
    }

    if(empty($error))
    {
        if(!empty($eno))
        {       
           
                $sql="SELECT eno FROM employee where eno=$eno";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="No-one with that Employee no. exist";
                }
        
                else
                {
                    $sql="DELETE FROM employee WHERE eno=$eno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully deleted.";
                    }                    
                }
        
            
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Delete Employee Data</h1>

<h2 style="color:green;"><?php echo $result; ?></h2>
<center>
<form style="height:500px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<h2 style="margin-bottom:10%;">Delete data</h2>
<table>
    <tr>
        <th><h3>Search using</h3></th>
        <th><h3>Details</h3></th>
    </tr>

    <tr>
        <td><span class="err"><?php echo $error;?></span></td>
    </tr>

    <tr>
        <td><label for="eno">Employee_no.</label></td>
        <td><input type="text" name="eno" for="eno"></td><br>
    </tr>
     
</table>   
<input class="bttnl"  type="submit" value="DELETE"> 
<input class="bttnr" type="reset" value="RESET">   
</form>
</center>
<a href="insertEmployee.php"><button class="bttnl">INSERT</button></a>
<a href="updateEmployee.php"><button class="bttnl">UPDATE</button></a>
<a href="readEmployee.php"><button class="bttnr">READ</button></a>
</body>
</html>