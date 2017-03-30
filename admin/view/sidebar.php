<div id="sidebar">
  <ul>
    <li <?php if($stt=='index') echo 'class="active"'; ?>><a href="admin.php">Home</a></li>
    <li <?php if($stt=='admin') echo 'class="active"'; ?>><a href="admin.php?ctr=admin">Manage Admin</a></li>
    <li <?php if($stt=='topics') echo 'class="active"'; ?>><a href="admin.php?ctr=topic">Manage topics</a></li>
    <li <?php if($stt=='authors') echo 'class="active"'; ?>><a href="admin.php?ctr=authors">Manage authors</a></li>
    <li <?php if($stt=='posts') echo 'class="active"'; ?>><a href="admin.php?ctr=posts">Manage posts</a></li>
    <li <?php if($stt=='report') echo 'class="active"'; ?>><a href="admin.php?ctr=report">Manage report</a></li>
  </ul>
</div>
