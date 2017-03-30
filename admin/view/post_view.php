<!DOCTYPE html>
<html>
<head>
  <title>Manage Post</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/css/mainAdmin.css" />
</head>
<body>
<div id="container" class="clearfix">
  <?php
    include_once "header.php";
    include_once "sidebar.php";
  ?>
  <div id="content" class="clearfix">
    <h1>Posts list</h1>
    <div class="table">
      <form>
        <table>
          <tr>
            <td>Number</td>
            <td>Name Posts</td>
            <td>Author</td>
            <td>Created at</td>
            <td>Status</td>
            <td>Manipulation</td>
          </tr>
          <?php
          foreach ($posts as $key => $value) {
             $post_id = $value['id'];
             $content = $value['content'];
             $title = $value['title'];
             $created_at = $value['created_at'];
             $status = $value['status'];
             ?>
             <tr>
               <td><?php echo $key+1; ?></td>
               <!-- duong link dan ra bai dang -->
               <td><a href="#" class="link"><?php echo $title; ?></a></td>
               <td><?php echo $authors[$post_id]['firstname']." ".$authors[$post_id]['lastname']; ?></td>
               <td><?php echo $created_at; ?></td>
               <td>
                 <select name="status">
                   <option value="0" <?php if($status=='Enable') echo 'selected'; ?>>Enable</option>
                   <option value="1" <?php if($status=='Disable') echo 'selected'; ?>>Disable</option>
                 </select>
               </td>
               <td>
                 <a href="post_del.php" titele="Delete"><img src="public/images/delete.png" /></a>
               </td>
               </tr>
             <?php
          }
          ?>

        </table>
      </form>
    </div>
  </div>
</div>
</body>
</html>
