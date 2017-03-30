<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="keyword" content="TivaTech, Infomation Technology, Socical Networking Website">
        <meta name="description" content="TivaTech is a social netwoking website">
        <meta name="author" content="Tom Nguyen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Author Page</title>
        <link rel="stylesheet" href="public/css/home.css">
        <link rel="stylesheet" href="public/css/profile.css">
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
        <script src="public/js/like.js" charset="utf-8"></script>
        <script src="public/js/star.js" charset="utf-8"></script>
        <script src="public/js/comment.js" charset="utf-8"></script>
        <script src="public/js/myjs.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="container">
            <!-- Header -->
            <div class="header">
                <!-- Top menu -->
                <?php include "_header.php";?>
            </div>
            <!-- Main -->
            <div class="main row">
                    <div class="sidebar-profile col-3 col-m-3">
                        <!-- Author Info -->
                        <div class="title">
                            <a href="top-authors.php">Profile</a>
                        </div>
                        <div class="sidebar-list">
                            <div class="sidebar-item">
                                <div class="sidebar-info clearfix">
                                    <div class="author-avatar">
                                        <?php
                                            if($authorInfo[0]['photo']=="") {
                                                ?>
                                                <a href="authors.php">
                                                    <img src="public/images/avatar.png" alt="Avartar">
                                                </a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="authors.php">
                                                    <img src="<?=$authorInfo[0]['photo']?>" alt="Avartar">
                                                </a>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div>
                                        <a href="authors.php">
                                            <?=$authorInfo[0]['firstname']." ".$authorInfo[0]['lastname']?>
                                        </a>
                                        <?php
                                            $user_id = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;
                                            if(isset($_SESSION['idUser']) && $user_id==$authorInfo[0]['id']) {
                                        ?>
                                        <a href="index.php?ctr=setting">
                                            <img src="public/icons/edit.png" alt="Edit Profile" title="Edit Profile">
                                        </a>
                                        <?php
                                            }
                                        ?>
                                    </div>

                                </div>

                                <div class="symbol clearfix">
                                    <div class="symbol-item clearfix">
                                        <a href="#">
                                            <img src="public/icons/following.png" alt="Follow" title="Follow this author">
                                        </a>
                                    </div>
                                    <div class="symbol-post-item clearfix">
                                        <?php
                                            if(!isset($_SESSION['login'])) : ?>
                                                <a class="<?php echo $classNameStar; ?>" href="index.php?ctr=login"
                                                    onclick="return window.confirm('You must login to use this feater!')"
                                                    author-id="<?php echo $authorInfo[0]['id'];?>">
                                                    <p class="count-star"><?php echo $authorInfo[0]['quatity_stars'];?></p>
                                                </a>
                                            <?php else : ?>
                                                <a  class="<?php echo $classNameStar; ?>" href="javascript:void(0)"
                                                    author-id="<?php echo $authorInfo[0]['id'];?>">
                                                    <p class="count-star"><?php echo $authorInfo[0]['quatity_stars'];?></p>
                                                </a>
                                            <?php endif; ?>

                                    </div>

                                    <div class="symbol-item clearfix">
                                        <img src="public/icons/follower.png" alt="Followers" title="Followers">
                                        <p><?=$quatityFollowers[0]['followers']?></p>
                                    </div>
                                    <div class="symbol-item clearfix">
                                        <img src="public/icons/pen.png" alt="Total Post" title="Total Posts">
                                        <p><?=$quatityPosts[0]['posts']?></p>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <!-- Report about Author -->
                    <div class="report-author">
                        <div class="report-item clearfix clearfix">
                            <div class="report-item-title">
                                Stars
                            </div>
                            <div class="report-item-value">
                                <?=$authorInfo[0]['quatity_stars']?>
                            </div>
                        </div>
                        <div class="report-item clearfix">
                            <div class="report-item-title">
                                Following Topics
                            </div>
                            <div class="report-item-value">
                                <?=$quatityFollowingTopics[0]['topics']?>
                            </div>
                        </div>
                        <div class="report-item clearfix">
                            <div class="report-item-title">
                                Following Users
                            </div>
                            <div class="report-item-value">
                                <?=$quatityFollowUsers[0]['follow_users']?>
                            </div>
                        </div>
                        <div class="report-item clearfix">
                            <div class="report-item-title">
                                Followers
                            </div>
                            <div class="report-item-value">
                                <?=$quatityFollowers[0]['followers']?>
                            </div>
                        </div>
                        <div class="report-item clearfix">
                            <div class="report-item-title">
                                Posts
                            </div>
                            <div class="report-item-value">
                                <?=$quatityPosts[0]['posts']?>
                            </div>
                        </div>
                        <div class="report-item clearfix">
                            <div class="report-item-title">
                                Clips
                            </div>
                            <div class="report-item-value">
                                <?=$quatityClips[0]['post_clips']?>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Footer -->
                    <div class="sidebar-footer">
                        <ul class="sidenav">
                            <li><a href="index.php">Posts</a></li>
                            <li><a href="index.php?ctr=topics_all">All Topics</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="help.php">Help</a></li>
                        </ul>
                        <p>&copy; 2017 TivaTech</p>
                    </div>
            </div>
            <div class="main-content col-9 col-m-9">
                <div class="btns-top clearfix">
                    <div class="btn-top-item">
                        <a href="index.php?ctr=profile">Posts</a>
                    </div>
                    <div class="btn-top-item">
                        <a href="index.php?ctr=profile&act=clip">Clips</a>
                    </div>
                    <div class="btn-top-item">
                        <a href="index.php?ctr=profile&act=draft">Drafts</a>
                    </div>
                </div>
                <div class="list-mypost">

                        <?php
                            if(count($posts)==0){
                                ?>
                                <div class="item-mypost">
                                    <p style="text-align: center">There are no posts</p>
                                </div>
                                <?php
                            } else {
                                foreach ($posts as $key => $value) {
                                //echo $key." : <br/>";
                                $sourcePhoto = "public/icons/avatar.png";
                                $tpNames = array();
                                $post_id = $value['id'];
                                $quatityLikes = $value['quatity_likes'];
                                $quatity_comments = $value['quatity_comments'];
                                $quatity_clips = $value['quatity_clips'];
                                $titlePost = $value['title'];
                                $content = $value['content'];
                                $time = $value['created_at'];
                                if($avatar[$post_id]!="") {
                                    $sourcePhoto = $avatar[$post_id];
                                }
                                $authorName = $author[$post_id];
                                foreach ($topicNames[$post_id] as $k => $v) {
                                    $tpNames[$k] =  $v['topicName'];
                                }

                                ?>
                            <div class="item-mypost">
                            <div class="item-mypost-title clearfix">
                                <div class="item-title">
                                    <a href="index.php?ctr=post_detail&post_id=<?php echo $post_id;?>">
                                        <?=$titlePost?>
                                    </a>
                                </div>
                                <div class="item-time">
                                    <a href="#"><?=$time?></a>
                                </div>
                                <?php
                                    if(isset($_SESSION['idUser']) && $user_id==$authorInfo[0]['id']) {
                                        ?>
                                        <div class="item-edit">
                                            <a href="index.php?ctr=edit_post&post_id=<?php echo $post_id;?>" title="Edit this Post">
                                                <img src="public/icons/edit.png" alt="Edit Post">
                                            </a>
                                        </div>
                                        <div class="item-delete">
                                            <a href="index.php?ctr=delete_post&action=delete&post_id=<?php echo $post_id; ?>"
                                                title="Delete this Post"
                                                onclick="return window.confirm('Do you want delete this post?')">
                                                <img src="public/icons/trash.png" alt="Delete Post">
                                            </a>
                                        </div>
                                        <?php
                                    }
                                ?>

                                <div class="item-view">
                                    <a href="index.php?ctr=post_detail&post_id=<?php echo $post_id;?>" title="Go to view this Post">
                                        <img src="public/icons/view.png" alt="View Post">
                                    </a>
                                </div>
                            </div>
                            <div class="topic">
                                    <?php
                                    foreach ($tpNames as $t => $n) {
                                        ?>
                                            <a class="topic-name" href="topics.php">
                                                 <?=$n?>
                                            </a>
                                        <?php
                                    }
                                    ?>
                                    </div>
                            <div class="item-mypost-content">
                                <p>
                                    <?=$content?>
                                </p>
                            </div>
                            <div class="symbol-post clearfix">
                                <div class="symbol-post-item clearfix">
                                    <?php
                                        if(!isset($_SESSION['login'])) : ?>
                                            <a href="index.php?ctr=login" title="Like this post"
                                                onclick="return window.confirm('You must login to use this feater!')" class="<?php echo $className[$post_id]; ?>">
                                                <p class="count-like"><?=$quatityLikes?></p>
                                            </a>
                                        <?php else : ?>
                                            <a  href="javascript:void(0)" class="<?php echo $className[$post_id]; ?>" post-id="<?php echo $post_id?>" title="Like this post">
                                                <p class="count-like"><?=$quatityLikes?></p>
                                            </a>
                                        <?php endif; ?>
                                </div>
                                <div class="symbol-post-item clearfix">
                                    <?php
                                        if(!isset($_SESSION['login'])) {
                                            ?>
                                            <a class="btn-clip" href="index.php?ctr=login" title="Clip this post"
                                                onclick="return window.confirm('You must login to use this feater!')">
                                                <p><?php echo $quatity_clips;?></p>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a class="btn-clip" href="clip.php" title="Clip this post">
                                                <p><?php echo $quatity_clips;?></p>
                                            </a>
                                            <?php
                                        }
                                    ?>

                                </div>
                                <div class="symbol-post-item clearfix">
                                    <?php
                                    if(!isset($_SESSION['login'])) {
                                        ?>
                                        <a class="btn-comment" href="javascript:void(0)" title="Comment"
                                            onclick="return window.confirm('You must login to use this feater!')"
                                            post-id="<?php echo $post_id;?>">
                                            <p class="count-comment" post-id="<?php echo $post_id;?>"><?php echo $quatity_comments;?></p>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn-comment" href="javascript:void(0)" title="Comment" post-id="<?php echo $post_id;?>">
                                            <p class="count-comment" post-id="<?php echo $post_id;?>"><?php echo $quatity_comments;?></p>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                </div>
                                <div class="symbol-post-item clearfix">
                                    <?php
                                        if(!isset($_SESSION['login'])) {
                                            ?>
                                            <a class="btn-report" href="index.php?ctr=login" title="Report Post"
                                                onclick="return window.confirm('You must login to use this feater!')">
                                                <p>Report</p>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a class="btn-report" href="#" title="Report Post">
                                                <p>Report</p>
                                            </a>
                                            <?php
                                        }
                                    ?>

                                </div>
                            </div>
                            <!-- Comment -->
                        <div class="comment-container" post-id="<?php echo $post_id;?>">
                            <div class="commment-list" post-id="<?php echo $post_id;?>">

                            </div>
                            <div class="comment-post clearfix">
                                <div class="comment-item-photo">
                                    <?php
                                        if(!isset($_SESSION['login']) || $_SESSION['avatar']=="") {
                                            ?>
                                            <a href="authors.php">
                                                <img src="public/images/avatar.png" alt="Avartar">
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="authors.php">
                                                <img src="<?=$_SESSION['avatar']?>" alt="Avartar">
                                            </a>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <form action="index.php?ctr=cmt" class="comment-form clearfix"  post-id="<?php echo $post_id;?>" method="post">
                                    <textarea class="comment-post-content" name="cmtContent" rows="3" cols="70" post-id="<?php echo $post_id;?>"></textarea>
                                    <input type="submit" name="btn-submit" value="Comment" post-id="<?php echo $post_id;?>">
                                    <input type="reset" name="btn-reset" value="Cancle">
                                </form>
                            </div>
                        </div>
                        </div>
                        <?php
                        }
                            }
                        ?>

                </div>
            </div>
        </div>
    </body>
</html>
