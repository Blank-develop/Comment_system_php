<?php 

    include_once 'controllers/Comment.php';
    $com = new Comment();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment System OOP</title>
    <style>
        .box {
            border: 6px solid #999; 
            margin: 30px auto 0; 
            padding: 20px; 
            width: 1000px; 
            height: 250px;
            overflow: scroll;
        }
        .box ul {
            margin: 0; padding: 0; list-style: none;
        }
        .box li {
            display: block; 
            border-bottom: 1px dashed #ddd;
            margin-bottom: 5px;
            padding-bottom: 5px;
        }
        .box li:last-child {
            border-bottom: 0 dashed #ddd;
        }
        .box span {
            color: #888;
        }
    </style>
</head>
<body>

    <div class="box">
        <ul>
            <?php 
                if($result = $com->index()) {
                while ($data = $result->fetch_assoc()) {
            ?>
                <li>
                    <b><?php echo $data['name']; ?></b> - <?php echo $data['comment']; ?> - <?php echo $com->dateFormat($data['comment_time']); ?>
                </li>
                <?php } ?>
            <?php }?>
        </ul>
    </div>

    <br><br>

    <center>
    <?php 
    
        if(isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo "<span style='color: green; font-size: 20px'>".$msg."</span>";
        }

    ?>

    <form action="post_comment.php" method="post">
        <table>
            <tr>
                <td>Your Name:</td>
                <td><input type="text" name="name" placeholder="Please enter your name" style="width: 230px; height: 30px;"></td>
            </tr>
            <tr>
                <td>Comment:</td>
                <td>
                    <textarea name="comment" cols="30" rows="10" placeholder="Please enter your comment"></textarea>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Post" style="width: 235px; height: 40px;"></td>
            </tr>
        </table>
    </form>
    </center>
    
</body>
</html>