<html>
<head>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />

		
<?php
include('../konfigurimi.php');
session_start();
$user_check=$_SESSION['perdoruesi'];
$ses_sql = mysqli_query($conn,"SELECT pid, perdoruesi  FROM umshf_perdoruesit WHERE perdoruesi ='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$row['perdoruesi'];
if(!isset($user_check))
{ header("Location: index.php");} 

	
    $_SESSION["member_id"] =  $row['pid'];
    
	require("dbcontroller.php");
	$dbController = new DBController();
	
	$query = "SELECT DISTINCT question_id from tbl_poll WHERE member_id = " . $_SESSION["member_id"]; 
	$result = $dbController->getIds($query);
	
	$condition = "";
	if(!empty($result)) {
	    $condition = " WHERE id NOT IN (" . implode(",", $result) . ")";
    }
    
    $query = "SELECT * FROM `tbl_question` " . $condition . " limit 1";
    $questions = $dbController->runQuery($query);
    
    if(!empty($questions)) {
?>      
		<div class="question"><?php echo $questions[0]["question"]; ?><input type="hidden" name="question" id="question" value="<?php echo $questions[0]["id"]; ?>" ></div>      
<?php 
        $query = "SELECT * FROM tbl_answer WHERE question_id = " . $questions[0]["id"];
        $answers = $dbController->runQuery($query);
        if(!empty($answers)) {
            foreach($answers as $k=>$v) {
                ?>
			<div class="question"><input type="radio" name="answer" class="radio-input" value="<?php echo $answers[$k]["id"]; ?>" /><?php echo $answers[$k]["answer"]; ?></div>      
<?php 
            }
        }
?>
		<div class="poll-bottom">
			<button id="btnSubmit" onClick="addPoll()">Dergo</button>
		</div>
<?php        
    } else {
?>

<div class="error">Votimi perfundoi me sukses!</div>


<?php 
    }
?>