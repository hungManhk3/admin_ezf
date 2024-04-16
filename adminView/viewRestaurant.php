
<div >
  <h3>Restaurant</h3>
  <table class="table " width=100%>
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Restaurat Name</th>
        <th class="text-center">Restaurat Image</th>
        <th class="text-center">Restaurat Address</th>
        <th class="text-center">Restaurat Phone</th>
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
      $sql0="SELECT * from restaurant";
      $result0=$db -> Query($sql0);
      $num_of_page = ceil($result0->num_rows / $num_row);
      if ($page<1) {
        $page = 1;
      } 
      if ($page>$num_of_page){
        $page = $num_of_page;
      }
      $sql = "SELECT * from restaurant limit " . $num_row*($page-1).",".$num_row;
      $result = $db -> Query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["res_name"]?></td>   
      <td><img height='100px'src="<?php echo $row["res_image"] ?>"></td>   
      <td><?=$row["res_address"]?></td>   
      <td><?=$row["res_phone"]?></td>   
      <td><button class="btn btn-primary" onclick="resEditForm('<?=$row['res_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="resDelete('<?=$row['res_id']?>')">Delete</button></td>
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
        echo ' <a href="#Restaurant" onclick="showRestaurant(' . $prev_page . ')">Previous</a> ';
    }
    for ($i = 1; $i <= $num_of_page; $i++) {
        if ($i == $page) {
            echo " " . $i . " ";
        } else {
            echo ' <a href="#Restaurant" onclick="showRestaurant(' . $i . ')"> ' . $i . ' </a> ';
        }
    }
    if ($page < $num_of_page) {
        $next_page = $page + 1;
        echo ' <a href="#Restaurant" onclick="showRestaurant(' . $next_page . ')">Next</a> ';
    }
    ?>
</center>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add new restaurant
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Restaurant Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="" enctype='multipart/form-data' onsubmit="addRestaurant(event)" method="POST">
            <div class="form-group">
              <label >Restaurant Name</label>
              <input type="text" id="rname" name="rname" hidden>
              <div id="toolbar-container"></div>
              <div id="editor">
                <p>This is the initial editor content.</p>
              </div>
            </div>
            <div class="form-group">
              <label for="raddress">Restaurant address</label>
                <input type="text" id="raddress" name="raddress" >
              <label for="rphone">Restaurant phone</label>
                <input type="number" id="rphone" name="rphone" >
            </div>
            <div class="form-group">
              <label>Choose Image:</label>
              <input type="file" class="form-control-file" id="file"> 
            </div>    
            <div class="form-group">         
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Restaurant</button>
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
                    var inputElement = document.getElementById('rname');
                    inputElement.value = content;
                    console.log(inputElement);
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
   