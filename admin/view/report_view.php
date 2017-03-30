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
    <h1>repost list</h1>
    <div class="table">
      <form>
        <table>
          <tr>
            <td>Number</td>
            <td>Name Posts</td>
            <td>Quatity</td>
            <td>Status</td>
            <td>Manipulation</td>
          </tr>
          <tr>
            <td>1</td>
            <!-- duong link dan ra bai bi report -->
            <td><a href="#" class="link">The apple phone is so bad</a></td>
            <td class="important"> 6 </td>
            <td>
              <select>
                <option value="0">Enable</option>
                <option value="1">Disable</option>
              </select>
            </td>
            <td>
              <a href="report_del.php" titele="Delete"><img src="public/images/delete.png" /></a>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
</body>
</html>
