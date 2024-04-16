
<div class="container p-5">

<h4>Edit Restaurant Detail</h4>
<?php
    include_once "../config/Connect.php";
    $db = new Database();
	  $res_id=$_POST['id'];
    $sql = "SELECT * FROM restaurant WHERE res_id=".$res_id;
    $result=$db->Query($sql);
	  $numberOfRow=mysqli_num_rows($result);
	  if($numberOfRow>0){
		while($row=mysqli_fetch_array($result)){
?>
<form id="" enctype='multipart/form-data' onsubmit="updateRes(event)" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" id="r_id" value="<?=$row['res_id']?>" hidden>
    </div>
    <div class="form-group">
    <label >Restaurant Name:</label>
              <div id="toolbar-container"></div>
              <div id="editor">
                <p><?php echo $row['res_name']?></p>
              </div>
              <input type="text" id="r_name" name="rname" hidden>
    </div>
    <div class="form-group">
      <label for="address">Restaurant Address:</label>
      <input type="text" class="form-control" id="r_address" value="<?=$row['res_address']?>">
    </div>
    <div class="form-group">
      <label for="phone">Restaurant phone:</label>
      <input type="number" class="form-control" id="r_phone" value="<?=$row['res_phone']?>">
    </div>
    <div class="form-group">
         <img width='200px' height='150px' src='<?=$row["res_image"]?>'>
         <div>
            <label for="file">Choose Image:</label><br>
            <input type="text" id="existingImage" class="form-control" value="<?=$row['res_image']?>" hidden>
            <input type="file" id="newImage" >
         </div>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Update Restaurant</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>
  <script>
            DecoupledEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                const toolbarContainer = document.querySelector( '#toolbar-container' );
                toolbarContainer.appendChild( editor.ui.view.toolbar.element );
                editor.model.document.on('change:data', () => {
                    const content = editor.getData();
                    var inputElement = document.getElementById('r_name');
                    inputElement.value = content;
                    console.log(inputElement.value);
                    console.log(content);
                });
            } )
            .catch( error => {
                console.error( error );
            } );
        </script>
    </div>