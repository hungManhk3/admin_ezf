
<div>
  <h3>Dish</h3>
  <table class="table " width=100%>
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Dish Name</th>
        <th class="text-center">Dish Description</th>
        <th class="text-center">Dish Image</th>
        <th class="text-center">Category Dish</th>
        <th class="text-center">Restaurant</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/Connect.php";
      if (!isset($_POST["page"])) {
        $page = 1;
      } else {
      $page = $_POST["page"];
      }
      $num_row = 6;
      $db = new Database();
      $sql0="SELECT * from dish";
      $result0=$db -> Query($sql0);
      $num_of_page = ceil($result0->num_rows / $num_row);
      if ($page<1) {
        $page = 1;
      } 
      if ($page>$num_of_page){
        $page = $num_of_page;
      }
      $sql= "SELECT 
                cd.cname, d.dish_id, d.dish_name, d.dish_desc, d.dish_image, d.res_id, r.res_name
            FROM 
                dish AS d
            JOIN 
                category_dish AS cd ON d.cid = cd.cid
            JOIN 
                restaurant AS r ON d.res_id = r.res_id limit ". $num_row*($page-1).",".$num_row;
      $result = $db -> Query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["dish_name"]?></td>   
      <td><?=$row["dish_desc"]?></td>   
      <td><img height='100px'src="<?php echo $row["dish_image"] ?>"></td>   
      <td><?=$row["cname"]?></td>   
      <td><?=$row["res_name"]?></td>   
      <td><button class="btn btn-primary" onclick="dishEditForm('<?=$row['dish_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="dishDelete('<?=$row['dish_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>
  <center>
    <?php
    if ($page > 1) {
        $prev_page = $page - 1;
        echo ' <a href="#Dish" onclick="showDish(' . $prev_page . ')">Previous</a> ';
    }
    for ($i = 1; $i <= $num_of_page; $i++) {
        if ($i == $page) {
            echo " " . $i . " ";
        } else {
            echo ' <a href="#Dish" onclick="showDish(' . $i . ')"> ' . $i . ' </a> ';
        }
    }
    if ($page < $num_of_page) {
        $next_page = $page + 1;
        echo ' <a href="#Dish" onclick="showDish(' . $next_page . ')">Next</a> ';
    }
    ?>
</center>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add new Dish
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Dish Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="" enctype='multipart/form-data' onsubmit="addDish(event)" method="POST">
            <div class="form-group">
              <label >Dish Name: </label>
              <input type="text" id="dname" name="name">
            </div>
            <div class="form-group">
              <label >Dish Description: </label>
              <input type="text" id="ddes" name="ddes" hidden>
              <div id="toolbar-container"></div>
              <div id="editor">
                <p>This is the initial editor content.</p>
              </div>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="category" >
                <option disabled selected>Select category</option>
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
                <option disabled selected>Select Restaurant</option>
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
              <label>Choose Image:</label>
              <input type="file" class="form-control-file" id="file"> 
            </div>    
            <div class="form-group">         
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Dish</button>
            </div>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   