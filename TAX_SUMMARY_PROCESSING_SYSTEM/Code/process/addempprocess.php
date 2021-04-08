<?php


require_once ('dbh.php');
   session_start();
   $firstName='';
   $lastName='';
   $email='';
   $contact='';
   $tot_tax_liability='';
   $gender='';
   $nid='';
   $tax='';
   $income_tax='';
   $salary='';
   $birthday='';
   $error=0;
   if(empty($_POST['firstName']))
   {
    $_SESSION['error_firstname']='This field should not be empty';
    $error++;
   }
   else
   {
    $firstName = $_POST['firstName'];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
        $_SESSION['error_firstname'] = "Don't Use Special Characters or Numbers";
        $error++;
      }
   }

   if(empty($_POST['lastName']))
   {
    $_SESSION['error_lastname']='This field should not be empty';
    $error++;
   }
   else
   {
    $lastName = $_POST['lastName'];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
        $_SESSION['error_lastname'] = "Don't Use Special Characters or Numbers";
        $error++;
      }
   }

   if(empty($_POST['email']))
   {
    $_SESSION['error_email']='This field should not be empty';
    $error++;
   }
   else
   {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_email'] = "Invalid email format";
        $error++;
      }
   }

   if(empty($_POST['contact']))
   {
    $_SESSION['error_contact']='This field should not be empty';
    $error++;
   }
   else
   {
    $contact = $_POST['contact'];
    $len=strlen($contact);
    if($len!=10)
    {
        $_SESSION['error_contact']='Invalid number format';
        $error++;
    }
    else
    {
        for($i = 0; $i < $len; ++$i)
        {
            $a=ord($contact[$i]);
            if(($a>=48&&$a<=57))
            {}
            else
            {
            $_SESSION['error_contact']="Contact Number Should be in Number";
            $error++;
            break;
            }
        }
    }
   }
   if(empty($_POST['tax']))
   {
    $_SESSION['error_tax']='This field should not be empty';
    $error++;
   }
   else
   {
    $tax = $_POST['tax'];
    $len=strlen($tax);
    for($i = 0; $i < $len; ++$i)
        {
            $a=ord($tax[$i]);
            if(($a>=48&&$a<=57))
            {}
            else
            {
            $_SESSION['error_tax']="Tax Should be in Number";
            $error++;
            break;
            }
        }
    
   }

    if(empty($_POST['income_tax']))
   {
    $_SESSION['error_income_tax']='This field should not be empty';
    $error++;
   }
   else
   {
    $income_tax = $_POST['income_tax'];
    $len=strlen($income_tax);
    for($i = 0; $i < $len; ++$i)
        {
            $a=ord($income_tax[$i]);
            if(($a>=48&&$a<=57))
            {}
            else
            {
            $_SESSION['error_income_tax']="Income Tax Should be in Number";
            $error++;
            break;
            }
        }
    
   }

   if(empty($_POST['tot_tax_liability']))
   {
    $_SESSION['error_tot_tax_liability']='This field should not be empty';
    $error++;
   }
   else
   {
    $tot_tax_liability = $_POST['tot_tax_liability'];
   }

   if(empty($_POST['gender']))
   {
    $_SESSION['error_gender']='This field should not be empty';
    $error++;
   }
   else
   {
    $gender = $_POST['gender'];
   }

   if(empty($_POST['nid']))
   {
    $_SESSION['error_nid']='This field should not be empty';
    $error++;
   }
   else
   {
    $nid = $_POST['nid'];
    $len=strlen($nid);
    if($len!=11)
    {
        $_SESSION['error_nid']='Invalid IFSC';
        $error++;
    }
    else
    {
        for($i = 0; $i < 4; ++$i)
        {
            $a=ord($nid[$i]);
            if(($a>=65&&$a<=90))
            {}
            else
            {
                $_SESSION['error_nid']="First 4 letters are capital";
                $error++;
                break;
            }
        }
        if(!isset($_SESSION['error_nid']))
        {
            for($i = 4; $i < $len; ++$i)
            {
                $a=ord($nid[$i]);
                if(($a>=48&&$a<=57))
                {}
                else
                {
                $_SESSION['error_nid']="Last 6 Digit Should Be Number";
                $error++;
                break;
                }
            }
         }   
      }
   }
   if(empty($_POST['salary']))
   {
    $_SESSION['error_salary']='This field should not be empty';
    $error++;
   }
   else
   {
    $salary = $_POST['salary'];
    $len=strlen($salary);
    $sum=0;
    for($i = 0; $i < $len; ++$i)
        {
            $a=ord($salary[$i]);
            if(($a>=48&&$a<=57))
            {}
            else
            {
            $_SESSION['error_salary']="Salary Should be in Number";
            $error++;
            break;
            }
        }
    if(!isset($_SESSION['error_salary']))
    {
        for($i = 0; $i < $len; ++$i)
        {
          $sum=$sum+(int)$salary[$i];
        }
        if($sum==0)
        {
           $_SESSION['error_salary']='Salary Cannot Be Zero';
           $error++;  
        }
    }
   }

