<?php 
include_once"config.php";

$eno=$ename=$job=$manager=$hire=$salary=$comm=$dno="";
$ename_err=$eno_err=$job_err=$manager_err=$hire_err=$dno_err=$comm_err=$salary_err="";
$result="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
if(empty(trim($_POST["eno"])))
{
    $eno_err="Please enter employee no.";
}

else{
    $eno=trim($_POST["eno"]);
}

if(empty(trim($_POST["ename"])))
{
    $ename_err="Please enter employee name.";
}

else
{
    $ename=trim($_POST["ename"]);
}

if(empty(trim($_POST["job"])))
{
    $job_err="Enter employee's job.";
}

else
{
    $job=trim($_POST["job"]);
}

if(empty(trim($_POST["manager"])))
{
    $manager_err="Enter the manager he is working under.";
}

else{
    $manager=trim($_POST["manager"]);
}

if(empty(trim($_POST["hire"])))
{
    $hire_err="Enter the date on which he/she is hired.";
}

else{
    $hire=trim($_POST["hire"]);
}

if(empty(trim($_POST["dno"])))
{
    $dno_err="Enter the department error.";
}

else
{
    $dno=trim($_POST["dno"]);
}

if(empty(trim($_POST["comm"])))
{
    $comm_err="Enter the commission earned.";
}

else{
    $comm=trim($_POST["comm"]);
}

if(empty(trim($_POST["salary"])))
{
    $salary_err="Enter the salary he/she earns.";
}

else
{
    $salary=trim($_POST["salary"]);
}

if(empty($eno_err) && empty($ename_err) && empty($job_err) && empty($manager_err) && empty($hire_err) && empty($dno_err) && empty($comm_err) && empty($salary_err))
{ 
    $sql="INSERT INTO employee (Eno, Ename,Job_type, Manager, Hire_date,Dno, Commission, Salary) VALUES ('$eno', '$ename', '$job', '$manager', '$hire', $dno, $comm, $salary)";

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
    <title>Insert Employee Data</title>
    <link rel="stylesheet" href="style.css">
</head><center>
<body>
    <h1>Insert Employee Data</h1>
    <h2 style="color:green;"><?php echo $result; ?></h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    <h2 style="margin-bottom:10%;">Fill this form</h2>
    <input type="button" name="all" value="SEE ALL DATA">
    <table>
        <tr>
            <td> <label for="eno">Eno:</label></td>
            <td><input type="text" name="eno" for="eno" placeholder="Enter employee no."></td>
        </tr>
        <tr class="err">
            <td><span><?php echo $eno_err ?></span></td>
        </tr>

        <tr>
            <td><label for="ename">Ename:</label></td>
            <td><input type="text" name="ename" for="ename" placeholder="Enter employee name"></td>
        </tr>
        <tr class="err">
            <td><span><?php echo $ename_err ?></span></td>
        </tr>

        <tr>
            <td><label for="job">Job_Type:</label></td>
            <td><input type="text" name="job" for="job" placeholder="Enter job post"></td>
        </tr>
        <tr class="err">
            <td><span><?php echo $job_err ?></span></td>
        </tr>

        <tr>
            <td><label for="manager">Manager:</label></td>
            <td><input type="text" name="manager" for="manager" placeholder="Name of manager"></td>
        </tr>
        <tr class="err">
            <td><p>NOTE:IF no manager enter the value 0</p></td>
            <td><span><?php echo $manager_err ?></span></td>
        </tr>

        <tr>
            <td><label for="hire">Hire_date:</label></td>
            <td><input type="date" name="hire" for="hire" placeholder="Date on which hired"></td>
        </tr>
        <tr class="err">
            <td><span><?php $hire_err ?></span></td>
        </tr>

        <tr>
            <td><label for="Dno">Dno. :</label></td>
            <td><input type="number" name="dno" for="dno" placeholder="Enter department number"></td>
        </tr>
        <tr>
            <td><span><?php $dno_err ?></span></td>
        </tr>

        <tr>
            <td><label for="comm">Commission:</label></td>
            <td><input type="number" step="0.01" name="comm" for="comm" placeholder="Enter commission earned"></td>
        </tr>
        <tr>
            <td><span><?php $comm_err ?></span></td>
        </tr>

        <tr>
            <td><label for="salary">Salary:</label></td>
            <td><input type="number" step="0.01" name="salary" for="salary" placeholder="Enter salary"></td>
        </tr>
        <tr>
            <td><span><?php $salary_err ?></span></td>
        </tr>
    </table>   
    <input class="bttnl"  type="submit" value="INSERT"> 
    <input class="bttnr" type="reset" value="RESET">   
    </form>

    <a href="readEmployee.php"><button class="bttnl">READ</button></a>
    <a href="updateEmployee.php"><button class="bttnl">UPDATE</button></a>
    <a href="deleteEmployee.php"><button class="bttnr">DELETE</button></a>
</body></center>
</html>