<?php
    $formatos = array( '.pptx','.exe','.xlsx','.pdf','.txt', '.doc', '.docx', '.jpg', '.gif', '.bmp', '.png', '.avi', '.mp4', '.mpeg', '.mwv', '.mp3', '.wav', '.wma', '.zip','.rar', '.tar');
    $directorio ='archivos';
    $contadorArchivos =0;
    if (isset($_POST['boton'])){ 
       $nombreArchivo = $_FILES['archivo']['name'];
       $nombreTmpArchivo = $_FILES['archivo']['tmp_name'];
       $ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));
       if (in_array($ext, $formatos)) {
            if (move_uploaded_file($nombreTmpArchivo, "archivos/$nombreArchivo")){
                echo"Archivo $nombreArchivo subido exitosamente";
                
            }else {
                echo"Error en carga";
            }       
       }else{
           echo "No es archivo compatible";
       }
    } 

 

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8"> 
    <title>YO</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Yo.css">


</head>
<body>
  <?php require 'Partials/header.php' ?>
    

     
    <div class="caja_subir">
          <form method="post" action="" enctype="multipart/form-data">
            <h1>Subir archivos</h1>
            <input type="file" name="archivo"/><br/>
            <input type="submit" value="subir archivo" name="boton"/>
            
        
          </form>
      </div>
     

      <div class="caja">
        <h2>Archivos en existencia</h2>
        <?php
          if ($dir = opendir($directorio)){
              while($archivo = readdir($dir)){
                  if ($archivo != '.' && $archivo != '..'){
                     $contadorArchivos++;  
                     echo "Archivo: <strong>$archivo<archivo</strong><br /> ";
                    }
                }
                echo "Total de archivos : <strong>$contadorArchivos</strong>";
            }
        ?>
    
    </div>


      </form>

</body>
</html>