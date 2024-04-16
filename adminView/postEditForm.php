<div class="container p-5">

    <h4>Edit Restaurant Detail</h4>
    <?php
    include_once "../config/Connect.php";
    $db = new Database();
    $post_id = $_POST['id'];
    $sql = "SELECT 
                d.dish_name,p.post_id, p.title, p.content, p.thumbnail_image,p.date,p.dish_id
            FROM 
                posts AS p
            JOIN 
                dish AS d ON d.dish_id = p.dish_id 
            WHERE p.post_id = $post_id ";
    $result = $db->Query($sql);
    $numberOfRow = mysqli_num_rows($result);
    if ($numberOfRow > 0) {
        while ($row = mysqli_fetch_array($result)) {
    ?>
            <form id="" enctype='multipart/form-data' onsubmit="updatePost(event)" method="POST">
                <input type="text" class="form-control" id="pid" value="<?= $row['post_id'] ?>" hidden>
                <div class="form-group">
                    <label>Title: </label>
                    <input type="text" id="title" name="title" hidden>
                    <div id="toolbar-container-title"></div>
                    <div id="editor-title">
                        <?php echo $row['title'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Content: </label>
                    <input type="text" id="content" name="content" hidden>
                    <div id="toolbar-container-content"></div>
                    <div id="editor-content">
                        <?php echo $row['content'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Dish:</label>
                    <select id="dish">
                        <option disabled selected value="<?php echo $row['dish_id'] ?>"><?php echo $row["dish_name"] ?></option>
                        <?php
                        $sql1 = "SELECT * from dish";
                        $result1 = $db->Query($sql1);

                        if ($result1->num_rows > 0) {
                            while ($row_c = $result1->fetch_assoc()) {
                                echo "<option value='" . $row_c['dish_id'] . "'>" . $row_c['dish_name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <img width='200px' height='150px' src='<?= $row["thumbnail_image"] ?>'>
                    <div>
                        <label for="file">Choose Image:</label><br>
                        <input type="text" id="existingImage" class="form-control" value="<?= $row['thumbnail_image'] ?>" hidden>
                        <input type="file" id="newImage">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Update Post</button>
                </div>
        <?php
        }
    }
        ?>
            </form>
            <script>
                DecoupledEditor
                    .create(document.querySelector('#editor-title'))
                    .then(editor => {
                        const toolbarContainer = document.querySelector('#toolbar-container-title');
                        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
                        editor.model.document.on('change:data', () => {
                            const content = editor.getData();
                            var inputElement = document.getElementById('title');
                            inputElement.value = content;
                            console.log(inputElement.value);
                            console.log(content);
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
                DecoupledEditor
                    .create(document.querySelector('#editor-content'))
                    .then(editor => {
                        const toolbarContainer = document.querySelector('#toolbar-container-content');
                        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
                        editor.model.document.on('change:data', () => {
                            const content = editor.getData();
                            var inputElement = document.getElementById('content');
                            inputElement.value = content;
                            console.log(inputElement.value);
                            console.log(content);
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>
</div>