<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
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
    <h1>Statistic</h1>
    <div id="statistic">
      <div class="itemStatistic">
        <img src="public/images/book-with-bookmark.png" />
        <div class="itemstatisticContent">
          <ul>
            <li>Topics</li>
            <li>123</li>
          </ul>
        </div>
      </div>
      <div class="itemStatistic">
        <img src="public/images/002-student.png" />
        <div class="itemstatisticContent">
          <ul>
            <li>Admin</li>
            <li><?php echo $countAdmins; ?></li>
          </ul>
        </div>
      </div>
      <div class="itemStatistic">
        <img src="public/images/autorship.png" />
        <div class="itemstatisticContent">
          <ul>
            <li>Post</li>
            <li>123</li>
          </ul>
        </div>
      </div>
      <div class="itemStatistic">
        <img src="public/images/people1.png" />
        <div class="itemstatisticContent">
          <ul>
            <li>Authors</li>
            <li>123</li>
          </ul>
        </div>
      </div>
      <div class="itemStatistic">
        <img src="public/images/signs.png" />
        <div class="itemstatisticContent">
          <ul>
            <li>Report</li>
            <li>123</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
