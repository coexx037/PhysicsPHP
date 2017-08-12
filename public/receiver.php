<?php
include('../resources/functions.php');
$user_id = $_SESSION['user_id'];
include('../resources/queries.php');



global $link;
global $sql3;
global $sql4;


$sql1 = "delete from probs where username = '$user_id';";

//delete current problem set for the current user 
mysqli_query($link, $sql1);

$sql2 = "insert into probs (direction, variable, val, solveFor, units, username, varSolve) values
            (?, ?, ?, ?, ?, ?, ?);";

$keys = array_keys($_POST['vall']);
$values = array_values($_POST['vall']);
$units = array_values($_POST['units']);
$solve = $_POST['solve_data'];
$solveUnits = $_POST['solve_units'];
$direction = $_POST['direction'];


//insert new problem set for the given user 
if($stmt = $link->prepare($sql2)){
    $stmt->bind_param('ssdssis', $direction, $key, $val, $solvefor, $unit, $user_id, $varsolve);
    
    $key = $solve;
    $val = null;
    $solvefor = 's';
    $unit = $solveUnits;
    $varsolve = 's'.$key;
    
    $stmt->execute();
    
    for($i = 0; $i < count($keys); $i++){
        $key = $keys[$i];
        $val = $values[$i];
        $unit = $units[$i];
        $solvefor = null;
        $varsolve = $key;
        
        if(empty($val)){continue;}

        $stmt->execute();

    }
}else  { 
      echo '<br>Unable to connect'; 
      exit();
    }

$stmt->close();

/*************Solve steps**************************************/

//query database and return the most complete solution steps for the given inputs
if ($result = mysqli_query($link,$sql3)){
  if($result->num_rows === 0){
    echo '<p>Tough luck!</p>';
  }else{
      echo '<table class="table table-bordered text-center">';
        //header
        echo "<tr>";
          echo "<td>Step</td>";
          echo "<td>Direction</td>";
          echo "<td>Solution</td>";
        echo "</tr>";
      
      //for each row returned in the query, separate them into <td> tags
      while ($row = mysqli_fetch_array($result))  {
        
        echo "<tr>";
          echo "<td>{$row[0]}</td>";
          echo "<td>{$row[1]}</td>";
          echo "<td>{$row[2]}</td>";
        echo "</tr>";
      } 
      echo "</table>";  
  }
}
  
    
/********************Solution*************************************/

//query database and return the most complete solution for the given inputs
if ($result2 = mysqli_query($link,$sql4)){
  
      
      echo '<table class="table table-bordered text-center">';
        //header
        echo "<tr>";
          echo "<td>Variable</td>";
          echo "<td>Result</td>";
          echo "<td>Units</td>";
        echo "</tr>";
        
        $solve_obj = [];
      
      //for each row returned in the query, separate them into <td> tags
      
      if($row2 = mysqli_fetch_array($result2)){
      $solve_key = $row2['conc'];
      $solve_conversion = $row2['solve_conversion'];
      
      while ($row2 = mysqli_fetch_array($result2))  {
        
        $solve_obj[$row2['varsolve']] = $row2['converted_value'];
        
      } 
    }else echo "<br> can't connect";

    
    $solve_lib = solve($solve_obj);
    
    $answer = [
      'solve' => $solve,
      'solveUnits' => $solveUnits,
      'answer' => $solve_lib[$solve_key]*$solve_conversion,
      ];
      
      echo "<tr>";
          echo "<td>{$answer['solve']}</td>";
          echo "<td>{$answer['answer']}</td>";
          echo "<td>{$answer['solveUnits']}</td>";
        echo "</tr>";
      echo "</table>";
      
    
}
    mysqli_close($link);

?>


