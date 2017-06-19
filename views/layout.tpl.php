<!DOCTYPE html>
<!--
Seminarmanager based on Doctrine
written by Sven Sonntag for CBW Collage Berufliche Weiterbildung
Dozent: Bishara Sabbagh
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seminarmanager - <?php echo $title; ?></title>
        <link href="css/jquery-ui.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<!-- Piwik -->
		<script type="text/javascript">
		  var _paq = _paq || [];
		  // tracker methods like "setCustomDimension" should be called before "trackPageView"
		  _paq.push(['trackPageView']);
		  _paq.push(['enableLinkTracking']);
		  (function() {
			var u="//stat.solution-developer.de/";
			_paq.push(['setTrackerUrl', u+'piwik.php']);
			_paq.push(['setSiteId', '2']);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
			g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
		  })();
		</script>
		<!-- End Piwik Code -->
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Seminarmanager</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php?action=courses">Seminarangebot</a></li>
                        <?php if (!isVerifiedUser()) { ?>
                        <li><a href="index.php?action=register">Registrieren</a></li>
                        <?php } ?>
                        <?php if (isVerifiedUser() && !isVerifiedAdmin()) { ?>
                        <li><a href="index.php?action=mybookings">Meine Seminare</a></li>
                        <?php } ?>
                        <?php if (isVerifiedAdmin()) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Verwaltung <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?action=viewCategories">Kategorien</a></li>
                                <li><a href="index.php?action=viewCourses">Seminare</a></li>
                                <li><a href="index.php?action=viewRooms">Räume</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?action=viewEvents">Seminartermine</a></li>
                                <li><a href="index.php?action=viewBookings">Buchungen</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?action=viewUsers">Benutzer</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (isVerifiedUser()) { ?><li><a href="index.php?action=logout">Abmelden (<?php echo $_SESSION['verifiedUserName']?>)<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li><?php } ?>
                        <?php if (!isVerifiedUser()) { ?><li><a href="index.php?action=login">Anmelden<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li><?php } ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title; ?></h3>
                </div>
                <div class="panel-body">
                    <?php if ($message) { ?>
                        <div class="alert alert-success">
                            <?php echo $message; ?>
                        </div>
                        <?php
                    }
                    if (isset($view)) {
                        # load view in dependency of the current action
                        require_once '_' . $view . '.tpl.php';
                    }
                    ?>
                </div>
                <div class="panel-footer">
                    <footer>
                        <p>Copyright &copy; 2017 Sven Sonntag - <a href="http://www.solution-developer.de" target="_blank">Solution Developer</a> || <a href="readme.php" target="_blank">Dokumentation</a></p>
                        <?php if (false) { ?>
                            <pre class="debug"><?php Doctrine\Common\Util\Debug::dump($_REQUEST); ?></pre>
                            <pre class="debug"><?php Doctrine\Common\Util\Debug::dump($_SESSION); ?></pre>
                        <?php } ?>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
