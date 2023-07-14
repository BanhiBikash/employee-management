<?php
include_once"config.php";

$eno=$ename=$job=$manager=$hire=$dno=$comm=$salary="";
$new_eno=$new_ename=$new_job=$new_manager=$new_hire=$new_dno=$new_comm=$new_salary="";
$hire_radio=$comm_radio=$salary_radio="";
$error="";
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

//updated data

    if(!empty(trim($_POST["new_eno"])))
    $new_eno=trim($_POST["new_eno"]);

    if(!empty(trim($_POST["new_ename"])))
    $new_ename=trim($_POST["new_ename"]);
    
    if(!empty(trim($_POST["new_job"])))
    $new_job=trim($_POST["new_job"]);

    if(!empty(trim($_POST["new_manager"])))
    $new_manager=trim($_POST["new_manager"]);

    if(!empty(trim($_POST["new_hire"])))
    $new_hire=trim($_POST["new_hire"]); 
    
    if(!empty(trim($_POST["new_dno"])))
    $new_dno=trim($_POST["new_dno"]);

    if(!empty(trim($_POST["new_comm"])))
    $new_comm=trim($_POST["new_comm"]);

    if(!empty(trim($_POST["new_salary"])))
    $new_salary=trim($_POST["new_salary"]);
//dual fields
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

    if(empty(trim($new_eno)) && empty(trim($new_ename)) && empty(trim($new_job)) && empty(trim($new_manager)) && empty(trim($new_hire)) && empty(trim($new_dno)) && empty(trim($new_comm)) && empty(trim($new_salary)))
    {
        $error="Fill at least one update category";
    }

    if(empty($error))
    {
        if(!empty($new_eno))
        {
            if(empty($eno))
            {
                $error="In order to update employee no. enter current employee no.";
            }
        
            else if(!empty($eno))
            {
                $sql="SELECT eno FROM employee where eno=$eno";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="No-one with that Employee no. exist";
                }
        
                else
                {
                    $sql="UPDATE employee set eno=$new_eno WHERE eno=$eno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }
        }

        if(!empty($new_ename))
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
                    $sql="UPDATE employee set ename='$new_ename' WHERE eno=$eno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }
        
            else if(!empty($ename))
            {
                $sql="SELECT eno FROM employee where ename='$ename'";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="No-one with that Employee no. exist";
                }
        
                else
                {
                    $sql="UPDATE employee set ename='$new_ename' WHERE ename='$ename'";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }

            else if(empty($ename))
            {
                $error="In order to update employee no. enter current employee name or number";
            }
        }

        if(!empty($new_job))
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
                    $sql="UPDATE employee set job_type='$new_job' WHERE eno=$eno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }
        
            else if(!empty($job))
            {
                $sql="SELECT eno FROM employee where job_type='$job'";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="No-one is appointed on that post";
                }
        
                else
                {
                    $sql="UPDATE employee set job_type='$new_job' WHERE job_type='$job'";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }

            else if(empty($job) && empty($dno))
            {
                $error="In order to update employee job enter current employee no. or employee job";
            }
        }

        if(!empty($new_manager))
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
                    $sql="UPDATE employee set manager=$new_manager WHERE eno=$eno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }
        
            else if(!empty($manager))
            {
                $sql="SELECT eno FROM employee where manager=$manager";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="Invalid manager code";
                }
        
                else
                {
                    $sql="UPDATE employee set manager=$new_manager WHERE manager=$manager";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }

            else if(empty($manager) && empty($dno))
            {
                $error="Please enter the manager code he is currently working under or his employee no.";
            }
        }

        if(!empty($new_hire))
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
                    $sql="UPDATE employee set hire_date='$new_hire' WHERE eno=$eno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }
        
            else if(!empty($hire) && !empty($hire_radio))
            {
                $sql="SELECT eno FROM employee where hire_date='$hire'";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="No employee was hired on this date";
                }
        
               
                    if($hire_radio==1)
                    {
                        $sql="SELECT eno FROM employee where hire_date='$hire'";
                        $stmt=mysqli_query($conn,$sql);
                
                        if(!mysqli_fetch_array($stmt))
                        {
                            $error="No employee was hired on this date";
                        }

                        else{
                            $sql="UPDATE employee set hire_date='$new_hire' WHERE hire_date='$hire'";
                            $stmt=mysqli_prepare($conn,$sql);
        
                            if(mysqli_execute($stmt))
                            {
                                $error="Successfully updated.";
                            } 
                        } 
                    } 
                    
                    if($hire_radio==2)
                    {
                        $sql="SELECT eno FROM employee where hire_date<'$hire'";
                        $stmt=mysqli_query($conn,$sql);
                
                        if(!mysqli_fetch_array($stmt))
                        {
                            $error="No employee was hired before this date";
                        }

                        else{
                            $sql="UPDATE employee set hire_date='$new_hire' WHERE hire_date<'$hire'";
                            $stmt=mysqli_prepare($conn,$sql);
        
                            if(mysqli_execute($stmt))
                            {
                                $error="Successfully updated.";
                            } 
                        }  
                    }

                    if($hire_radio==3)
                    {
                        $sql="SELECT eno FROM employee where hire_date>'$hire'";
                        $stmt=mysqli_query($conn,$sql);
                
                        if(!mysqli_fetch_array($stmt))
                        {
                            $error="No employee was hired after this date";
                        }

                        else{
                            $sql="UPDATE employee set hire_date='$new_hire' WHERE hire_date>'$hire'";
                            $stmt=mysqli_prepare($conn,$sql);
        
                            if(mysqli_execute($stmt))
                            {
                                $error="Successfully updated.";
                            } 
                        } 
                    }
                
        
            }

            else if(empty($dno) && empty($hire) )
            {
                $error="Enter the employee no. or hire date";
            }
           
            else if(empty($hire) || empty($hire_radio))
            {
                $error="Please enter the date when the employee was hired and its range";
            }
        }

        if(!empty($new_dno))
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
                    $sql="UPDATE employee set dno=$new_dno WHERE eno=$eno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }
        
            else if(!empty($dno))
            {
                $sql="SELECT eno FROM employee where dno=$dno";
                $stmt=mysqli_query($conn,$sql);
        
                if(!mysqli_fetch_array($stmt))
                {
                    $error="Invalid manager code";
                }
        
                else
                {
                    $sql="UPDATE employee set dno=$new_dno WHERE dno=$dno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }

            else if(empty($dno) && empty($eno))
            {
                $error="Please enter the department code he is currently working in";
            }
        }

        if(!empty($new_comm))
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
                    $sql="UPDATE employee set commission=$new_comm WHERE eno=$eno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }
        
            else if(!empty($comm) && !empty($comm_radio))
            {
                if($comm_radio==1)
                    {
                        $sql="SELECT eno FROM employee where commission=$comm";
                        $stmt=mysqli_query($conn,$sql);
                
                        if(!mysqli_fetch_array($stmt))
                        {
                            $error="No employee gets this amount as commission";
                        }

                        else{
                            $sql="UPDATE employee set commission=$new_comm WHERE commission=$comm";
                            $stmt=mysqli_prepare($conn,$sql);
        
                            if(mysqli_execute($stmt))
                            {
                                $error="Successfully updated.";
                            } 
                        } 
                    } 
                    
                    if($comm_radio==2)
                    {
                        $sql="SELECT eno FROM employee where commission=$comm";
                        $stmt=mysqli_query($conn,$sql);
                
                        if(!mysqli_fetch_array($stmt))
                        {
                            $error="No employee gets more than this amount as commission";
                        }

                        else{
                            $sql="UPDATE employee set commission=$new_comm WHERE commission>=$comm";
                            $stmt=mysqli_prepare($conn,$sql);
        
                            if(mysqli_execute($stmt))
                            {
                                $error="Successfully updated.";
                            } 
                        }  
                    }

                    if($comm_radio==3)
                    {
                        $sql="SELECT eno FROM employee where commission=$comm";
                        $stmt=mysqli_query($conn,$sql);
                
                        if(!mysqli_fetch_array($stmt))
                        {
                            $error="No employee gets less than this amount as commission";
                        }

                        else{
                            $sql="UPDATE employee set commission=$new_comm WHERE commission<=$comm";
                            $stmt=mysqli_prepare($conn,$sql);
        
                            if(mysqli_execute($stmt))
                            {
                                $error="Successfully updated.";
                            } 
                        } 
                    }
                
        
            }

            
            else if(empty($comm) &&empty($dno))
            {
                $error="Please enter the commission the employee earned or his employee no.";
            }

            else if(empty($comm_radio))
            {
                $error="Enter the range of employee under that commission";
            }
        }

        if(!empty($new_salary))
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
                    $sql="UPDATE employee set salary=$new_salary WHERE eno=$eno";
                    $stmt=mysqli_prepare($conn,$sql);
        
                    if(mysqli_execute($stmt))
                    {
                        $error="Successfully updated.";
                    }                    
                }
        
            }
        
            else if(!empty($salary) && !empty($salary_radio))
            {
                if($salary_radio==1)
                    {
                        $sql="SELECT eno FROM employee where salary=$salary";
                        $stmt=mysqli_query($conn,$sql);
                
                        if(!mysqli_fetch_array($stmt))
                        {
                            $error="No employee gets this amount as salary";
                        }

                        else{
                            $sql="UPDATE employee set salary=$new_salary WHERE salary=$salary";
                            $stmt=mysqli_prepare($conn,$sql);
        
                            if(mysqli_execute($stmt))
                            {
                                $error="Successfully updated.";
                            } 
                        } 
                    } 
                    
                    if($salary_radio==2)
                    {
                        $sql="SELECT eno FROM employee where salary=$salary";
                        $stmt=mysqli_query($conn,$sql);
                
                        if(!mysqli_fetch_array($stmt))
                        {
                            $error="No employee gets more than this amount as salary";
                        }

                        else{
                            $sql="UPDATE employee set salary=$new_salary WHERE salary>=$salary";
                            $stmt=mysqli_prepare($conn,$sql);
        
                            if(mysqli_execute($stmt))
                            {
                                $error="Successfully updated.";
                            } 
                        }  
                    }

                    if($salary_radio==3)
                    {
                        $sql="SELECT eno FROM employee where salary=$salary";
                        $stmt=mysqli_query($conn,$sql);
                
                        if(!mysqli_fetch_array($stmt))
                        {
                            $error="No employee gets less than this amount as salary";
                        }

                        else{
                            $sql="UPDATE employee set salary=$new_salary WHERE salary<=$salary";
                            $stmt=mysqli_prepare($conn,$sql);
        
                            if(mysqli_execute($stmt))
                            {
                                $error="Successfully updated.";
                            } 
                        } 
                    }
                
        
            }

            else if(empty($salary) && empty($dno))
            {
                $error="Please enter the salary the employee earned or his employee no.";
            }

            else if(empty($salary_radio))
            {
                $error="Enter the range of employee under that salary";
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
    <title>Update data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Update Employee Data</h1>

<h2 style="color:green;"><?php echo $result; ?></h2>
<center>
<form style="height:1580px;width:80%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
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
        <td><label for="eno">Employee no.</label></td>
        <td><input type="text" name="eno" for="eno"></td>
        <td><input type="text" name="new_eno"></td><br>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
       <td><label for="ename">Employee_name</label></td>
       <td><input type="text" name="ename" for="ename"></td>
       <td><input type="text" name="new_ename"></td>     
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
        <td><label for="job">Job_Type</label></td>
        <td><input type="text" name="job" for="job"></td>
        <td><input type="text" name="new_job"></td>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
        <td><label for="manager">Managers</label></td>
        <td><input type="text" name="manager" for="manager"></td>
        <td><input type="text" name="new_manager"></td>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>        
    </tr>
    <tr>
        <td><label for="hire">Hire_date:</label></td>
        <td><input type="date" name="hire" for="name"></td>
        <td><input type="date" name="new_hire"></td>   
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
        <td><input type="number" name="new_dno"></td>
    </tr>
    <tr>
        <td><pre>

        </pre>
        </td>
    </tr>

    <tr>
        <td><label for="comm">Commission:</label></td>
        <td><input type="number" step="0.01" name="comm" for="comm"></td>
        <td><input type="number" step="0.01" name="new_comm"></td>
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
        <td><input type="number" step="0.01" name="new_salary"></td>
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
<input class="bttnl"  type="submit" value="UPDATE"> 
<input class="bttnr" type="reset" value="RESET">   
</form>
</center>
<a href="insertEmployee.php"><button class="bttnl">INSERT</button></a>
<a href="readEmployee.php"><button class="bttnl">READ</button></a>
<a href="deleteEmployee.php"><button class="bttnr">DELETE</button></a>
</body>
</html>