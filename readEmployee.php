<?php
include_once"config.php";

$eno=$ename=$job=$manager=$hire=$dno=$comm=$salary="";
$hire_radio=$comm_radio=$salary_radio="";
$error=$all="";
$result="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(!empty(trim($_POST["eno"])))
    $eno=trim($_POST["eno"]);

    if(!empty(trim($_POST["ename"])))
    $ename=trim($_POST["ename"]);

    if(!empty(trim($_POST["job"])))
    $job=trim($_POST["job"]);

    if(!empty(trim($_POST["manager"])))
    $manager=trim($_POST["manager"]);

    if(!empty(trim($_POST["hire"])))
    $hire=trim($_POST["hire"]); 
    
    if(!empty(trim($_POST["dno"])))
    $dno=trim($_POST["dno"]);

    if(!empty(trim($_POST["comm"])))
    $comm=trim($_POST["comm"]);

    if(!empty(trim($_POST["salary"])))
    $salary=trim($_POST["salary"]);

    if(!empty($_POST["hire_radio"]))
    {
        $hire_radio=trim($_POST["hire_radio"]);
    }

    if(!empty($_POST["comm_radio"]))
    {
        $comm_radio=trim($_POST["comm_radio"]);
    }

    if(!empty($_POST["salary_radio"]))
    {
        $salary_radio=trim($_POST["salary_radio"]);
    }

    if(empty(trim($eno)) && empty(trim($ename)) && empty(trim($job)) && empty(trim($manager)) && empty(trim($hire)) && empty(trim($dno)) && empty(trim($comm)) && empty(trim($salary)))
    {
        $error="Fill at least one search category";
    }

    if((!empty(trim($hire)) && empty($hire_radio)) || (!empty(trim($comm)) && empty($comm_radio)) || (!empty(trim($salary)) && empty($salary_radio)))
    {
        $error="The selected category require two fields.";
    }

    if((empty(trim($hire)) && !empty($hire_radio)) || (empty(trim($comm)) && !empty($comm_radio)) || (empty(trim($salary)) && !empty($salary_radio)))
    {
        $error="The selected category require two fields.";
    }

    if(empty($error))
    {
        if(!empty($eno))
        {
            $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE eno=$eno";

            $stmt=mysqli_prepare($conn,$sql);
            mysqli_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)>0)
            {
                mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
            <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                <?php
            }

            else
            {
                $error="No matches found";
            }
        }

        else if(!empty($ename))
        {
            $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE ename='$ename'";

            $stmt=mysqli_prepare($conn,$sql);
            mysqli_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)>0)
            {
                mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
            <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                <?php
            }

            else
            {
                $error="No matches found";
            }
        }

        else if(!empty($job))
        {
            $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE job_type='$job'";
            
            $stmt=mysqli_prepare($conn,$sql);
            mysqli_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)>0)
            {
                mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
            <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                <?php
            }

            else
            {
                $error="No matches found";
            }
        }

        else if(!empty($manager))
        {
            $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE manager='$manager'";
            
            $stmt=mysqli_prepare($conn,$sql);
            mysqli_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)>0)
            {
                mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
            <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                <?php
            }

            else
            {
                $error="No matches found";
            }
        }

        else if(!empty($hire) && !empty($hire_radio))
        {
            if($hire_radio==1)
            {
                $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE hire_date='$hire'";
            
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)>0)
                {
                    mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
                <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                    <?php
                }

                else
                {
                    $error="No matches found";
                }
            }

            if($hire_radio==2)
            {
                $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE hire_date<'$hire'";
            
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)>0)
                {
                    mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
                <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                    <?php
                }

                else
                {
                    $error="No matches found";
                }
            }

            if($hire_radio==3)
            {
                $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE hire_date>'$hire'";
            
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)>0)
                {
                    mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
                <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                    <?php
                }

                else
                {
                    $error="No matches found";
                }
            }
        }

        else if(!empty($dno))
        {
            $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE dno=$dno";
            
            $stmt=mysqli_prepare($conn,$sql);
            mysqli_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)>0)
            {
                mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
                <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                <?php
            }

            else
            {
                $error="No matches found";
            }
        }

        else if(!empty($comm) && !empty($comm_radio))
        {
            if($comm_radio==1)
            {
                $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE commission='$comm'";
            
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)>0)
                {
                    mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
                    <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                    <?php
                }

                else
                {
                    $error="No matches found";
                }
            }

            if($comm_radio==2)
            {
                $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE commission>='$comm'";
            
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)>0)
                {
                    mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
                <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                    <?php
                }

                else
                {
                    $error="No matches found";
                }
            }

            if($comm_radio==3)
            {
                $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE commission<='$comm'";
            
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)>0)
                {
                    mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
                    <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                    <?php
                }

                else
                {
                    $error="No matches found";
                }
            }
        }

        else if(!empty($salary) && !empty($salary_radio))
        {
            if($salary_radio==1)
            {
                $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE salary='$salary'";
            
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)>0)
                {
                    mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
                <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                    <?php
                }

                else
                {
                    $error="No matches found";
                }
            }

            if($salary_radio==2)
            {
                $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE salary>='$salary'";
            
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)>0)
                {
                    mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
                <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                    <?php
                }

                else
                {
                    $error="No matches found";
                }
            }

            if($salary_radio==3)
            {
                $sql="SELECT eno,ename,job_type,manager,hire_date,dno,commission,salary FROM employee WHERE salary<='$salary'";
            
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)>0)
                {
                    mysqli_stmt_bind_result($stmt,$eno,$ename,$job,$manager,$hire,$dno,$comm,$salary);
                
                ?>

                <center><h2>Search Results</h2>
                <table class="res">
                    <tr>
                        <th><?php echo"Eno"?></th>
                        <th><?php echo"Ename"?></th>
                        <th><?php echo"Job_type"?></th>
                        <th><?php echo "Manager"?></th>
                        <th><?php echo "Hire_date"?></th>
                        <th><?php echo "dno"?></th>
                        <th><?php echo "commission"?></th>
                        <th><?php echo "salary"?></th>
                    </tr>
                <?php      while(mysqli_stmt_fetch($stmt)){
                   echo"<tr>";
                     echo "<td> {$eno} </td>";
                     echo "<td> {$ename} </td>";
                     echo "<td> {$job} </td>";
                     echo "<td> {$manager} </td>";
                     echo "<td> {$hire} </td>";  
                     echo "<td> {$dno} </td>";
                     echo " <td> {$comm} </td>";
                      echo" <td> {$salary} </td>";
                   echo"</tr>"; }?>
                </table></center>

                    <?php
                }

                else
                {
                    $error="No matches found";
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
    <title>Read data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Read Employee Data</h1>

<h2 style="color:green;"><?php echo $result; ?></h2>
<center>
<form style="height:1530px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<h2 style="margin-bottom:10%;">Search using any one category</h2>
<p>Note:If multiple categories are filled first one will be executed</p>
<table>
    <tr>
        <th><h3>Search using</h3></th>
        <th><h3>Details</h3></th>
    </tr>

    <tr>
        <td><span class="err"><?php echo $error;?></span></td>
    </tr>

    <tr>
        <td><label for="eno">Employee no.</label></td>
        <td><input type="text" name="eno" for="eno"></td><br>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
       <td><label for="ename">Employee_name</label></td>
       <td><input type="text" name="ename" for="ename"></td>      
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
        <td><label for="job">Job_Type</label></td>
        <td><input type="text" name="job" for="job"></td>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
        <td><label for="manager">Managers</label></td>
        <td><input type="text" name="manager" for="manager"></td>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>        
    </tr>
    <tr>
        <td><label for="hire">Hire_date:</label></td>
        <td><input type="date" name="hire" for="name"></td>   
    </tr>
    <tr>
    <td><input type="radio" name="hire_radio" value="1"><label>On_this_date</label></td>
    </tr>
    <tr>
    <td><input type="radio" name="hire_radio" value="2"><label>Before_this_date</label></td>
    </tr>
    <tr>
    <td><input type="radio" name="hire_radio" value="3"><label>After_this_date</label></td>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>
    
    <tr>
        <td><label for="dno">Dno:</label></td>
        <td><input type="number" name="dno" for="dno"></td>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
        <td><label for="comm">Commission:</label></td>
        <td><input type="number" step="0.01" name="comm" for="comm"></td>
    </tr>
    <tr>
    <td><input type="radio" name="comm_radio" value="1"><label>Gets_this_Commission</label></td>
    </tr>
    <tr>
    <td><input type="radio" name="comm_radio" value="2"><label>Minimum_this_commission</label></td>
    </tr>
    <tr>
    <td><input type="radio" name="comm_radio" value="3"><label>Maximum_this_commission</label></td>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
        <td><label for="salary">Salary:</label></td>
        <td><input type="number" step="0.01" name="salary" for="salary"></td>
    </tr>
    <tr>
    <td><input type="radio" name="salary_radio" value="1"><label>Gets_this_Salary</label></td>
    </tr>
    <tr>
    <td><input type="radio" name="salary_radio" value="2"><label>Minimum_this_Salary</label></td>
    </tr>
    <tr>
    <td><input type="radio" name="salary_radio" value="3"><label>Maximum_this_Salary</label></td>
    </tr> 
</table>   
<input class="bttnl"  type="submit" value="SEARCH"> 
<input class="bttnr" type="reset" value="RESET">   
</form>
</center>
<a href="insertEmployee.php"><button class="bttnl">INSERT</button></a>
<a href="updateEmployee.php"><button class="bttnl">UPDATE</button></a>
<a href="deleteEmployee.php"><button class="bttnr">DELETE</button></a>
</body>
</html>