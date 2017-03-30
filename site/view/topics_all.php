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
        <link rel="stylesheet" href="public/css/topic_all.css">
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
        <script src="public/js/like.js" charset="utf-8"></script>
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
                    <p>All topics (<?php echo count($allTopics);?>)</p>
                </div>
                <div class="list-topics clearfix">
                    <?php
                        foreach ($allTopics as $key => $value) {
                            ?>
                            <div class="item-topic clearfix">
                                    <?php
                                        if($value['logo']!=""){
                                            ?>
                                            <a href="index.php?ctr=topic_one&topic_id=<?php echo $value['id']; ?>">
                                                <div class="logo-topic-image">
                                                    <img width="100px" height="100px"
                                                        src="<?php echo $value['logo']?>" alt="<?php echo $value['name']; ?>">
                                                </div>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="index.php?ctr=topic_one&topic_id=<?php echo $value['id']; ?>">
                                                <div class="logo-topic">
                                                    <p class="item-name">
                                                        <?php echo $value['name']; ?>
                                                    </p>
                                                </div>
                                            </a>
                                            <?php
                                        }
                                    ?>
                                    <div class="info-topic">
                                        <p class="item-name">
                                            <?php echo $value['name']; ?>
                                        </p>
                                        <p>
                                            <b><?php echo $value['quatity_post'];?></b> posts
                                        </p>
                                        <p>
                                            <b><?php echo $value['quatity_member'];?></b> members
                                        </p>
                                        <a href="#">FOLLOW</a>
                                    </div>

                            </div>
                            <?php
                        }
                    ?>
                </div>


            </div>
        </div>
