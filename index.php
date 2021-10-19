<?php
include('db.php');
if(isset($_POST['submit'])){
    $str=mysqli_real_escape_string($con,$_POST['str']);
    $sql="select Dates, Types, $str from summary";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
       while($row=mysqli_fetch_assoc($res)){
           echo '<pre>';
           print_r($row);
       }
    }else{
        echo "No Data Found";
    }
    $fp = fopen('persons.csv', 'w');

    foreach ($res as $fields) {
        fputcsv($fp, $fields);
    }
  
    fclose($fp);
}
?>
<form method="post">
    <input type="textbox" name="str" required/>
    <input type="submit" name="submit" value="Search"/>
</form>
<a href="persons.csv"> The csv link </a>