$birthday =$_POST['birthday'];
$birthday_year = strtotime($_POST['birthday']); 
$year=date('Y',$birthday_year);
$current_year=date("Y");
$age=(int)$current_year-(int)$year;
if(empty($_POST['birthday']))
{
    $_SESSION['error_birthday']='This field should not be empty';
    $error++;
}
else{
   if($age<21)
   {
    $_SESSION['error_birthday']='Not Eligible To Pay The Tax';
    $error++;
   }
}
$files = $_FILES['file'];
$filename = $files['name'];
$filrerror = $files['error'];
$filetemp = $files['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png' , 'jpg' , 'jpeg');
if($error==0)
{
    if(in_array($filecheck, $fileextstored)){

        $destinationfile = 'images/'.$filename;
        move_uploaded_file($filetemp, $destinationfile);

        $sql = "INSERT INTO `employee`(`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `nid`,  `tot_tax_liability`, `tax`, `income_tax`, `pic`) VALUES ('','$firstName','$lastName','$email','1234','$birthday','$gender','$contact','$nid','$tot_tax_liability','$tax','$income_tax','$destinationfile')";

    $result = mysqli_query($conn, $sql);

    $last_id = $conn->insert_id;

    $sqlS = "INSERT INTO `salary`(`id`, `base`, `bonus`, `total`) VALUES ('$last_id','$salary',0,'$salary')";
    $salaryQ = mysqli_query($conn, $sqlS);
    $stat = mysqli_query($conn, "INSERT INTO `stat`(`eid`) VALUES ('$last_id')");

    if(($result) == 1){
        
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered')
        window.location.href='..//viewemp.php';
        </SCRIPT>");
        //header("Location: ..//aloginwel.php");
    }

    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Failed to Register')
        window.location.href='javascript:history.go(-1)';
        </SCRIPT>");
    }

    }

    else{

        $sql = "INSERT INTO `employee`(`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `nid`,  `tot_tax_liability`, `tax`, `income_tax`, `pic`) VALUES ('','$firstName','$lastName','$email','1234','$birthday','$gender','$contact','$nid','$tot_tax_liability','$tax','$income_tax','images/no.jpg')";

    $result = mysqli_query($conn, $sql);

    $last_id = $conn->insert_id;

    $sqlS = "INSERT INTO `salary`(`id`, `base`, `bonus`, `total`) VALUES ('$last_id','$salary',0,'$salary')";
    $salaryQ = mysqli_query($conn, $sqlS);
    $rank = mysqli_query($conn, "INSERT INTO `stat`(`eid`) VALUES ('$last_id')");

    if(($result) == 1){
        
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered')
        window.location.href='..//viewemp.php';
        </SCRIPT>");
        //header("Location: ..//aloginwel.php");
    }

    // else{
    //     echo ("<SCRIPT LANGUAGE='JavaScript'>
    //     window.alert('Failed to Registere')
    //     window.location.href='javascript:history.go(-1)';
    //     </SCRIPT>");
    // }
    }
}
else
{
   header('location:..//addemp.php');
}





?>