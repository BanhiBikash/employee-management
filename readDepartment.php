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

    if(empty($dname_err) || empty($dno_err) || empty($locat_err))
    {

        if(!empty($dno))
        {
        $sql="SELECT dno,dname,location FROM department WHERE dno=$dno";

        $stmt=mysqli_prepare($conn,$sql);
            mysqli_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)>0)
            {
                mysqli_stmt_bind_result($stmt,$dno,$dname,$locat);
                mysqli_stmt_fetch($stmt);
                ?>

                <center><h2>Search Results</h2>
                <table>
                    <tr>
                        <th><?php echo"Dno"?></th>
                        <th><?php echo"Dname"?></th>
                        <th><?php echo"Location"?></th>
                    </tr>
                   <tr>
                       <td><?php echo $dno?></td>
                       <td><?php echo $dname ?></td>
                       <td><?php echo $locat ?></td>
                   </tr>
                </table></center>

                <?php
                $dname_err="";
                $locat_err="";
            }

            else
            $result="No record found";
        }
        
        else if(!empty($dname))
        {
        $sql="SELECT dno,dname,location FROM department WHERE dname='$dname'";

        $stmt=mysqli_prepare($conn,$sql);
            mysqli_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)>0)
            {
                mysqli_stmt_bind_result($stmt,$dno,$dname,$locat);
                mysqli_stmt_fetch($stmt);
                ?>

                <center><h2>Search Results</h2>
                <table>
                    <tr>
                        <th><?php echo"Dno"?></th>
                        <th><?php echo"Dname"?></th>
                        <th><?php echo"Location"?></th>
                    </tr>
                   <tr>
                       <td><?php echo $dno?></td>
                       <td><?php echo $dname ?></td>
                       <td><?php echo $locat ?></td>
                   </tr>
                </table></center>

                <?php
                $dno_err="";
                $locat_err="";
            }

            else
            $result="No record found";
        }

        else if(!empty($locat))
        {
        $sql="SELECT dno,dname,location FROM department WHERE location='$locat'";

        $stmt=mysqli_prepare($conn,$sql);
            mysqli_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)>0)
            {
                mysqli_stmt_bind_result($stmt,$dno,$dname,$locat);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Dno"?></th>
                        <th><?php echo"Dname"?></th>
                        <th><?php echo"Location"?></th>
                    </tr>
        <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$dno} </td>";
                     echo " <td> {$dname} </td>";
                      echo" <td> {$locat} </td>";
                   echo"</tr>"; }?>
                </table></center>
                
                <?php
                $dname_err="";
                $dno_err="";
            }

            else
            $result="No record found";
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
    <title>Read department data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
        <h1 style="color:red;"><?php echo $result ?></h1>
        <h1>Read Department Data</h1>
        <p>Note:In case multiple search actegory are choosen first one will be executed</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <h2>READ DATA</h2>
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
        <input class="bttnl" type="submit" value="READ">
        <input class="bttnr" type="reset" value="RESET">
        </form>
        <a href="insertDepartment.php"><button class="bttnl">INSERT</button></a>
        <a href="updateDepartment.php"><button class="bttnl">UPDATE</button></a>
        <a href="deleteDepartment.php"><button class="bttnr">DELETE</button></a>
    </center>
</body>
</html>