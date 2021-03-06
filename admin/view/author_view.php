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
    <h1>Authors list</h1>
    <div class="table">
      <form>
        <table>
          <tr>
            <td>Number</td>
            <td>Name Author</td>
            <td>Email</td>
            <td>Status</td>
            <td>Manipulation</td>
          </tr>
          <?php
          foreach ($authors as $key => $value) {
             $name = $value['firstname']." ".$value['lastname'];
             $email = $value['email'];
             ?>
             <tr>
               <td><?php echo $key+1; ?></td>
               <td><?php echo $name; ?></td>
               <td><?php echo $email; ?></td>
               <td>
                 <select>
                   <option value="0" <?php if($value['status']=='Enable') echo 'selected'; ?>>Enable</option>
                   <option value="1" <?php if($value['status']=='Disable') echo 'selected'; ?>>Disable</option>
                 </select>
               </td>
               <td>
                 <a href="#" titele="Delete"><img src="public/images/delete.png" /></a>
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
