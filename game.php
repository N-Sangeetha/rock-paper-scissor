<?php



// Set up the values for the game...
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;

$computer = rand(0,2); 
function check($computer, $human) {
    if ( $human == $computer ) {
        return "Tie";
    } else if ( ($human == 1 && $computer == 0) || ($human == 0 && $computer == 2) || ($human == 2 && $computer == 1)) {
        return "You Win";
    } else if ( ($human == 0 && $computer == 1) || ($human == 1 && $computer == 2) || ($human == 2 && $computer == 0)) {
        return "You Lose";
    }
    return false;
}

// Check to see how the play happenned
$result = check($computer, $human);

?>
<!DOCTYPE html>
<html>
<head>
<title>rock-paper-scissor</title>
</head>
<style>
h1{color:#ff0066;}
select{width:180px;height:30px;font-size:16px; position:absolute;text-align:center;}
input{width:100px; height:30px;}
body{background:#9966ff;}
</style>

<body>
<div class="container">
<h1><center>Rock Paper Scissors</center></h1>

<form method="post">
<select name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select><br><br>
<input type="submit" value="Play" >
</form>

<pre>
<?php
if ( $human == -1 ) {
    print "Please select a strategy and press Play.\n";
} else if ( $human == 3 ) {
    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check($c, $h);
            echo "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        }
    }
} else {
    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
}
?>
</pre>
</div>
</body>
</html>
