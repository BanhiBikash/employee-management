<?php
include_once"config.php";

$dno=$dname=$locat="";
$dno_err=$dname_err=$locat_err="";
$result="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
if(empty(trim($_POST["dno"])))
{
    $dno_err="Please enter department no.";
}

else{
    $dno=trim($_POST["dno"]);
}

if(empty(trim($_POST["dname"])))
{
    $dname_err="Please enter department name.";
}

else
{
    $dname=trim($_POST["dname"]);
}

if(empty(trim($_POST["locat"])))
{
    $locat_err="Enter department location";
}

else
{
    $locat=trim($_POST["locat"]);
}

    if(empty($dname_err) && empty($dno_err) && empty($locat_err))
    {
        $sql="INSERT INTO department (dno,dname,location) VALUES ('$dno', '$dname', '$locat')";

        $stmt=mysqli_query($conn,$sql);
    
        if($stmt)
        {
            $result="Successfully Inserted data";
        }
    
        else
        {
            $result="Failed to insert data.Please try again";
        }
    
        $conn->close();
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert department data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
        <h1><?php echo $result ?></h1>
        <h1>Insert Department Data</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <table style="margin:15%;">
            <tr>
                <td><label for="dno">Dno</label></td>
                <td><input type="text" name="dno"></td>
            </tr>
            <tr>
            <td><span class="err"><?php echo $dno_err; ?></span></td>
            </tr>
            <tr>
                <td><label for="dname">Dname</label></td>
                <td><input type="text" name="dname"></td>
            </tr>
            <tr>
            <td><span class="err"><?php echo $dname_err; ?></span></td>
            </tr>
            <tr>
                <td><label for="locat">Location</label></td>
                <td><input type="text" name="locat"></td>
            </tr>
            <tr>
            <td><span class="err"><?php echo $locat_err; ?></span></td>
            </tr>
        </table>
        <input class="bttnl" type="submit" value="INSERT">
        <input class="bttnr" type="reset" value="RESET">
        </form>
        <a href="readDepartment.php"><button class="bttnl">READ</button></a>
        <a href="updateDepartment.php"><button class="bttnl">UPDATE</button></a>
        <a href="deleteDepartment.php"><button class="bttnr">DELETE</button></a>
    </center>
</body>
</html>