<?php
defined('BASEPATH') OR exit('No direct script access allowed');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>404 Page Not Found</title>
    <script src="https://use.fontawesome.com/5d8239ef1b.js"></script>
    <style type="text/css">

        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #f3f0f0;
            margin: 0;
            padding: 0;
        }

        #container {
            text-align: center;
            position: absolute;
            width: 100%;
            top: 50%;
            margin-top: -18%;
            font-family: cursive;
            font-weight: bold;
            letter-spacing: 0.2em;
        }

        h1 {
            font-size: 200px;
            margin: 20px 0;
            /*color: #fe7902;*/
            color: #FFF;
            font-weight: 500;
        }

        h1 span {
            background: #dd3030;
            padding: 0 50px;
            border-radius: 2rem;
        }

        p {
            font-size: 35px;
            color: #dd3030;
            margin: 20px 0;
        }


    </style>
</head>
<body>
<div id="container">
    <div>
        <h1><span> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 404</span></h1>
        <p>Sorry - File not Found!</p>
        <p  class="text-center"><a href="/" class=" btn btn-success"> Go to Home </a></p>
    </div>
</div>
</body>
</html>