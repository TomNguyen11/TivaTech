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
        <link rel="stylesheet" href="public/css/post.css">
        <link rel="stylesheet" href="public/css/authors_all.css">
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
        <script src="public/js/like.js" charset="utf-8"></script>
        <script src="public/js/star.js" charset="utf-8"></script>
        <script src="public/js/search.js" charset="utf-8"></script>
        <script src="public/js/comment.js" charset="utf-8"></script>
        <script src="public/js/myjs.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <!-- Top menu -->
                <?php include "_header.php";?>
            </div>
            <div class="main clearfix">
                <div class="title_main">
                    <p>All authors (<?php echo count($allauthors);?>)</p>
                </div>
                <div class="list-topics clearfix">
                    <?php
                        foreach ($allauthors as $key => $value) {
                            ?>
                            <div class="item-topic clearfix">
                                    <?php
                                        if($value['photo']!=""){
                                            ?>
                                            <a href="index.php?ctr=authors_all&act=detail&author_id=<?php echo $value['id']; ?>">
                                                <div class="logo-topic-image">
                                                    <img width="100px" height="100px"
                                                        src="<?php echo $value['photo']?>" alt="<?php echo $value['firstname']." ".$value['lastname']; ?>">
                                                </div>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="index.php?ctr=authors_all&act=detail&author_id=<?php echo $value['id']; ?>">
                                                <div class="logo-topic-image">
                                                    <img width="100px" height="100px"
                                                        src="public/images/avatar.png" alt="<?php echo $value['firstname']." ".$value['lastname']; ?>">
                                                </div>
                                            </a>
                                            <?php
                                        }
                                    ?>
                                    <div class="info-topic">
                                        <p class="item-name">
                                            <?php echo $value['firstname']." ".$value['lastname']; ?>
                                        </p>
                                        <div class="symbol clearfix">
                                            <div class="symbol-item clearfix">
                                                <a href="#">
                                                    <img src="public/icons/following.png" alt="Avartar">
                                                </a>
                                            </div>
                                            <div class="symbol-post-item clearfix">
                                                <?php
                                                    if(!isset($_SESSION['login'])) : ?>
                                                        <a class="<?php echo $classNameStar[$value['id']]; ?>" href="index.php?ctr=login"
                                                            onclick="return window.confirm('You must login to use this feater!')"
                                                            author-id="<?php echo $value['id'];?>">
                                                            <p class="count-star"><?=$value['quatity_stars']?></p>
                                                        </a>
                                                    <?php else : ?>
                                                        <a  class="<?php echo $classNameStar[$value['id']]; ?>" href="javascript:void(0)"
                                                            author-id="<?php echo $value['id'];?>">
                                                            <p class="count-star"><?=$value['quatity_stars']?></p>
                                                        </a>
                                                    <?php endif; ?>

                                            </div>
                                            <!-- <div class="symbol-item clearfix">
                                                <img src="public/icons/follower.png" alt="Follower">
                                                <p><?php //echo $authorFollowers[$authorID][0]['followers']?></p>
                                            </div> -->
                                            <div class="symbol-item clearfix">
                                                <img src="public/icons/pen.png" alt="Total Post">
                                                <p>
                                                    <?=$value['quatity_posts']?>
                                                </p>
                                            </div>
                                        </div>
                                        <a href="#">FOLLOW</a>
                                    </div>

                            </div>
                            <?php
                        }
                    ?>
                </div>


            </div>
        </div>
