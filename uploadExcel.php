//PHP FILE : INSERTING EXCEL DATA TO DATABASE:
//uploadExcel.php
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="mahesh_kumar">
        <title>Simple page</title>
    </head>
<body>
    
    <?php 
    define("DB_SERVER", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "root");
    define("DB_DATABASE", "demo_data");
    
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    
     if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } 
    else{
                      echo "Database connected <br>";
    }
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $handle = fopen($fileTmpName, 'r');
    $count=1;
    while(($filesop = fgetcsv($handle, 1000, ',')) !== false)
   {
    if($count==1)
   {
     for ($i = 0; $i < 4; $i++) 
     {
     
       if($filesop[$i]=='name')
       {        $name = $filesop[$i]; 
                 $a=$i;         }
        if($filesop[$i]=='email')
       {     $email =  $filesop[$i];
              $b=$i;           }
       if($filesop[$i]=='phone')
       {      $phone= $filesop[$i]; 
              $c=$i;           } 
       if($filesop[$i]=='city')
       {      $city=  $filesop[$i];
              $d=$i;          }
      }
      $count++;
     }
     else{
     $name = $filesop[$a];
     $email = $filesop[$b];
     $phone= $filesop[$c];
     $city= $filesop[$d];
     $run =mysqli_query($conn,"INSERT INTO excel_data (name,email,phone,city) VALUES ('$name','$email','$phone','$city')"); 
  }
  }

   if($run){
     echo "<script type=\"text/javascript\">   alert(\"You database has imported successfully\");    </script>";
   }
   else{
   echo "<script type=\"text/javascript\">   alert(\"There is a problem\");    </script>";
   }
?>
</body>
</html>
