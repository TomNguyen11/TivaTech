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
    <h1>Add Admin</h1>
    <div class="tableAdd">
      <form>
        <table>
          <tr>
            <td>First name</td>
            <td><input type="text" name="firstname" /></td>
          </tr>
          <tr>
            <td>Last name</td>
            <td><input type="text" name="lastname" /></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input type="text" name="email" /></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" pass="pwd" /></td>
          </tr>
          <tr>
            <td>Re-Password</td>
            <td><input type="password" pass="pwd" /></td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" name="btnSubmit" value="Submit" />
              <input type="reset" value="Reset" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
</body>
</html>
