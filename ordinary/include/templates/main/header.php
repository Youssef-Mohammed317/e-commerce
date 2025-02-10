<!DOCTYPE html>
<html lang="en" class="dark:bg-gray-900">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elzero ECommerce</title>
  <script src="<?php echo $js?>/tailwind.js"></script>
  <script src="<?php echo $js?>/jquery.js"></script>

  <!-- <link rel="stylesheet" href="<?php echo $css?>/style.css"> -->
  <style>
    * {
      box-sizing: border-box;
    }
    /* profile dropdown */
    .profile-dropdown {
      .user-menu {
        opacity: 0;
        transform: scale(0.95);
        z-index: -50;
        transition: all 100ms ease-out;
      }
      .user-menu.show {
        transition: all 75ms ease-in;
        z-index: 50;
        opacity: 1;
        transform: scale(1);
      }
    }
    .card {
      position: relative;
      .show-profile{
        position: absolute;
        /* top: 20px; */
        /* right: 10px; */
        scale: 0;
        transition: .3s;
      }
      &:hover{
        .show-profile{
          scale: 1;
        }
      }
    }
    .not-approved-comment{
      position: relative;
      &::after{
        content: '*';
        position: absolute;
        color: red;
        top: 13px;
        right: -13px;
        font-size: 25px;
      }
    }
    .not-approved-card{
      position: relative;
      &::after{
        content: '*';
        position: absolute;
        color: red;
        top: 13px;
        left: 13px;
        font-size: 25px;
      }
    }
    [data-toolTip]{
      position: relative;
      &::after{
        user-select: none;
        content: attr(data-toolTip);
        background: #080707;
        color: #fff;
        z-index: -1;
        font-size: 12px;
        padding: 5px 8px;
        border-radius: 5px;
        position: absolute;
        top: -26px;
        left: -8px;
        opacity: 0;
        transition: 0.3s;
        transition-delay: 0.1s;
      }
      &:hover::after{
        opacity: 0.6;
      }
    }
    .search-parent{
      :first-child{
        border-radius: 0 10px 0 0 ;
      }
      :last-child{
        border-radius: 0 0 0 10px ;
      }
      :only-child{
        border-radius: 0 10px 0 10px;
      }
    }
  </style>
</head>
<body class="">

