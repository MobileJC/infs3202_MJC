<!DOCTYPE html>
<html>
<head>
    <title>DisCUTS all posts</title>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>

    
</head>
<body>
    <button id="load-table-btn">Load posts</button>

    <div class="table-container">
        <div class="container">
            <div class="col-4 offset-4">
                <h4 class="text-center">Search Results</h4>
                <ul id="searchResults"></ul>
                <table width="600" border="0" cellspacing="5" cellpadding="5">
                    <tr>
                        <th>Post ID</th>
                        <th>User</th>
                        <th>Post Title</th>
                        <th>Posted Date</th>
                        <th>Course</th>
                        <th>Content</th>
                    </tr>
                    <?php 
                    foreach($data as $p)
                    {       
                        echo "<tr>";
                        echo "<td>".$p->post_id."</td>";
                        echo "<td>".$p->postUsername."</td>";
                        echo "<td>".$p->postTitle."</td>";
                        echo "<td>".$p->postDatetime."</td>";
                        echo "<td>".$p->postCourse."</td>";
                        echo "<td>".$p->postContent."</td>";
                        echo "</tr>";    
                    }    
                    ?>
                </table>
                <a href="<?php echo base_url().'create_post'; ?>" class="float-center">Click here to create post</a><br>
            </div>
        </div>
    </div>
           
</body>
</html>