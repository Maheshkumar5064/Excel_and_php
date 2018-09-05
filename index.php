//PHPFILE : UPLOAD EXCEL FILE :
//index.php :
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="mahesh_kumar">
        <title>Simple page</title>
    </head>
<body>
    
    <form  action="http://localhost/uploadExcel.php" method="POST"
           enctype="multipart/form-data">
 
               <input type="file"  name="file" >
  
               <input type= "submit" name ="Upload" >
  
    </form>
    
</body>
</html>

