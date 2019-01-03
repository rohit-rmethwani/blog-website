<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Post Title</th>
                    <th>Date</th>
                    <th>Approve</th>
                    <th>Unapprove</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include_once ("../includes/functions.php");
                $result = getAllComments();
                while($row = mysqli_fetch_assoc($result))
                {
                    $comment_id = $row["comment_id"];
                    $comment_post_id = $row["comment_post_id"];
                    $comment_author = $row["comment_author"];
                    $comment_email = $row["comment_email"];
                    $comment_content = $row["comment_content"];
                    $comment_status = $row["comment_status"];
                    $comment_date = $row["comment_date"];
                    $comments_result = getAllPosts("post_id = $comment_post_id");
                    if($row = mysqli_fetch_assoc($comments_result))
                    {
                        $comment_post_title = $row["post_title"];
                    }
                    else{
                        $comment_post_title = "Something went wrong";
                    }
                    echo <<< COMMENT
<tr>
<td>$comment_id</td>
<td>$comment_author</td>
<td>$comment_content</td>
<td>$comment_email</td>
<td>$comment_status</td>
<td><a href="../individual_post.php?post_id=$comment_post_id">$comment_post_title</a></td>
<td>$comment_date</td>
<td><a href="comments.php?source=approved&comment_id=$comment_id" class="btn btn-outline-primary"><i class="fa fa-thumbs-up"></i></a></td>
<td><a href="comments.php?source=unapproved&comment_id=$comment_id" class="btn btn-outline-danger"><i class="fa fa-thumbs-down"></i></a></td>
<td><a href="#" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
COMMENT;

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>