<?php

  if (!empty($_POST)):
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);    
    
    echo "Upload: " . $_FILES["document"]["name"] . "<br />";
    echo "Type: " . $_FILES["document"]["type"] . "<br />";
    echo "Size: " . ($_FILES["document"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["document"]["tmp_name"] . "<br />";

    if (file_exists($target_file)){
      echo $_FILES["document"]["name"] . " already exists. ";
    }
    else{
      move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);
      echo "Stored in: " . "upload/" . $_FILES["document"]["name"];
    }    
    /*$target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
    /*if ($_FILES["fileToUpload"]["size"] > 500000) {
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
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }*/
  endif;
?>

<style>
  #formupload .label .legend {
    margin-bottom: 0px;
  }
</style>

<div class="box_content" style="padding: 0px">
  <!--<form class="auto_save" class="j_tab_home tab_create" name="user_manager" action="" method="post" enctype="multipart/form-data">-->
  
  <form id="formupload" action="" method="post" enctype="multipart/form-data"> 
    <input type="hidden" name="callback" value="Dashboard">
    <input type="hidden" name="callback_action" value="manage_docs">
    <input type="hidden" name="document_id" value="1">
    <!--<input type="hidden" name="submit_true" value="true">    -->
    
    <label class="label">
      <span class="legend">Titulo:</span>
    </label>
    <input type="text" name="title" value="" placeholder="Titulo:" required>
    <label class="label">
      <span class="legend">Breve Descrição:</span>
    </label>      
    <textarea name="description" rows="3"></textarea>
    <label class="label">
      <span class="legend">Arquivo:</span>
    </label>    
    <input type="text" name="filename" id="filename" value="" placeholder="Arquivo:" required readonly>
    <span class="btn btn-success fileinput-button btn-block">
      <i class="glyphicon glyphicon-plus"></i>
      Selecione o arquivo...
      <input id="file" name="document" value="" type="file" placeholder="Selecione o arquivo..." maxsize="2">
    </span>    

    <div class="wc_actions" style="text-align: center; margin-top: 1rem;">
        <button type="submit" class="btn btn_green icon-database btn-block">SALVAR</button>
        <img class="form_load none" style="margin-left: 10px;" alt="Enviando Requisição!" title="Enviando Requisição!" src="_img/load.gif"/>
    </div>    
  </form>
</div>
  
<script>
  $("[type=file]").on("change", function(){    
    $('#filename').val(this.files[0].name);
  });  
</script>

