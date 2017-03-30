<div class="top-menu row">
    <div class="top-menu-left col-5 col-m-5">
        <ul class="clearfix">
            <li>
                <a href="index.php" <?php if(isset($stt) && $stt=='index') echo 'class="actice"';?>>
                    <!-- <img src="../images/logo-TivaTech.png" alt="Logo TivaTech"> -->
                    TivaTech
                </a>
            </li>
            <li><a href="index.php?ctr=authors_all" <?php if(isset($stt) && $stt=='authors') echo 'class="actice"';?>>Authors</a></li>
            <li><a href="index.php?ctr=topics_all" <?php if(isset($stt) && $stt=='topics') echo 'class="actice"';?>>Topics</a></li>
        </ul>
    </div>
    <div class="top-menu-right col-7 col-m-7">
        <ul class="clearfix">
            <li id="liForm" class="clearfix">
                <form id="formSearch" class="form-search" class="clearfix" action="index.php?ctr=search" method="post">
                    <input type="text" name="search-value" placeholder="Search..." autocomplete="off">
                    <button type="submit" name="bnt-search">
                        <img src="public/icons/search.png" alt="Search">
                    </button>
                </form>
                <button onclick="searchFocus()" id="btnFocus" class="btn-search-focus" type="button">
                    <img src="public/icons/search-icon.png" alt="Search Icon">
                </button>
            </li>
            <li id="li1" class="">
                <?php
                if(!isset($_SESSION['login'])) {
                    ?>
                        <a onclick="return window.confirm('You must login to use this feater!')"
                            href="index.php?ctr=login">
                            <img src="public/icons/pencil.png" alt="Create Post">
                        </a>
                    <?php
                }
                else {
                    ?>
                        <a href="index.php?ctr=create_post" title="Create New Post"
                            <?php if(isset($stt) && $stt=='create post') echo 'class="actice"'; ?>>
                            <img src="public/icons/pencil.png" alt="Create Post">
                        </a>
                    <?php
                }
                ?>
            </li>
            <li id="li2" class="">
                <?php
                if(!isset($_SESSION['login'])) {
                    ?>
                        <a onclick="return window.confirm('You must login to use this feater!')"
                            href="index.php?ctr=login">
                            <img src="public/icons/notification-bell.png" alt="Notifications">
                        </a>
                    <?php
                }
                else {
                    ?>
                    <a href="#" title="Notification">
                        <img src="public/icons/notification-bell.png" alt="Notifications">
                    </a>
                    <?php
                }
                ?>
            </li>
            <li id='li3' class="">
                <?php
                if(!isset($_SESSION['login'])) {
                    ?>
                        <a onclick="return window.confirm('You must login to use this feater!')"
                            href="index.php?ctr=login">
                            <img src="public/icons/message.png" alt="Messages">
                        </a>
                    <?php
                }
                else {
                    ?>
                    <a href="#" title="Messages">
                        <img src="public/icons/message.png" alt="Messages">
                    </a>
                    <?php
                }
                ?>
            </li>
            <li id="li4" class="">
                <a href="#">
                    <?php
                        if(isset($_SESSION['avatar']) && $_SESSION['avatar']!="") {
                            ?>
                                <img src="<?=$_SESSION['avatar']?>" alt="Avartar">
                            <?php
                        }
                        else {
                            ?>
                                <img src="public/icons/avatar.png" alt="Avartar">
                            <?php
                        }
                    ?>
                </a>
                <ul class="sub-menu">
                    <?php
                        if(isset($_SESSION['firstname'])) {
                            ?>
                            <li><a href="index.php?ctr=profile">Profile</a></li>
                            <li><a href="index.php?ctr=setting">Setting</a></li>
                            <li><a href="index.php?ctr=logout">Logout</a></li>
                            <?php
                        }
                        else {
                             ?>
                                <li><a href="index.php?ctr=login">Sign in</a></li>
                             <?php
                        }
                    ?>

                </ul>
            </li>
        </ul>
    </div>
    <div class="result">
    </div>
</div>
