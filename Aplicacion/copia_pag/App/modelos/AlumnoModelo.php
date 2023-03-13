<?php
    class AlumnoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerAlumnos(){
            $this->db->query("SELECT * FROM alumno");

            return $this->db->registros();                    
        }

        public function obtenerAlumno($idAlumno){
            $this->db->query("SELECT * FROM alumno WHERE idAlumno = :idAlumno");
            $this->db->bind(':idAlumno',$idAlumno);
            return $this->db->registros();                    
        }

        public function anadirAlumno($datos){


            $target_dir = "/var/www/html/sarabastall/public/assets/img/clients/";
            $file = basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $file;
    
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            
         

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
              if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }
            }
            
            // Check if file already exists
            if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $uploadOk = 0;
            }
            
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
            }
            
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
            }
            
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                chmod('/var/www/html/sarabastall/public/assets/img/clients/'.$file, 0777);
              } else {
                echo "Sorry, there was an error uploading your file.";
              }
            }
            
            














            $this->db->query("INSERT INTO alumno( nombre, apellidos, anyo_nacimiento, padre, direccion_familiar, foto)
                                    VALUES (:nombre, :apellidos, :anyo_nacimiento, :padre, :direccion_familiar, :foto)");
           
            $this->db->bind(':nombre',$datos['nombre']);
            $this->db->bind(':apellidos',$datos['apellidos']);
            $this->db->bind(':anyo_nacimiento',$datos['anyo_nacimiento']);
            $this->db->bind(':padre',$datos['padre']);
            $this->db->bind(':direccion_familiar',$datos['direccion_familiar']);
            $this->db->bind(':foto',$file);



            // AÑADIR IMAGEN AL ALUMNO



            // Include the database configuration file
            
            // File upload path
            // $targetDir = RUTA_URL_STATIC."/assets/img/clients/";
            
          

            // $fileName = basename($_FILES["file"]["foto"]);
            // $targetFilePath = $targetDir . $fileName;
            // echo $fileName;
          
            // exit();
            // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            
            // if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
            //     // Allow certain file formats
            //     $allowTypes = array('jpg','png','jpeg','gif','pdf');
            //     if(in_array($fileType, $allowTypes)){
            //         // Upload file to server
            //         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            //             // Insert image file name into database
            //             $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            //             if($insert){
            //                 $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            //             }else{
            //                 $statusMsg = "File upload failed, please try again.";
            //             } 
            //         }else{
            //             $statusMsg = "Sorry, there was an error uploading your file.";
            //         }
            //     }else{
            //         $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            //     }
            // }else{
            //     $statusMsg = 'Please select a file to upload.';
            // }
            
            // // Display status message
            // echo $statusMsg;
        


            

            



            
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function borraralumno($idAlumno){
            $this->db->query("DELETE FROM alumno WHERE idAlumno=:idAlumno");
            $this->db->bind(':idAlumno',$idAlumno);
            $this->db->execute();

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function editarAlumno($alumno, $idAlumno){
            

            $this->db->query("UPDATE alumno SET nombre=:nombre, apellidos=:apellidos, anyo_nacimiento=:anyo_nacimiento, padre=:padre, direccion_familiar=:direccion_familiar 
                            WHERE idAlumno =:idAlumno");
            print_r($alumno);
            $this->db->bind(':nombre',$alumno['nombre']);
            $this->db->bind(':apellidos',$alumno['apellidos']);
            $this->db->bind(':anyo_nacimiento',$alumno['anyo_nacimiento']);
            $this->db->bind(':padre',$alumno['padre']);
            $this->db->bind(':direccion_familiar',$alumno['direccion_familiar']);
            $this->db->bind(':idAlumno',$idAlumno);
            $this->db->execute();   

            // if(($_POST['apellidos'] == "")){
            //     echo "Introduce un apellidos válido";
            //     exit();
            //     }

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

    }