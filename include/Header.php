<?php
	session_start();
	include_once"include/Config.php";
	include("include/Query.php");
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">

    <html xmlns="http://ww.w3.org/1999/xhtml" lang="en" xml:lang="en">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link href="https://fonts.googleapis.com/css?family=Work+Sans: 30%"  />
            <link type="text/css" rel="stylesheet" href="style.css"/>

            <title>DCDR.sa</title>
        </head>

    <body>
      <div id="top"><h1>A small logo goes here</h1></div>
        <div id="main">

                    <nav>
                      <ul>
                        <li > <a href="#" >Home</a>  </li>
						<!-- Change to Job Listing once Ed is done with it-->
                        <li><a href="Job_Detail.php">Jobs</a></li>
                        <li><a href="Profile.php">Profile</a></li>
                        <li><a href="#">Message</a></li>
                        <li><a href="#">Notifications</a></li>';
							if (isset($_SESSION)){
								echo '<li><a href="Logout.php">Sign Out</a></li>';
							}
						echo '
                        <li><input type="text" placeholder="Search"></li>
                      </ul>
                    </nav>';
?>