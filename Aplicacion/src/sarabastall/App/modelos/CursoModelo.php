<?php
    class CursoModelo{
        private $db;
 
        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerCursos(){
            $this->db->query("SELECT curso.*,especialidad.*,persona.nombre nombre_profesor FROM curso
                                INNER JOIN especialidad ON curso.idEspecialidad = especialidad.idEspecialidad
                                INNER JOIN persona ON persona.idPersona = curso.idPersona");

            return $this->db->registros();                    
        }

        public function obtenerCurso($idCurso){
            $this->db->query("SELECT curso.*,especialidad.*,persona.nombre nombre_profesor FROM curso
                                INNER JOIN especialidad ON curso.idEspecialidad = especialidad.idEspecialidad
                                INNER JOIN persona ON persona.idPersona = curso.idPersona WHERE idCurso = :idCurso
                                ");
                                
            $this->db->bind(':idCurso', $idCurso);


            return $this->db->registro();                    
        }

        public function obtenerCursoPersona($idPersona){
            $this->db->query("SELECT curso.*, especialidad.*, persona.nombre nombre_profesor FROM curso_persona, curso, persona, especialidad
                                    WHERE curso_persona.idTrabajador = persona.idPersona
                                    AND curso.idEspecialidad = especialidad.idEspecialidad
                                    AND curso.idCurso = curso_persona.idCurso
                                    AND curso_persona.idTrabajador = :idPersona");

            $this->db->bind(':idPersona', $idPersona);

        return $this->db->registros();       
        }

        public function obtenerMovimientos(){
            $this->db->query("SELECT idMovimiento FROM movimiento");

            return $this->db->registros(); 
        }

        public function obtenerProfesores(){ 
            $this->db->query("SELECT nombre, idPersona, idTipo FROM persona
                                WHERE idTipo = 2");
            
            return $this->db->registros(); 
        }

        public function obtenerEspecialidades(){
            $this->db->query("SELECT * FROM especialidad");
            
            return $this->db->registros(); 
        }

        public function obtenerTrabajador($id_persona){
            $this->db->query("SELECT * FROM curso_persona WHERE idTrabajador = :idTrabajador");

            $this->db->bind(':idTrabajador',$id_persona);
            return $this->db->registros();                    
        }

        public function obtenerTrabajadoresCurso($idCurso){
            $this->db->query("SELECT curso_persona.*, persona.*, persona.nombre AS nombre_persona FROM curso_persona, persona
                                WHERE curso_persona.idCurso = $idCurso
                                AND curso_persona.idTrabajador = persona.idPersona");
            
            return $this->db->registros(); 
        }

        // public function obtenerDiploma($idTrabajador){
        //     $this->db->query("SELECT persona.*, curso_persona.* FROM curso_persona 
        //                         WHERE idTrabajador = :idTrabajador");
        // }


        public function editarPersona($idTrabajador){
            $this->db->query("UPDATE curso_persona SET notaFinal = :notaFinal
                                WHERE idTrabajador = :idTrabajador");

            $this->db->bind(':idTrabajador',$idTrabajador['idTrabajador']);
            $this->db->bind(':notaFinal',$idTrabajador['notaFinal']);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function anadirCurso($curso){

            switch ($curso['especialidades']) {
                case '1':
                    $idEspecialidad = 1;
                    break;
                case '2':
                    $idEspecialidad = 2;
                    break;
                
            }


            $this->db->query("INSERT INTO curso(fechaInicio, fechaFin, nombreCurso, idEspecialidad, idPersona, importe, movimiento_idMovimiento)
                                    VALUES (:fechaInicio, :fechaFin, :nombreCurso, :especialidades, :profesorCurso, :importeCurso, :movimientoCurso)");

            

            $this->db->bind(':fechaInicio',$curso['fechaInicio']);
            $this->db->bind(':fechaFin',$curso['fechaFin']);
            $this->db->bind(':nombreCurso',$curso['nombreCurso']);
            $this->db->bind(':especialidades',$idEspecialidad);
            $this->db->bind(':profesorCurso',$curso['profesorCurso']);
            $this->db->bind(':importeCurso',$curso['importeCurso']);
            $this->db->bind(':movimientoCurso',$curso['movimientoCurso']);

            
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function editarCurso($cursoModificado, $idCurso){

            

            $this->db->query("UPDATE curso SET fechaInicio = :fechaInicio, fechaFin = :fechaFin, nombreCurso = :nombreCurso, idEspecialidad = :idEspecialidad, idPersona = :profesorCurso, importe = :importeCurso, movimiento_idMovimiento = :movimientoCurso
                                WHERE idCurso = :idCurso");

            $this->db->bind(':fechaInicio', $cursoModificado['fechaInicio']);
            $this->db->bind(':fechaFin', $cursoModificado['fechaFin']);
            $this->db->bind(':nombreCurso', $cursoModificado['nombreCurso']);
            $this->db->bind(':idEspecialidad', $cursoModificado['idEspecialidad']);
            $this->db->bind(':profesorCurso', $cursoModificado['profesorCurso']);
            $this->db->bind(':importeCurso', $cursoModificado['importeCurso']);
            $this->db->bind(':movimientoCurso', $cursoModificado['movimientoCurso']);

            $this->db->bind(':idCurso', $idCurso); 

            $this->db->execute();


            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function borrarCurso($idCurso){
            $this->db->query("DELETE FROM curso WHERE idCurso=:idCurso");
            $this->db->bind(':idCurso',$idCurso);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function obtenerMateriales(){
            $this->db->query("SELECT * FROM material");

            return $this->db->registros();
        }

        public function obtenerMaterialesCurso($idCurso){
            $this->db->query("SELECT * FROM curso_material, curso, material
                                WHERE curso.idCurso = curso_material.idCurso
                                AND material.idMaterial = curso_material.idMaterial
                                AND curso_material.idCurso = $idCurso");

            return $this->db->registros();
        }

        public function anadirMateriales($materialNombre, $materialArchivo, $idCurso){

            $archivo = $materialArchivo['fileToUpload']['name'];
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
            // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            // && $imageFileType != "gif" ) {
            //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            //   $uploadOk = 0;
            // }
            
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

            $this->db->query("INSERT INTO material(nombre, archivo) 
                                    VALUES(:nombreMaterial, :archivo)");
            
            $this->db->bind(':nombreMaterial',$materialNombre['nombreMaterial']);
            $this->db->bind(':archivo',$archivo);

            $id_material = $this->db->executeLastId();

            $this->db->query("INSERT INTO curso_material(idMaterial, idCurso) 
                                    VALUES(:idMaterial, :idCurso)");

            $this->db->bind(':idMaterial',$id_material);
            $this->db->bind(':idCurso',$idCurso);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function borrarMaterial($idMaterial){
            $this->db->query("DELETE FROM material WHERE idMaterial=:idMaterial");

            $this->db->bind(':idMaterial',$idMaterial);

            // $this->db->query("DELETE FROM curso_material WHERE idMaterial=:idMaterial AND idCurso=:idCurso");

            // $this->db->bind(':idMaterial',$idMaterial);
            // $this->db->bind(':idCurso',$idCurso);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function borrarTrabajador($idTrabajador){
            $this->db->query("DELETE FROM curso_persona WHERE idTrabajador=:idTrabajador");

            $this->db->bind(':idTrabajador',$idTrabajador);

            $idPersona=$this->db->executeLastId();

            $this->db->query("UPDATE persona SET cursoActual= null
                                WHERE idPersona = :idPersona");

            $this->db->bind(':idPersona',$idPersona);     

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

    }

?>  