<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="keyword" content="TivaTech, Infomation Technology, Socical Networking Website">
        <meta name="description" content="TivaTech is a social netwoking website">
        <meta name="author" content="Tom Nguyen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Post Page</title>
        <link rel="stylesheet" href="public/css/home.css">
        <link rel="stylesheet" href="public/css/post.css">
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
            </div>
            <!-- Main -->
            <div class="main row">
                <!-- Left sidebar -->
                <div class="sidebar col-3 col-m-3">
                    <!-- Author Info -->
                    <div class="sidebar-list">
                        <div class="sidebar-item">
                            <div class="sidebar-info clearfix">
                                <div class="author-avatar">
                                    <?php
                                        if($authorInfo[0]['photo']=="") {
                                            ?>
                                            <a href="index.php?ctr=authors_all&act=detail&author_id=<?php echo $authorInfo[0]['id']; ?>">
                                                <img src="public/images/avatar.png" alt="Avartar">
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="index.php?ctr=authors_all&act=detail&author_id=<?php echo $authorInfo[0]['id']; ?>">
                                                <img src="<?=$authorInfo[0]['photo']?>" alt="Avartar">
                                            </a>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <div>
                                    <a href="index.php?ctr=authors_all&act=detail&author_id=<?php echo $authorInfo[0]['id']; ?>">
                                        <?php
                                            echo $authorInfo[0]['firstname']." ".$authorInfo[0]['lastname'];
                                        ?>
                                    </a>
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
                    <!-- Clip this post -->
                    <div class="clip-post">
                        <a href="clip.php" title="Clip this post">
                            <img src="public/icons/clip-red.png" alt="Clip">
                            Clip this post
                        </a>
                    </div>
                    <!-- Top Posts -->
                    <div class="title display-none">
                        <a href="top-posts.php">Top Posts</a>
                    </div>
                    <div class="sidebar-list display-none">
                        <?php
                            if(count($topPosts)==0) {
                                ?>
                                <div class="sidebar-item">
                                    <div class="sidebar-title-post">
                                            <p>There are no posts</p>
                                    </div>
                                </div>
                                <?php
                            } else {
                                for($i=0;$i<count($topPosts);$i++) {
                                    $user_id = $topPosts[$i]['user_id'];
                                    ?>
                                    <div class="sidebar-item">
                                        <div class="sidebar-title-post">
                                                <a href="post.php">
                                                    <?=$topPosts[$i]['title']?>
                                                </a>
                                        </div>
                                        <div class="sidebar-author-post">
                                            <a href="index.php?ctr=authors_all&act=detail&author_id=<?php echo $user_id; ?>">

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
                                                        <a class="btn-comment" href="index.php?ctr=login" title="Comment"
                                                            onclick="return window.confirm('You must login to use this feater!')">
                                                            <p>
                                                                <?=$topPosts[$i]['quatity_comments']?>
                                                            </p>
                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a class="btn-comment" href="comment.php" title="Comment">
                                                            <p>
                                                                <?=$topPosts[$i]['quatity_comments']?>
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
                            }

                        ?>
                    </div>

                    <!-- Top Topics -->
                    <div class="title display-none">
                        <a href="top-topics.php">Top Topics</a>
                    </div>
                    <div class="sidebar-topics-list clearfix display-none">
                        <?php
                            for($i=0;$i<7;$i++) {
                                ?>
                                <div class="sidebar-topic-item clearfix">
                                    <a href="index.php?ctr=topic_one&topic_id=<?php echo $topTopics[$i]['id'];?>">
                                        <?=$topTopics[$i]['name']?>
                                    </a>
                                    <p><?=$topTopics[$i]['quatity_post']?></p>
                                </div>
                                <?php
                            }
                        ?>
                    </div>

                    <!-- Sidebar Footer -->
                    <div class="sidebar-footer display-none">
                        <ul class="sidenav">
                            <li><a href="index.php">Posts</a></li>
                            <li><a href="index.php?ctr=topics_all">All Topics</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                        <p>&copy; 2017 TivaTech</p>
                    </div>
                </div>
                <!-- Main Content -->
                <div class="main-content col-9 col-m-9">
                    <!-- This post content  -->
                    <div class="list-mypost">
                        <div class="item-mypost">
                            <div class="item-mypost-title clearfix">
                                <div class="item-title">
                                    <a href="index.php?ctr=post_detail&post_id=<?php echo $posts[0]['id'];?>">
                                        <?php echo $posts[0]['title'];?>
                                    </a>
                                </div>
                                <div class="item-time">
                                    <a href="#">
                                        <?php echo $posts[0]['created_at'];?>
                                    </a>
                                </div>
                            </div>
                            <div class="topic">

                                <?php
                                    foreach ($topicNames as $key => $value) {
                                        ?>
                                        <a class="topic-name" href="topics.php">
                                             <?php echo $value['topicName'];?>
                                        </a>
                                    <?php
                                    }
                                ?>
                            </div>
                            <div class="item-mypost-content">
                                    <p>
                                    <?php echo $posts[0]['content']; ?>
                                    </p>
                            </div>
                            <div class="symbol-post clearfix">
                                <div class="symbol-post-item clearfix">
                                    <?php
                                        if(!isset($_SESSION['login'])) : ?>
                                            <a href="index.php?ctr=login" title="Like this post"
                                                onclick="return window.confirm('You must login to use this feater!')" class="<?php echo $className[$posts[0]['id']]; ?>">
                                                <p class="count-like"><?php echo $posts[0]['quatity_likes'];?></p>
                                            </a>
                                        <?php else : ?>
                                            <a  href="javascript:void(0)" class="<?php echo $className[$posts[0]['id']]; ?>" post-id="<?php echo $posts[0]['id']?>" title="Like this post">
                                                <p class="count-like"><?php echo $posts[0]['quatity_likes'];?></p>
                                            </a>
                                        <?php endif; ?>
                                </div>
                                <div class="symbol-post-item clearfix">
                                    <?php
                                        if(!isset($_SESSION['login'])) {
                                            ?>
                                            <a class="btn-clip" href="index.php?ctr=login" title="Clip this post"
                                                onclick="return window.confirm('You must login to use this feater!')">
                                                <p><?php echo $posts[0]['quatity_clips'];?></p>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a class="btn-clip" href="clip.php" title="Clip this post">
                                                <p><?php echo $posts[0]['quatity_clips'];?></p>
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
                                            post-id="<?php echo $posts[0]['id'];?>">
                                            <p class="count-comment" post-id="<?php echo $posts[0]['id'];?>"><?php echo $posts[0]['quatity_comments'];?></p>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn-comment" href="javascript:void(0)" title="Comment" post-id="<?php echo $posts[0]['id'];?>">
                                            <p class="count-comment" post-id="<?php echo $posts[0]['id'];?>"><?php echo $posts[0]['quatity_comments'];?></p>
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
                        <div class="comment-container" post-id="<?php echo $posts[0]['id'];?>">
                            <div class="commment-list" post-id="<?php echo $posts[0]['id'];?>">

                            </div>
                            <div class="comment-post clearfix">
                                <div class="comment-item-photo">
                                    <?php
                                        if(!isset($_SESSION['login']) || $_SESSION['avatar']=="") {
                                            ?>
                                            <a href="index.php?ctr=authors_all&act=detail&author_id=<?php echo $_SESSION['idUser'];?>">
                                                <img src="public/images/avatar.png" alt="Avartar">
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="index.php?ctr=authors_all&act=detail&author_id=<?php echo $_SESSION['idUser'];?>">
                                                <img src="<?=$_SESSION['avatar']?>" alt="Avartar">
                                            </a>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <form action="index.php?ctr=cmt" class="comment-form clearfix"  post-id="<?php echo $posts[0]['id'];?>" method="post">
                                    <textarea class="comment-post-content" name="cmtContent" rows="3" cols="70" post-id="<?php echo $posts[0]['id'];?>"></textarea>
                                    <input type="submit" name="btn-submit" value="Comment" post-id="<?php echo $posts[0]['id'];?>">
                                    <input type="reset" name="btn-reset" value="Cancle">
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- List posts same topic  -->
                    <!-- <div class="title">Same topic</div>
                    <div class="list-post-same-topic clearfix">
                        <div class="item-same-post">
                            <div class="sidebar-title-post">
                                    <a href="post.php">
                                        How to design menu in html.
                                        How to design navtop in html.
                                        How to design submenu in html.
                                    </a>
                            </div>
                            <div class="sidebar-author-post">
                                <a href="authors.php">
                                    Tom Nguyen
                                </a>
                            </div>
                            <div class="symbol clearfix">
                                <div class="symbol-item clearfix">
                                    <a href="like.php" title="Like this post">
                                        <img src="../icons/like.png" alt="Like thos post">
                                    </a>
                                    <p>10</p>
                                </div>
                                <div class="symbol-item clearfix">
                                    <a href="clip.php" title="Clip this post">
                                        <img src="../icons/clip.png" alt="Clip this post">
                                    </a>
                                    <p>10</p>
                                </div>
                                <div class="symbol-item clearfix">
                                    <a href="comment.php" title="Comment">
                                        <img src="../icons/comment2.png" alt="Comment">
                                    </a>
                                    <p>10</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-same-post">
                            <div class="sidebar-title-post">
                                    <a href="post.php">
                                        How to design menu in html.
                                        How to design navtop in html.
                                        How to design submenu in html.
                                    </a>
                            </div>
                            <div class="sidebar-author-post">
                                <a href="authors.php">
                                    Tom Nguyen
                                </a>
                            </div>
                            <div class="symbol clearfix">
                                <div class="symbol-item clearfix">
                                    <a href="like.php" title="Like this post">
                                        <img src="../icons/like.png" alt="Like thos post">
                                    </a>
                                    <p>10</p>
                                </div>
                                <div class="symbol-item clearfix">
                                    <a href="clip.php" title="Clip this post">
                                        <img src="../icons/clip.png" alt="Clip this post">
                                    </a>
                                    <p>10</p>
                                </div>
                                <div class="symbol-item clearfix">
                                    <a href="comment.php" title="Comment">
                                        <img src="../icons/comment2.png" alt="Comment">
                                    </a>
                                    <p>10</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-same-post">
                            <div class="sidebar-title-post">
                                    <a href="post.php">
                                        How to design menu in html.
                                        How to design navtop in html.
                                        How to design submenu in html.
                                    </a>
                            </div>
                            <div class="sidebar-author-post">
                                <a href="authors.php">
                                    Tom Nguyen
                                </a>
                            </div>
                            <div class="symbol clearfix">
                                <div class="symbol-item clearfix">
                                    <a href="like.php" title="Like this post">
                                        <img src="../icons/like.png" alt="Like thos post">
                                    </a>
                                    <p>10</p>
                                </div>
                                <div class="symbol-item clearfix">
                                    <a href="clip.php" title="Clip this post">
                                        <img src="../icons/clip.png" alt="Clip this post">
                                    </a>
                                    <p>10</p>
                                </div>
                                <div class="symbol-item clearfix">
                                    <a href="comment.php" title="Comment">
                                        <img src="../icons/comment2.png" alt="Comment">
                                    </a>
                                    <p>10</p>
                                </div>
                            </div>
                        </div>
                    </div> -->

                        <?php
                            if(count($postsSameAuthor)>0) {
                                ?>
                                <div class="title">More from <?php echo $authorInfo[0]['firstname']." ".$authorInfo[0]['lastname'];?></div>
                                <div class="list-post-same-topic clearfix">
                                <?php
                                for($i=0;$i<count($postsSameAuthor);$i++) {
                                    ?>
                                    <div class="item-same-post">
                                        <div class="sidebar-title-post">
                                                <a href="index.php?ctr=post_detail&post_id=<?php echo $postsSameAuthor[$i]['id']?>">
                                                    <?php
                                                        //var_dump($postsSameAuthor);
                                                        echo $postsSameAuthor[$i]['title'];
                                                    ?>
                                                </a>
                                        </div>
                                        <div class="sidebar-author-post">
                                            <a href="index.php?ctr=authors_all&act=detail&author_id=<?php echo $authorInfo[0]['id'];?>">
                                                <?php echo $authorInfo[0]['firstname']." ".$authorInfo[0]['lastname'];?>
                                            </a>
                                        </div>
                                        <div class="symbol-post clearfix">
                                            <div class="symbol-post-item clearfix">
                                                <?php
                                                    if(!isset($_SESSION['login'])) : ?>
                                                        <a href="index.php?ctr=login" title="Like this post"
                                                            onclick="return window.confirm('You must login to use this feater!')" class="<?php echo $classSameName[$postsSameAuthor[$i]['id']]; ?>">
                                                            <p class="count-like"><?php echo $postsSameAuthor[$i]['quatity_likes'];?></p>
                                                        </a>
                                                    <?php else : ?>
                                                        <a  href="javascript:void(0)" class="<?php echo $classSameName[$postsSameAuthor[$i]['id']]; ?>" post-id="<?php echo $postsSameAuthor[$i]['id'];?>" title="Like this post">
                                                            <p class="count-like"><?php echo $postsSameAuthor[$i]['quatity_likes'];?></p>
                                                        </a>
                                                    <?php endif; ?>
                                            </div>
                                            <div class="symbol-post-item clearfix">
                                                <?php
                                                    if(!isset($_SESSION['login'])) {
                                                        ?>
                                                        <a class="btn-clip" href="index.php?ctr=login" title="Clip this post"
                                                            onclick="return window.confirm('You must login to use this feater!')">
                                                            <p>10</p>
                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a class="btn-clip" href="clip.php" title="Clip this post">
                                                            <p>10</p>
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
                                            post-id="<?php echo $postsSameAuthor[$i]['id'];?>">
                                            <p class="count-comment" post-id="<?php echo $postsSameAuthor[$i]['id'];?>"><?php echo $postsSameAuthor[$i]['quatity_comments'];?></p>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn-comment" href="index.php?ctr=post_detail&post_id=<?php echo $postsSameAuthor[$i]['id'];?>"
                                            title="Comment" post-id="<?php echo $postsSameAuthor[$i]['id'];?>">
                                            <p class="count-comment" post-id="<?php echo $postsSameAuthor[$i]['id'];?>"><?php echo $postsSameAuthor[$i]['quatity_comments'];?></p>
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
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                    <?php
                            }

                        ?>
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
            </div>

        </div>
    </body>
</html>
