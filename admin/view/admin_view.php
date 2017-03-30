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
    <h1>Admin list</h1>
    <span id="add"><a href="admin_add.php" title="Add Admin "><img src="public/images/social.png" /></a></span>
    <div class="table">
      <form>
        <table>
          <tr>
            <td>Number</td>
            <td>Name</td>
            <td>Email</td>
            <td>Status</td>
            <td>Manipulation</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Tom Nguyen</td>
            <td>nhoctom0811@gmail.com</td>
            <td>
              <select>
                <option value="0">Enable</option>
                <option value="1">Disable</option>
              </select>
            </td>
            <td>
              <a href="#" titele="Delete"><img src="public/images/delete.png" /></a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Tom Nguyen</td>
            <td>nhoctom0811@gmail.com</td>
            <td>
              <select>
                <option value="0">Enable</option>
                <option value="1">Disable</option>
              </select>
            </td>
            <td>
              <a href="#" titele="Delete"><img src="public/images/delete.png" /></a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Tom Nguyen</td>
            <td>nhoctom0811@gmail.com</td>
            <td>
              <select>
                <option value="0">Enable</option>
                <option value="1">Disable</option>
              </select>
            </td>
            <td>
              <a href="#" titele="Delete"><img src="public/images/delete.png" /></a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Tom Nguyen</td>
            <td>nhoctom0811@gmail.com</td>
            <td>
              <select>
                <option value="0">Enable</option>
                <option value="1">Disable</option>
              </select>
            </td>
            <td>
              <a href="#" titele="Delete"><img src="public/images/delete.png" /></a>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
</body>
</html>
