<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="keyword" content="TivaTech, Infomation Technology, Socical Networking Website">
        <meta name="description" content="TivaTech is a social netwoking website">
        <meta name="author" content="Tom Nguyen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Post</title>
        <link rel="stylesheet" href="public/css/create-post.css">
        <link rel="stylesheet" href="public/css/home.css">
        <!-- <script src="public/editor/ckeditor/ckeditor.js" charset="utf-8"></script> -->
    </head>
    <body>
        <?php
            include_once "_header.php";
        ?>

        <div class="main-post row">

            <!-- The main content of homepage -->
            <div class="main-content col-12 col-m-12">
                <form class="" action="index.php?ctr=edit_post&act=edit&post_id=<?php echo $postInfo[0]['id'] ?>" method="post">
                    <!-- Title of the post -->
                    <?php
                        if(isset($msg)) echo '<p class="message">'.$msg.'</p>';
                        //var_dump($topicNames);
                        $topicList = "";
                        if(count($topicNames)>0) {
                            for($i=0;$i<count($topicNames)-1;$i++)
                            {
                                $topicList .=  $topicNames[$i]['topic_name'].", ";
                            }
                            $topicList .= $topicNames[count($topicNames)-1]['topic_name'];
                        }

                    ?>
                    <p class="author-name">Author: <?=$_SESSION['firstname']." ".$_SESSION['lastname']?></p>

                    <input type="text" name="title" id="title-post"  placeholder="Title"
                            value="<?php echo $postInfo[0]['title'];?>">
                    <input autocomplete="off" list="allTopicNames" type="text" name="topics" id="topics"  placeholder="Topics"
                            value="<?php echo $topicList; ?>">
                    <datalist class="" id="allTopicNames">
                        <?php
                            foreach ($allTopicNames as $key => $value) {
                                foreach ($value as $k => $v) {
                                    ?>
                                    <option value="<?=$value['name']?>"></option>
                                    <?php
                                }
                            }
                        ?>
                    </datalist>
                    <select class="level-post" name="level-post">
                        <option value="public">Public</option>
                        <option value="private">Save as Draft</option>
                    </select>
                    <button class="btn-submit" type="submit" name="btn-submit">Post</button>
                    <!-- Content of the post -->
                    <?=$editor?>
                    <!-- <textarea name="editor1" id="editor1" rows="10" cols="100">
                        Content
                    </textarea>
                    <script>
                        config = {};
                        config.filebrowserBrowseUrl = "../editor/ckfinder/ckfinder.html";
                        config.filebrowserImageBrowserUrl = "../editor/ckfinder/ckfinder.html";
                        config.filebrowserFlashBrowseUrl = "../editor/ckfinder/ckfinder.html";
                        config.height = 300;
                        config.width = '100%';
                        config.language_list = [ 'en: English','he:Hebrew:rtl', 'pt:Portuguese', 'de:German', 'vi: Vietnamese'];
                        CKEDITOR.replace( 'editor1', config);
                    </script> -->
                </form>
            </div>
        </div>
        <div class="footer">
            <a href="posts.php">Top Posts</a>
            <a href="topics.php">Top Topics</a>
            <a href="about.php">About</a>
            <a href="help.php">Help</a>
            <p>&copy; 2017 TivaTech</p>
        </div>
    </body>
</html>
