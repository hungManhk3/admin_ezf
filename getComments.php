<?php
include_once "./config/Connect.php";
// include "./header.php";
$db = new Database();
$num_row = 5;
if (isset($_REQUEST["postId"])) {
    $sql = "select u.avatar_image,u.fullName,c.* from users u join comment_post c on u.userid =c.userid  where c.post_id=" . $_REQUEST['postId'] . " order by c.date DESC";
    $result = $db->Query($sql);
    if ($result->num_rows == 0) {
        echo "0 results";
    } else {
        $num_of_page = ceil($result->num_rows / $num_row); // Số trang cần thiết
        if (!isset($_REQUEST['page'])) {
            $page = 1;
        } else {
            $page = $_REQUEST['page'];
        }
        if ($page < 1) {
            $page = 1;
        }
        if ($page > $num_of_page) {
            $page = $num_of_page;
        }
        $offset = ($page - 1) * $num_row; // Tính toán vị trí bắt đầu của kết quả
        $sql = "select u.avatar_image,u.fullName,c.* from users u join comment_post c on u.userid =c.userid  where c.post_id=" . $_GET['postId'] ." order by c.date DESC limit " . $offset . "," . $num_row;
        $result1 = $db->Query($sql);
    if ($result1->num_rows > 0) {
        // Tạo một mảng để lưu trữ các bài viết với thông tin món ăn và nhà hàng
        $postsWithDetails = array();
        while ($row = $result1->fetch_assoc()) {
            // Tạo một đối tượng mới để lưu trữ thông tin của mỗi bài viết
            $comment = array(
                "Id" => $row["cmt_id"],
                "UserId" => $row["userid"],
                "Content" => $row["content"],
                "Image" => $row["avatar_image"],
                "Time" => $row["date"],
                "PostId" => $row["post_id"],
                "Name" => $row["fullName"],
            );
            // Thêm bài viết vào mảng
            $commentsWithDetails[] = $comment;
        }
        // Chuyển đổi kết quả thành định dạng JSON
        $response = json_encode($commentsWithDetails);

        // Trả về JSON như là kết quả của API
        header('Content-Type: application/json');
        echo $response;
    } else {
        echo "0 results";
    }
    }
}
