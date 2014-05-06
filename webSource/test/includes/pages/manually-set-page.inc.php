<!doctype html>
<?php require_once(TEST_ROOT. 'includes/init-translate-script.inc.php'); 
      Translate::getInstance()->overridePageLanguage('en');
?>
<html lang="<?php lang() ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php t('common meta description') ?>">
    <meta name="author" content="BrainCrumbz">
	<link rel="shortcut icon" href="../../public/ico/favicon.ico">
	
    <title><?php t('manual-page title') ?></title>
	
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<!-- Custom styles for sticky footer template -->
    <link href="../../public/css/sticky-footer.css" rel="stylesheet">
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../../"><?php t('common test home') ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!--/ Fixed navbar -->

    <!-- Page main content -->
	<div class="container">
      <div class="page-header">
		<h1><?php t('manual-page header') ?></h1>
      </div>
      <p class="lead"><?php t('manual-page lead') ?></p>
      <p>
        <?php t('manual-page content') ?>
      </p>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted"><?php t('common footer') ?></p>
      </div>
    </div>
    <!--/ Page main content -->

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</body>
</html>