<?php
include_once"config.php";

$dno=$dname=$locat=$new_dno=$new_dname=$new_locat="";
$result=$error="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(!empty(trim($_POST["dno"])))
    $dno=trim($_POST["dno"]);

    if(!empty(trim($_POST["dname"])))
    $dname=trim($_POST["dname"]);

    if(!empty(trim($_POST["locat"])))
    $locat=trim($_POST["locat"]);

    if(!empty(trim($_POST["new_dno"])))
    { 
        $new_dno=trim($_POST["new_dno"]);
    }

    if(!empty(trim($_POST["new_dname"])))
    $new_dname=trim($_POST["new_dname"]);

    if(!empty(trim($_POST["new_locat"])))
    $new_locat=trim($_POST["new_locat"]);

    if(empty(trim($dno)) && empty(trim($dname)) && empty(trim($locat)))
    {
        $error="Fill at least one search category";
    }

    if(empty(trim($new_dno)) && empty(trim($new_dname)) && empty(trim($new_locat)))
    {
        $error="Fill at least one update category";
    }

    if(empty($error))
    {
        if(!empty($new_dno))
        {
            if(empty($dno))
            {
                $error="In order to update department no. enter current department no.";
            }
        
            else if(!empty($dno))
            {
                $sql="SELECT dno FROM department where dno=$dno";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="No that department no. does not exist";
                }
        
                else
                {
                    $sql="UPDATE department set dno=$new_dno WHERE dno=$dno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }
        }

        if(!empty($new_dname))
        {
            if(!empty($dname))
            {
                $sql="SELECT dno FROM department where dname='$dname'";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="No department with that department name exist";
                }
        
                else
                {
                    $sql="UPDATE department set dname='$new_dname' WHERE dname='$dname'";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
            }  
        
            else if(!empty($dno))
            {
                $sql="SELECT dno FROM department where dno=$dno";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="No that department no. does not exist";
                }
        
                else
                {
                    $sql="UPDATE department set dname='$new_dname' WHERE dno=$dno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }

            else if(empty($dname) && empty($dno))
            {
                $error="In order to update department name enter current department name or department no.";
            }
            }
        }

        if(!empty($new_locat))
        {
        
            if(!empty($locat))
            {
                $sql="SELECT dno FROM department where location='$locat'";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="No department is loacted in that location";
                }
        
                else
                {
                    $sql="UPDATE department set location='$new_locat' WHERE location='$locat'";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }
        
            else if(!empty($dno))
            {
                $sql="SELECT dno FROM department where dno=$dno";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="No that department no. does not exist";
                }
        
                else
                {
                    $sql="UPDATE department set location='$new_locat' WHERE dno=$dno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }

            else if(empty($dno) && empty($locat))
            {
                $error="In order to update department no. enter current department no. or department location";
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
    <title>Update data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Update Department Data</h1>

<h2 style="color:green;"><?php echo $result; ?></h2>
<center>
<form style="height:700px;width:80%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<h2 style="margin-bottom:10%;">Update any one category at a time</h2>
<p>Note:If multiple categories are filled first one will be executed</p>
<table>
    <tr>
        <th><h3>Category to be Updated</h3></th>
        <th><h3>Current Data in Database</h3></th>
        <th><h3>New Data to be filled</h3></th>
    </tr>

    <tr>
        <td><span class="err"><?php echo $error;?></span></td>
    </tr>

    <tr>
        <td><label for="dno">Department no.</label></td>
        <td><input type="text" name="dno" for="dno"></td>
        <td><input type="text" name="new_dno"></td><br>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
       <td><label for="dname">Department_name</label></td>
       <td><input type="text" name="dname" for="dname"></td>
       <td><input type="text" name="new_dname"></td>     
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
        <td><label for="locat">Location</label></td>
        <td><input type="text" name="locat" for="locat"></td>
        <td><input type="text" name="new_locat"></td>
    </tr>
    <tr>
    </table>   
<input class="bttnl"  type="submit" value="UPDATE"> 
<input class="bttnr" type="reset" value="RESET">   
</form>
</center>
<a href="insertDepartment.php"><button class="bttnl">INSERT</button></a>
<a href="readDepartment.php"><button class="bttnl">READ</button></a>
<a href="deleteDepartment.php"><button class="bttnr">DELETE</button></a>
</body>
</html>