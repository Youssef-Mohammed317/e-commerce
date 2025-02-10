<!DOCTYPE html>
<html lang="en" class="dark:bg-gray-900">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elzero ECommerce</title>
  <script src="<?php echo $js?>/tailwind.js"></script>
  <script src="<?php echo $js?>/jquery.js"></script>
  <link rel="stylesheet" href="<?php echo $css?>/style.css">
  <style>
    [data-toolTip]{
      position: relative;
      z-index: 0;
      &::after{
        /* user-select:none; */

        content: attr(data-toolTip);
        background: #080707;
        color: #fff;
        font-size: 15px;
        padding: 3px 5px;
        border-radius: 5px;
        z-index: -100;
        position: absolute;
        top: -25px;
        left: 50%;
        transform: translateX(-50%);
        opacity: 0;
        transition: 0.3s;
        transition-delay: 0.1s;
      }
      &:hover::after{
        opacity: 0.6;
        z-index: 100;
      }}
  </style>
</head>
<body class="">

