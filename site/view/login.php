<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="keyword" content="TivaTech, Infomation Technology, Socical Networking Website">
        <meta name="description" content="TivaTech is a social netwoking website">
        <meta name="author" content="Tom Nguyen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TivaTech - Login Page</title>
        <link rel="stylesheet" href="public/css/main.css"/>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h2>
                    <a href="index.php">TivaTech</a>
                </h2>
                <div class="login">
                    <form name="form-signin" <?php echo 'action="index.php?ctr=login&act=login"'; ?> method="post">
                        <table>
                            <tr>
                                <td class="col-9">
                                    <input type="text" name="email" placeholder="Your email address" />
                                </td>
                                <td class="col-9">
                                    <input type="password" name="password" placeholder="Your Password" />
                                </td>
                                <td class="col-9">
                                    <input type="submit" name="btn-login" value="Login" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <a href="#">Fogrot password?</a>
                </div>
            </div>
            <div class="content">
                <?php
                    if(isset($msg)){
                        echo '<div class="error"><h4>'.$msg.'</h4></div>';
                    }
                ?>

                <div class="registers">
                    <h1>Create a new account</h1>
                    <form name="form-signup" action="index.php?ctr=login&act=signup" method="post">
                        <table>
                            <tr>
                                <td>
                                    <input type="text" name="firstname" placeholder="First name" />
                                </td>
                                <td>
                                    <input type="text" name="lastname" placeholder="Last name" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="email" placeholder="Your email address" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="password" name="password" placeholder="Create a password" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="btn-signup" value="Sign Up">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="footer">
                <div class="top">
                    <ul>
                        <li><a href="#">Top Author</a></li>
                        <li><a href="#">Top Topics</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
                <p>
                &copy; 2017 TivaTech
                </p>
            </div>
        </div>
    </body>
</html>
