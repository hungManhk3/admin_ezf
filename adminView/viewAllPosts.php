
<div >
  <h2>Post</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Dish image</th>
        <th class="text-center">Dish name</th>
        <th class="text-center">Title</th>
        <th class="text-center">Content</th>
        <th class="text-center">Date</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/Connect.php";
      $db=new Database();
      $sql="SELECT p.title, p.content, p.thumbnail_image,  p.date,d.dish_name
            FROM posts p
            JOIN dish d ON p.dish_id = d.dish_id;";
      $result=$db -> Query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?=$row["thumbnail_image"]?>'></td>
      <td><?=$row["dish_name"]?></td>
      <td><?=$row["title"]?></td>      
      <td><?=$row["content"]?></td> 
      <td><?=$row["date"]?></td>     
      <td><button class="btn btn-primary" style="height:40px" >Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Post Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addItems()" method="POST">
          <div class="form-group">
              <label>Dish:</label>
              <select id="dish" >
                <option disabled selected>Select Dish</option>
                <?php

                  $sql="SELECT * from dish";
                  $result = $db->Query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['didh_id']."'>".$row['dish_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Title:</label>
              <textarea name="title" id="title"></textarea>
            </div>
            <div class="form-group">
              <label for="price">Content:</label>
              <textarea name="content" id="content"></textarea>
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
            </div>
          </form>
        </div>
        <script>
            ClassicEditor.create(document.querySelector('#title')).then(editor=>{
                console.log('Editor 1 was initialized', editor);
            }).catch(error=>{
                console.error('Error initializing editor 1', error);
            });
            ClassicEditor.create(document.querySelector('#content')).then(editor=>{
                console.log('Editor 1 was initialized', editor);
            }).catch(error=>{
                console.error('Error initializing editor 1', error);
            });
        </script>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   