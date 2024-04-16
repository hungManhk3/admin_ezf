
<div class="container p-5">

<h4>Edit Restaurant Detail</h4>
<?php
    include_once "../config/Connect.php";
    $db = new Database();
	$dish_id=$_POST['id'];
    $sql= "SELECT 
                cd.cname, d.dish_id, d.dish_name, d.dish_desc, d.dish_image,d.cid, d.res_id, r.res_name
            FROM 
                dish AS d
            JOIN 
                category_dish AS cd ON d.cid = cd.cid
            JOIN 
                restaurant AS r ON d.res_id = r.res_id 
            WHERE d.dish_id = ".$dish_id;
    $result=$db->Query($sql);
	$numberOfRow=mysqli_num_rows($result);
	if($numberOfRow>0){
		while($row=mysqli_fetch_array($result)){
?>
<form id="" enctype='multipart/form-data' onsubmit="updateDish(event)" method="POST">
<input type="text" class="form-control" id="did" value="<?=$row['dish_id']?>" hidden>
<div class="form-group">
              <label >Dish Name: </label>
              <input type="text" id="dname" name="name" value="<?=$row["dish_name"] ?>">
            </div>
            <div class="form-group">
              <label >Dish Description: </label>
              <input type="text" id="ddes" name="ddes" hidden>
              <div id="toolbar-container"></div>
              <div id="editor">
                <p><?php echo $row["dish_desc"]; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="category" >
                <option disabled selected value="<?php echo $row["cid"] ?>"><?php echo  $row["cname"] ?></option>
                <?php

                  $sql1="SELECT * from category_dish";
                  $result1 = $db -> Query($sql1);

                  if ($result1-> num_rows > 0){
                    while($row_c = $result1-> fetch_assoc()){
                      echo"<option value='".$row_c['cid']."'>".$row_c['cname'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Restaurant:</label>
              <select id="restaurant" >
                <option disabled selected value="<?php echo $row["res_id"] ?>"><?php echo  $row["res_name"] ?></option>
                <?php

                  $sql2="SELECT * from restaurant";
                  $result2 = $db -> Query($sql2);

                  if ($result2-> num_rows > 0){
                    while($row_r = $result2-> fetch_assoc()){
                      echo"<option value='".$row_r['res_id']."'>".$row_r['res_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <img width='200px' height='150px' src='<?=$row["res_image"]?>'>
              <div>
                  <label for="file">Choose Image:</label><br>
                  <input type="text" id="existingImage" class="form-control" value="<?=$row['dish_image']?>" hidden>
                  <input type="file" id="newImage" >
              </div>
          </div>   
            <div class="form-group">         
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Update Dish</button>
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
                    var inputElement = document.getElementById('ddes');
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