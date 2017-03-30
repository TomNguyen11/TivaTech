<!DOCTYPE html>
<html>
    <head>
        <title>TivaTech - Home Page</title>
        <meta charset="utf-8">
        <meta name="keyword" content="TivaTech, Infomation Technology, Socical Networking Website">
        <meta name="description" content="TivaTech is a social netwoking website">
        <meta name="author" content="Tom Nguyen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/css/home.css">
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
        <script src="public/js/like.js" charset="utf-8"></script>
        <script src="public/js/star.js" charset="utf-8"></script>
        <script src="public/js/search.js" charset="utf-8"></script>
        <script src="public/js/comment.js" charset="utf-8"></script>
        <script src="public/js/myjs.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="container">
            <!-- Header -->
            <div class="header">
                <!-- Top menu -->
                <?php include "_header.php";?>
                <!-- The guiding paragraph -->
                <div class="header-content">
                    <p>Hi <?php if(isset($_SESSION['firstname'])) echo $_SESSION['firstname']; ?>,</p>
                    <p>What thing do you want to share today?</p>
                    <p>
                        <a href="new-post.php">Get start now!</a>
                    </p>
                </div>
                <!-- Main menu -->
                <div class="main-menu">
                    <ul class="row">
                        <li class="col-2 col-m-2"><a href="index.php">Newest</a></li>
                        <li class="col-2 col-m-2"><a href="top-posts.php">Tops Posts</a></li>
                        <li class="col-2 col-m-2"><a href="clips.php">My Clips</a></li>
                        <li class="col-2 col-m-2"><a href="index.php?ctr=topics_all">All Topics</a></li>
                        <li class="col-2 col-m-2"><a href="top-authors.php">Top Authors</a></li>
                        <li class="col-2 col-m-2">
                            <?php
                            if(!isset($_SESSION['login'])) {
                                ?>
                                    <a onclick="return window.confirm('You must login to use this feater!')"
                                        href="index.php?ctr=login">
                                        Create Post
                                    </a>
                                <?php
                            }
                            else {
                                ?>
                                    <a href="index.php?ctr=create_post">Create Post</a>
                                <?php
                            }
                            ?>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="main row">
                <!-- Left sidebar -->
                <div class="sidebar col-3 col-m-3">
                    <!-- Top Authors -->
                    <div class="title">
                        <a href="top-authors.php">Top Authors</a>
                    </div>
                    <div class="sidebar-list">
                        <?php
                            for($i=0; $i<count($topAuthors); $i++) {
                                $authorID = $topAuthors[$i]['id'];
                                ?>
                                <div class="sidebar-item">
                                    <div class="sidebar-info clearfix">
                                        <div class="author-avatar">
                                            <?php
                                                if($topAuthors[$i]['photo']=="") {
                                                    ?>
                                                    <a href="authors.php">
                                                        <img src="public/images/avatar.png" alt="Avartar">
                                                    </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="authors.php">
                                                        <img src="<?=$topAuthors[$i]['photo']?>" alt="Avartar">
                                                    </a>
                                                    <?php
                                                }
                                            ?>

                                        </div>
                                        <div>
                                            <a href="authors.php">
                                                <?=$topAuthors[$i]['firstname']." ".$topAuthors[$i]['lastname']?>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="symbol clearfix">
                                        <div class="symbol-item clearfix">
                                            <a href="following.php">
                                                <img src="public/icons/following.png" alt="Avartar">
                                            </a>
                                        </div>
                                        <div class="symbol-post-item clearfix">
                                            <?php
                                                if(!isset($_SESSION['login'])) : ?>
                                                    <a class="<?php echo $classNameStar[$authorID]; ?>" href="index.php?ctr=login"
                                                        onclick="return window.confirm('You must login to use this feater!')"
                                                        author-id="<?php echo $topAuthors[$i]['id'];?>">
                                                        <p class="count-star"><?=$topAuthors[$i]['quatity_stars']?></p>
                                                    </a>
                                                <?php else : ?>
                                                    <a  class="<?php echo $classNameStar[$authorID]; ?>" href="javascript:void(0)"
                                                        author-id="<?php echo $topAuthors[$i]['id'];?>">
                                                        <p class="count-star"><?=$topAuthors[$i]['quatity_stars']?></p>
                                                    </a>
                                                <?php endif; ?>

                                        </div>
                                        <div class="symbol-item clearfix">
                                            <img src="public/icons/follower.png" alt="Follower">
                                            <p><?=$authorFollowers[$authorID][0]['followers']?></p>
                                        </div>
                                        <div class="symbol-item clearfix">
                                            <img src="public/icons/pen.png" alt="Total Post">
                                            <p>
                                                <?=$topAuthors[$i]['quatity_posts']?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>

                    </div>

                    <!-- Top Posts -->
                    <div class="title">
                        <a href="top-posts.php">Top Posts</a>
                    </div>
                    <div class="sidebar-list">
                        <?php
                            for($i=0;$i<count($topPosts);$i++) {
                                $user_id = $topPosts[$i]['user_id'];
                                ?>
                                <div class="sidebar-item">
                                    <div class="sidebar-title-post">
                                            <a href="post.php">
                                                <?php echo $topPosts[$i]['title'];?>
                                            </a>
                                    </div>
                                    <div class="sidebar-author-post">
                                        <a href="authors.php">

                                            <?=$topPostsAuthorInfo[$user_id][0]['firstname']." ".$topPostsAuthorInfo[$user_id][0]['lastname']?>
                                        </a>
                                    </div>
                                    <div class="symbol clearfix">
                                        <div class="symbol-post-item clearfix">
                                            <?php
                                                if(!isset($_SESSION['login'])) : ?>
                                                    <a href="index.php?ctr=login" title="Like this post"
                                                        onclick="return window.confirm('You must login to use this feater!')"
                                                        class="<?php echo $classNameTopPosts[$topPosts[$i]['id']]; ?>"
                                                        post-id="<?php echo $topPosts[$i]['id']?>" title="Like this post">
                                                        <p class="count-like">
                                                            <?php echo $topPosts[$i]['quatity_likes'];?>
                                                        </p>
                                                    </a>
                                                <?php else : ?>
                                                    <a  href="javascript:void(0)"
                                                        class="<?php echo $classNameTopPosts[$topPosts[$i]['id']]; ?>"
                                                        post-id="<?php echo $topPosts[$i]['id']?>" title="Like this post">
                                                        <p class="count-like">
                                                            <?php echo $topPosts[$i]['quatity_likes'];?>
                                                        </p>
                                                    </a>
                                                <?php endif; ?>
                                        </div>
                                        <div class="symbol-post-item clearfix">
                                            <?php
                                                if(!isset($_SESSION['login'])) {
                                                    ?>
                                                    <a class="btn-clip" href="index.php?ctr=login" title="Clip this post"
                                                        onclick="return window.confirm('You must login to use this feater!')">
                                                        <p>
                                                            <?=$topPosts[$i]['quatity_clips']?>
                                                        </p>
                                                    </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="btn-clip" href="clip.php" title="Clip this post">
                                                        <p>
                                                            <?=$topPosts[$i]['quatity_clips']?>
                                                        </p>
                                                    </a>
                                                    <?php
                                                }
                                            ?>

                                        </div>
                                        <div class="symbol-post-item clearfix">
                                            <?php

                                                if(!isset($_SESSION['login'])) {
                                                    ?>
                                                    <a class="btn-comment" href="index.php?ctr=post_detail&post_id=<?php echo $topPosts[$i]['id'];?>"
                                                    title="Comment" onclick="return window.confirm('You must login to use this feater!')">
                                                        <p>
                                                            <?php echo $topPosts[$i]['quatity_comments'];?>
                                                        </p>
                                                    </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="btn-comment" href="index.php?ctr=post_detail&post_id=<?php echo $topPosts[$i]['id'];?>" title="Comment">
                                                        <p>
                                                            <?php echo $topPosts[$i]['quatity_comments'];?>
                                                        </p>
                                                    </a>
                                                    <?php
                                                }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>

                    <!-- Top Topics -->
                    <div class="title">
                        <a href="top-topics.php">Top Topics</a>
                    </div>
                    <div class="sidebar-topics-list clearfix">
                    <?php
                        for($i=0;$i<7;$i++) {
                            ?>
                            <div class="sidebar-topic-item clearfix">
                                <a href="topics.php?id=">
                                    <?=$topTopics[$i]['name']?>
                                </a>
                                <p><?=$topTopics[$i]['quatity_post']?></p>
                            </div>
                            <?php
                        }
                    ?>
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

                <!-- The main content of homepage -->
                <div class="main-content col-9 col-m-9">
                    <?php
                        if(count($posts)==0) {
                            ?>
                            <div class="item-post">
                                <p>There is no result.</p>
                            </div>
                            <?php
                        } else {
                            foreach ($posts as $key => $value) {
                                //echo $key." : <br/>";
                                $sourcePhoto = "public/images/avatar.png";
                                $tpNames = array();
                                $post_id = $value['id'];
                                $quatityLikes = $value['quatity_likes'];
                                $quatity_comments = $value['quatity_comments'];
                                $quatity_clips = $value['quatity_clips'];
                                $user_id = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;
                                $titlePost = $value['title'];
                                $content = $value['content'];
                                $time = $value['created_at'];
                                if($avatar[$post_id]!="") {
                                    $sourcePhoto = $avatar[$post_id];
                                }
                                $authorName = $author[$post_id]['firstname']." ".$author[$post_id]['lastname'];
                                foreach ($topicNames[$post_id] as $k => $v) {
                                    $tpNames[$k] =  $v['topicName'];
                                }
                                ?>

                                <div class="item-post">
                                    <div class="author-post clearfix">
                                            <div>
                                                <a href="authors.php">
                                                    <?php echo '<img src="'.$sourcePhoto.'" alt="Avatar">'?>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="authors.php">
                                                    <?=$authorName?>
                                                </a>
                                            </div>
                                        <p class="time-post">
                                            <?=$time?>
                                        </p>
                                    </div>

                                    <div class="title-post">
                                        <a href="index.php?ctr=post_detail&post_id=<?php echo $post_id;?>">
                                            <?=$titlePost?>
                                        </a>
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
                                    </div>
                            <div class="content-post">
                                <p>
                                    <?php echo $content;?>
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
                                                <p class="count-clip"><?php echo $quatity_clips;?></p>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a class="btn-clip" href="clip.php" title="Clip this post">
                                                <p class="count-clip"><?php echo $quatity_clips;?></p>
                                            </a>
                                            <?php
                                        }
                                    ?>

                                </div>
                                <div class="symbol-post-item clearfix">
                                    <?php
                                        if(!isset($_SESSION['login'])) {
                                            ?>
                                            <a class="btn-comment" href="index.php?ctr=login" title="Comment"
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
                                            <a class="btn-report" href="report.php" title="Report Post">
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
<!-- https://github.com/PhuongNamCorpsIntern/workspace/issues/15 -->
