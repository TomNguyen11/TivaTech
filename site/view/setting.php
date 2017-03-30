<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="keyword" content="TivaTech, Infomation Technology, Socical Networking Website">
        <meta name="description" content="TivaTech is a social netwoking website">
        <meta name="author" content="Tom Nguyen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Setting Page</title>
        <link rel="stylesheet" href="public/css/home.css">
        <link rel="stylesheet" href="public/css/profile.css">
        <link rel="stylesheet" href="public/css/setting.css">
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
        <script src="public/js/like.js" charset="utf-8"></script>
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
                <div class="side-menu col-12 col-m-12">
                    <ul class="clearfix">
                        <li><a href="index.php?ctr=setting"
                            <?php if($index=="profile") echo 'class="setting_actice"'; ?>>Profile</a></li>
                        <li><a href="index.php?ctr=setting&act=showChangePwd"
                            <?php if($index!="profile") echo 'class="setting_actice"'; ?>>Password</a></li>
                    </ul>
                </div>
                <div class="main-content col-12 col-m-12">
                    <div class="clearfix">
                        <div class="photo">
                            <?php if($authorInfo[0]['photo']=="") :?>
                                <img src="public/images/avatar.png" alt="">
                            <?php else :?>
                                <img src="<?php echo $authorInfo[0]['photo']?>" alt="<?php echo $authorInfo[0]['firstname']." ".$authorInfo[0]['lastname']; ?>">
                            <?php endif; ?>
                        </div>
                    <?php if($index=='profile'): ?>
                            <form class="form-update" action="index.php?ctr=setting&act=update" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td><label for="">Firstname</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="firstname" value="<?php echo $authorInfo[0]['firstname']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Lastname</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="lastname" value="<?php echo $authorInfo[0]['lastname']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Email</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="email" name="email" value="<?php echo $authorInfo[0]['email']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Upload a new avatar</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="file" name="photo" value="<?php echo $authorInfo[0]['photo']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="reset" name="" value="Cancle">
                                            <input type="submit" name="btn-submit" value="Update">
                                        </td>
                                    </tr>
                                </table>
                            </form>

                    <?php else: ?>
                        <form class="form-update" action="index.php?ctr=setting&act=pwd" method="post">
                            <table>
                                <tr>
                                    <td><label for="">Old Password</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="password" name="oldPwd" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">New Password</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="password" name="newPwd" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Confirm Password</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="password" name="rePwd" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="reset" name="" value="Cancle">
                                        <input type="submit" name="btn-submit" value="Update">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    <?php endif; ?>
                    </div>

                        <?php if(isset($_GET['stt']) && $_GET['stt']!=""):?>
                            <div class="msg">
                            <p><?php echo $_GET['stt']; ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($_GET['msg']) && $_GET['msg']!=""):?>
                            <div class="msg">
                            <p><?php echo $_GET['msg']; ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($_GET['msg']) && $_GET['msg']=="Change password success"):?>
                            <script type="text/javascript">
                                var x = confirm("Do you want to login with new password?");
                                if(x==true){
                                    window.location.replace("index.php?ctr=login");
                                }
                            </script>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>
