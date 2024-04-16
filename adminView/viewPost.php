<div>
    <h3>Dish</h3>
    <table class="table " width=100%>
        <thead>
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Dish name</th>
                <th class="text-center">Title</th>
                <th class="text-center">Content</th>
                <th class="text-center">Image</th>
                <th class="text-center">Date</th>
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
        $sql0 = "SELECT * from posts";
        $result0 = $db->Query($sql0);
        $num_of_page = ceil($result0->num_rows / $num_row);
        if ($page < 1) {
            $page = 1;
        }
        if ($page > $num_of_page) {
            $page = $num_of_page;
        }
        $sql = "SELECT 
                d.dish_name,p.post_id, p.title, p.content, p.thumbnail_image,p.date
            FROM 
                posts AS p
            JOIN 
                dish AS d ON d.dish_id = p.dish_id limit " . $num_row * ($page - 1) . "," . $num_row;
        $result = $db->Query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $row["dish_name"] ?></td>
                    <td><?= $row["title"] ?></td>
                    <td><?= $row["content"] ?></td>
                    <td><img height='100px' src="<?php echo $row["thumbnail_image"] ?>"></td>
                    <td><?= $row["date"] ?></td>
                    <td><button class="btn btn-primary" onclick="postEditForm('<?= $row['post_id'] ?>')">Edit</button></td>
                    <td><button class="btn btn-danger" style="height:40px" onclick="dishDelete('<?= $row['post_id'] ?>')">Delete</button></td>
                </tr>
        <?php
                $count = $count + 1;
            }
        }
        ?>
    </table>
    <center>
        <?php
        if ($page > 1) {
            $prev_page = $page - 1;
            echo ' <a href="#Post" onclick="showPost(' . $prev_page . ')">Previous</a> ';
        }
        for ($i = 1; $i <= $num_of_page; $i++) {
            if ($i == $page) {
                echo " " . $i . " ";
            } else {
                echo ' <a href="#Post" onclick="showPost(' . $i . ')"> ' . $i . ' </a> ';
            }
        }
        if ($page < $num_of_page) {
            $next_page = $page + 1;
            echo ' <a href="#Post" onclick="showPost(' . $next_page . ')">Next</a> ';
        }
        ?>
    </center>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add new Post
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
                    <form id="" enctype='multipart/form-data' onsubmit="addPost(event)" method="POST">
                        <div class="form-group">
                            <label>Title: </label>
                            <input type="text" id="title" name="title" hidden>
                            <div id="toolbar-container-title"></div>
                            <div id="editor-title">
                                <p>This is the title.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Content: </label>
                            <input type="text" id="content" name="content" hidden>
                            <div id="toolbar-container-content"></div>
                            <div id="editor-content">
                                <p>This is the content.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Dish:</label>
                            <select id="dish">
                                <option disabled selected>Select dish</option>
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
                            <label>Choose Image:</label>
                            <input type="file" class="form-control-file" id="file">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Dish</button>
                        </div>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                </div>
            </div>

        </div>
    </div>


</div>