<?php
    isset($_REQUEST['error']) ? $error = $_REQUEST['error'] : $error = "";
    
    // clean up error code to avoid XSS
    $error = strip_tags(htmlspecialchars($error));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>daloRADIUS</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/1.css" type="text/css" media="screen,projection" /> -->
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="screen,projection" />

    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">

    <script src="library/javascript/pages_common.js" type="text/javascript"></script>
    <script src="library/javascript/jquery-3.4.1.min.js"></script>
    <script src="library/javascript/bootstrap.bundle.min.js"></script>
</head>


<body id="login" onLoad="document.login.operator_user.focus()">
    <?php
        include_once("lang/main.php");
    ?>

    <div class="container">
        <div class="row justify-content-center align-items-center login-row">
            <div class="col-md-7 col-lg-5">

                <div class="card text-center">
                    <img class="login-logo" src="images/logo.svg" alt="logo">
                    <div class="card-body">

                        <div class="login-text">
                            <h2 class="card-title">
                                <?php echo t('Intro', 'login.php') ?>
                            </h2>
                            <p class="card-text">
                                <?php echo t('text', 'LoginPlease') ?>
                            </p>
                        </div>

                        <form name="login" action="dologin.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="operator_user" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="operator_pass" placeholder="Password">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="location">Location</label>
                                </div>
                                <select name="location" class="custom-select" id="location">
                                    <?php
                                    if (isset($configValues['CONFIG_LOCATIONS']) && is_array($configValues['CONFIG_LOCATIONS']) && count($configValues['CONFIG_LOCATIONS']) > 0) {
                                        foreach ($configValues['CONFIG_LOCATIONS'] as $locations => $val) {
                                            echo "<option value='$locations'>$locations</option>";
                                        }
                                    } else {
                                        echo "<option value='default'>Default</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>

                        <?php
                        if ($error) {
                            ?>

                        <div class="alert alert-danger text-left" role="alert">
                            <?php echo t('messages', 'loginerror'); ?>
                        </div>

                        <?php
                        }
                        ?>


                        <p class="card-text login-version">
                            <?php echo t('all', 'daloRADIUS') ?>
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>