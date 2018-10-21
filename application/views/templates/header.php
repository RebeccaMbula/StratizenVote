<!DOCTYPE html>
<html>
<head>
    <!-- requires $title, $pageLabel -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo resource_url("dependencies/bootstrap.min.css")?>">
  <link rel="stylesheet" href="<?php echo resource_url("css/header-style.css") ?>">
  <link rel="stylesheet" href="<?php echo resource_url("css/vote/style.css") ?>">
</head>
<body>
    <nav class="my-nav navbar navbar-expand-lg bg-light sticky-top" style="z-index: 10">
        <span class="navbar-brand col-2">StratizenVote</span>
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#theNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-light" id="theNavbar">
            <ul class="navbar-nav">
                <li class="nav-item  <?php echo $pageLabel === "vote" ? "active" : "" ?>">
                    <a class="nav-link" href="#">Vote</a>
                </li>
                <li class="nav-item <?php echo $pageLabel === "stats" ? "active" : "" ?>">
                    <a class="nav-link " href="#">Stats</a>
                </li>
            </ul>
        </div>
    </nav>