

<?php
session_start();

if(isset($_SESSION['usr_id'])) {
  header("Location: index.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
  
  //name can contain only alpha characters and space
  if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
    $error = true;
    $name_error = "Name must contain only alphabets and space";
  }
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $email_error = "Please Enter Valid Email ID";
  }
  if(strlen($password) < 6) {
    $error = true;
    $password_error = "Password must be minimum of 6 characters";
  }
  if($password != $cpassword) {
    $error = true;
    $cpassword_error = "Password and Confirm Password doesn't match";
  }
  if (!$error) {
    if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
      $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
    } else {
      $errormsg = "Error in registering...Please try again later!";
    }
  }
}
?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Welcome to HOODways</title>

    <meta name="description" content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

    <link href="normaliz.css" rel="stylesheet" type="text/css" /><link href="al.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflareom/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="modernizr.js" type="text/javascript"></script>


    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png" />
    <style type="text/css">/* global */
/* line 14, /wrapper is the entire */
/*
http://www.freshdesignweb.com/beautiful-registration-form-with-html5-and-css3.html
*/

.form{
 width: 100%; padding: 20px;max-width: px;overflow: hidden;margin: 0px;  border-radius: 5px;
    background-color: #f2f2f2;
}
.form fieldset{border:0px; padding:0px; margin:0px;}
.form p.contact { font-size: 12px; margin:0px 0px 10px 0;line-height: 14px; font-family:Arial, Helvetica;}


.form input[type="text"] { max-width: px;width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; }
.form input[type="email"] {  max-width: 400px;width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; }
.form input[type="password"] {  max-width: 32%;width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; }
.form input.birthday{max-width:60px;width: 100%;}
.form input.birthyear{max-width: 120px;width: 100%;}
.form label { color: #000; font-weight:bold;font-size: 12px;font-family:Arial, Helvetica; }
.form label.month {max-width: 135px;width: 100%;}
.form input, textarea { background-color: rgba(255, 255, 255, 0.4); border: 1px solid rgba(122, 192, 0, 0.15);
 padding: 7px; font-family: Keffeesatz, Arial; color: #4b4b4b; font-size: 14px; -webkit-border-radius: 5px; margin-bottom: 15px; margin-top: -10px; }
.form input:focus, textarea:focus { border: 1px solid #ff5400; background-color: rgba(255, 255, 255, 1); }
.form .select-style {
  -webkit-appearance: button;
  -webkit-border-radius: 2px;
  -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
  -webkit-padding-end: 20px;
  -webkit-padding-start: 2px;
  -webkit-user-select: none;
  background-image: url(images/select-arrow.png), 
    -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
  background-position: center right;
  background-repeat: no-repeat;
  border: 0px solid #FFF;
  color: #555;
  font-size: inherit;
  margin: 0;
  overflow: hidden;
  padding-top: 5px;
  padding-bottom: 5px;
  text-overflow: ellipsis;
  white-space: nowrap;}
.form .gender {
  max-width: 410px;width: 100%;
  }
.form input.buttom{ background: #A41B1B; display: inline-block; padding: 5px 10px 6px; color: #fbf7f7; 
  text-decoration: none; font-weight: bold; line-height: 1; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px;
   -moz-box-shadow: 0 1px 3px #999; -webkit-box-shadow: 0 1px 3px #999; box-shadow: 0 1px 3px #999; text-shadow: 0 -1px 1px #222; border: none;
    position: relative; cursor: pointer; font-size: 14px; font-family:Verdana, Geneva, sans-serif;}
.form input.buttom:hover  { background-color: #2a78f6; }




   /*  
    ======================== 
    - Note: These styles are just to pretty the basic page up a bit.
    You should ignore these when copying and pasting into your site 
    because your stylesheet should take care of making it look pretty!
    ======================== 
    */
    body { padding:0px; font : 100%/1.4 'Helvetica Neue', arial, helvetica, helve, sans-serif; margin: 0px; 
 }
    h1 { font-size:2.2em; padding:0 0 .5em 0; }
    h2 { font-size:1.5em; }
    .header { padding:1em 0; }
    .col { background: ; padding:10px 0; text-align:;}


    /*  SECTIONS  ============================================================================= */

.section {
    clear: both;
    padding: 0px 10px 10px 10px;
    margin: 0px;
}

/*  GROUPING  ============================================================================= */


.group:before,
.group:after {
    content:"";
    display:table;
}
.group:after {
    clear:both;
}
.group {
    zoom:1; /* For IE 6/7 (trigger hasLayout) */
}

/*  GRID COLUMN SETUP   ==================================================================== */

.col {
    display: block;
    float:left;
    margin: 1% 0 1% 1%;
}

.col:first-child { margin-left: 0;margin-right: 5%; } /* all browsers except IE6 and lower */


/*  REMOVE MARGINS AS ALL GO FULL WIDTH AT 480 PIXELS */

@media only screen and (max-width: 480px) {
    .col { 
        margin: 1% 0 1% 0%;
    }
    .form input[type="password"] {  max-width:100% ;width: ;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; }
}








.span_2_of_2 {
  width: 100%;
}

.span_1_of_2 {
  width: 49.2%;background: #ccc;
}

.span_1_of_21 {
  width: 39.2%;
}

/*  GO FULL WIDTH AT LESS THAN 480 PIXELS */

@media only screen and (max-width: 480px) {
  .span_2_of_2 {
    width: 100%; 
  }
  .span_1_of_2 {
    width: 100%; 
  }

   .span_1_of_21 {
    width: 100%; 
  }
}














#wrapper {
  background: #fff;
  padding-bottom: 2em; }

/* line 22, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
.top-bar .name h1 a {
  font-size: 0.8em; }



/* line 53, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
h1 a[name], h2 a[name], h3 a[name], h4 a[name], h5 a[name], h6 a[name] {
  color: inherit;
  cursor: inherit;
  text-decoration: none; }

/* line 60, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
h3 + a img, h4 + a img {
  margin-bottom: 0.5em; }


  .row {
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 0;
  margin-bottom: 0;
  max-width: ;
  *zoom: 1; }


  /* line 165, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
  .row:before,.row:after{
    content: " ";
    display: table; }
  /* line 166, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
  .row:after{
    clear: both; }



.column,
.columns {
  position: relative;
  padding-left: 0.9375rem;
  padding-right: 0.9375rem;
  width: 100%;
  float: left; }



.hero {
  background: #efeee5;
  padding: 1em 0;
  margin-bottom: em;
  /* download bar */ }
  /* line 165, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
  .hero h1 {
    font-weight: bold;
    font-size: 3em;
    line-height: 1em;
    padding: 0.3em 0; }
    /* line 172, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
    .hero h1 span {
      font-weight: normal;
      font-size: 0.5em;
      display: block; }
    /* line 177, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
    .hero h1 img {
      height: 1em;
      margin-right: 0.3em;
      vertical-align: bottom; }
  /* line 188, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
  .hero h2 {
    font-size: 1.6em;
    font-weight: bold; }
  /* line 192, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
  .hero h3 {
    font-size: 1.4em; }
  /* line 196, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
  
/* line 277, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
body.shola .hero {
  padding: 1em 0; }
  /* line 280, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
  body.shola .hero h1 {
    text-align: center;
    border-top: 2px solid #ccc;
    border-bottom: 2px solid #ccc;
    margin-bottom: 0em; }


/* footer */
/* line 323, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
body > footer {
  color: #888;
  padding: 1em 0; }
  /* line 328, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
  body > footer ul.inline-list, body > footer p {
    margin-bottom: 0; }
  /* line 332, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
  body > footer a, body > footer p {
    font-size: 0.8em; }
    /* line 335, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
    body > footer a, body > footer a:hover, body > footer a:active, body > footer a:visited, body > footer p, body > footer p:hover, body > footer p:active, body > footer p:visited {
      color: inherit; }


/* team images */
/* line 529, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
body[class$="about"] dl dd img {
  border: 1px solid #eee;
  padding: 3px;
  margin: 0 0 0.5em 0.5em; }





*,
*:before,
*:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box; }

/* line 322, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
html,
body {
  font-size: 100%; }

/* line 325, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
body {
  background: #333333;
  color: #555555;
  padding: 0;
  margin: 0;
  font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
  font-weight: normal;
  font-style: normal;
  line-height: 1;
  position: relative;
  cursor: default; }

/* line 338, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
a:hover {
  cursor: pointer; }




.left {
  float: left !important; }

/* line 359, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
.right, body[class$="about"] dl dd img {
  float: right !important; }







/* line 190, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_grid.scss */

  /* line 165, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
  .row:before {
    content: " ";
    display: table; }
  /* line 166, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
  .row:after {
    clear: both; }
  
  
/* line 69, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_block-grid.scss */
[class*="block-grid-"] {
  display: block;
  padding: 0;
  margin: 0 -0.625rem;
  *zoom: 1; }
  /* line 165, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
  [class*="block-grid-"]:before, [class*="block-grid-"]:after {
    content: " ";
    display: table; }
  /* line 166, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
  [class*="block-grid-"]:after {
    clear: both; }
  /* line 35, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_block-grid.scss */
  [class*="block-grid-"] > li {
    display: inline;
    height: auto;
    float: left;
    padding: 0 0.625rem 1.25rem; }




/* Typography resets */
/* line 145, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
div,
dl,
dt,
dd,
ul,
ol,
li,
h1,
h2,
h3,
h4,
h5,
h6,
pre,
form,
p,
blockquote,
th,
td {
  margin: 0;
  padding: 0;
  direction: ltr; }

/* Default Link Styles */
/* line 152, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
a {
  color: #5e8949;
  text-decoration: none;
  line-height: inherit; }
  /* line 158, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
  a:hover, a:focus {
    color: #0079a1; }
  /* line 160, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
  a img {
    border: none; }

/* Default paragraph styles */
p {
  font-family: inherit;
  font-weight: normal;
  font-size: 1rem;
  line-height: 1.6;
  margin-bottom: 1.25rem;
  text-rendering: optimizeLegibility; }

 /* Default header styles */
/* line 182, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
h1, h2, h3, h4, h5, h6 {
  font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
  font-weight: 300;
  font-style: normal;
  color: #222222;
  text-rendering: optimizeLegibility;
  margin-top: 0.2rem;
  margin-bottom: 0.5rem;
  line-height: 1.4; }
  /* line 192, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
  h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
    font-size: 60%;
    color: #6f6f6f;
    line-height: 0; }

/* line 199, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
h1 {
  font-size: 2.125rem; }

/* line 200, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
h2 {
  font-size: 1.6875rem; }

/* line 201, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
h3 {
  font-size: 1.375rem; }

/* line 202, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
h4 {
  font-size: 1.125rem; }

/* line 203, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
h5 {
  font-size: 1.125rem; }

/* line 204, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
h6 {
  font-size: 1rem; }

/* line 208, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
hr {
  border: solid #dddddd;
  border-width: 1px 0 0;
  clear: both;
  margin: 1.25rem 0 1.1875rem;
  height: 0; }

/* Helpful Typography Defaults */
/* line 218, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
em,
i {
  font-style: italic;
  line-height: inherit; }



/* Lists */
/* line 243, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
ul,
ol,
dl {
  font-size: 1rem;
  line-height: 1.6;
  margin-bottom: 1.25rem;
  list-style-position: outside;
  font-family: inherit; }

/* line 251, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
ul {
  margin-left: 1.1rem; }
  /* line 253, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
  

/* Unordered Lists */
/* line 270, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
ul li ul,
ul li ol {
  margin-left: 1.25rem;
  margin-bottom: 0;
  font-size: 1rem;
  /* Override nested font-size change */ }


/* Ordered Lists */
/* line 289, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
ol {
  margin-left: 1.4rem; }
  /* line 293, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
  ol li ul,
  ol li ol {
    margin-left: 1.25rem;
    margin-bottom: 0; }

/* Definition Lists */
/* line 302, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
dl dt {
  margin-bottom: 0.3rem;
  font-weight: bold; }
/* line 306, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
dl dd {
  margin-bottom: 0.75rem; }

/* Abbreviations */
/* line 311, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */


@media only screen and (min-width: 40.063em) {
  /* line 379, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
  h1, h2, h3, h4, h5, h6 {
    line-height: 1.4; }

  /* line 380, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
  h1 {
    font-size: 2.75rem; }

  /* line 381, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
  h2 {
    font-size: 2.3125rem; }

  /* line 382, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
  h3 {
    font-size: 1.6875rem; }

  /* line 383, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_type.scss */
  h4 {
    font-size: 1.4375rem; } }


/* Wrapped around .top-bar to contain to grid width */
/* line 86, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
.contain-to-grid {
  width: 100%;
  background: #A41B1B; }
  /* line 90, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
  .contain-to-grid .top-bar {
    margin-bottom: 0; }


/* line 120, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
.top-bar {
  overflow: hidden;
  height: 60px;
  line-height: 60px;
  position: relative;
  background: #A41B1B;
  margin-bottom: 0; }
  /* line 129, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
  .top-bar ul {
    margin-bottom: 0;
    list-style: none; }
  /* line 134, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */

  .top-bar .title-area {
    position: relative;
    margin: 0; }
  /* line 157, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
  .top-bar .name {
    height: 60px;
    margin: 0;
    font-size: 16px; }
    /* line 162, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    .top-bar .name h1 {
      line-height: 60px;
      font-size:1.6rem;
      margin: 0; }
      /* line 166, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
      .top-bar .name h1 a {
        font-weight: normal;
        color: white;
        width: 50%;
        display: block;
        padding: 0 20px; }
  /* line 177, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
  .top-bar .toggle-topbar {
    position: absolute;
    right: 0;
    top: 0; }
    /* line 182, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    .top-bar .toggle-topbar a {
      color: white;
      text-transform: uppercase;
      font-size: 0.8125rem;
      font-weight: bold;
      position: relative;
      display: block;
      padding: 0 20px;
      height: 60px;
      line-height: 60px; }
    /* line 195, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    .top-bar .toggle-topbar.menu-icon {
      right: 20px;
      top: 50%;
      margin-top: -16px;
      padding-left: 40px; }
      /* line 201, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
      .top-bar .toggle-topbar.menu-icon a {
        text-indent: -48px;
        width: 34px;
        height: 34px;
        line-height: 33px;
        padding: 0;
        color: white; }
        /* line 209, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
        .top-bar .toggle-topbar.menu-icon a span {
          position: absolute;
          right: 0;
          display: block;
          width: 16px;
          height: 0;
          -webkit-box-shadow: 0 10px 0 1px white, 0 16px 0 1px white, 0 22px 0 1px white;
          box-shadow: 0 10px 0 1px white, 0 16px 0 1px white, 0 22px 0 1px white; }
  /* line 230, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
  
/* line 258, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
.top-bar-section {
  left: 0;
  position: relative;
  width: auto;
  -webkit-transition: left 300ms ease-out;
  -moz-transition: left 300ms ease-out;
  transition: left 300ms ease-out; }
  /* line 264, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
  .top-bar-section ul {
    width: 100%;
    height: auto;
    display: block;
    background: #333333;
    font-size: 16px;
    margin: 0; }
  /* line 274, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
 
  /* line 282, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
  .top-bar-section ul li > a {
    display: block;
    width: 100%;
    color: white;
    padding: 12px 0 12px 0;
    padding-left: 20px;
    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    font-size: 0.8125rem;
    font-weight: normal;
    background: #333333; }
    /* line 293, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    


@media only screen and (min-width: 40.063em) {
  /* line 412, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
  .top-bar {
    background: #A41B1B;
    *zoom: 1;
    overflow: visible; }
    /* line 165, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
    .top-bar:before, .top-bar:after {
      content: " ";
      display: table; }
    /* line 166, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_global.scss */
    .top-bar:after {
      clear: both; }
    /* line 417, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    .top-bar .toggle-topbar {
      display: none; }
    /* line 419, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    .top-bar .title-area {
      float: left; }
    /* line 420, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    .top-bar .name h1 a {
      width: auto; }
    /* line 423, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    

  /* line 432, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
  .contain-to-grid .top-bar {
    max-width: ;
    margin: ;
    margin-bottom: 0; }

  /* line 438, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
  .top-bar-section {
    -webkit-transition: none 0 0;
    -moz-transition: none 0 0;
    transition: none 0 0;
    left: 0 !important; }
    /* line 442, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    .top-bar-section ul {
      width: auto;
      height: auto !important;
      display: inline; }
      /* line 447, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
      .top-bar-section ul li {
        float: left; }
        /* line 449, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
        .top-bar-section ul li .js-generated {
          display: none; }
    
    /* line 460, THIS IS THE RIGHT NAV BAR   
     /home/bitrock/projects/apachefKriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    .top-bar-section li a:not(.button) {
      padding: 0 20px;
      line-height: 60px;
      background: #A41B1B; }
      /* line 464, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
      .top-bar-section li a:not(.button):hover {
        background: #1f3c52; }
    /* line 472, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    
    
      
    /* line 536, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_top-bar.scss */
    .top-bar-section > ul > .divider, .top-bar-section > ul > [role="separator"] {
      border-bottom: none;
      border-top: none;
      border-right: solid 1px #3678ab;
      clear: none;
      height: 60px;
      width: 0; }
    
nav.tab-bar {
  background: #333333;
  color: white;
  height: 2.8125rem;
  line-height: 2.8125rem;
  position: relative; }
  /* line 139, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_offcanvas.scss */
  nav.tab-bar h1, nav.tab-bar h2, nav.tab-bar h3, nav.tab-bar h4, nav.tab-bar h5, nav.tab-bar h6 {
    color: white;
    font-weight: bold;
    line-height: 2.8125rem;
    margin: 0; }
  /* line 145, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_offcanvas.scss */
  nav.tab-bar h1, nav.tab-bar h2, nav.tab-bar h3, nav.tab-bar h4 {
    font-size: 1.125rem; }


section.tab-bar-section {
  padding: 0 0.625rem;
  position: absolute;
  text-align: center;
  height: 2.8125rem;
  top: 0; }
  @media only screen and (min-width: 40.063em) {
    /* line 278, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_offcanvas.scss */
    section.tab-bar-section {
      text-align: left; } }
  /* line 182, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_offcanvas.scss */
 
  /* line 186, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_offcanvas.scss */
  section.tab-bar-section.right {
    left: 2.8125rem;
    right: 0; }
  /* line 190, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_offcanvas.scss */
 

/* line 282, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_offcanvas.scss */
a.menu-icon {
  text-indent: 2.1875rem;
  width: 2.8125rem;
  height: 2.8125rem;
  display: block;
  line-height: 2.0625rem;
  padding: 0;
  color: white;
  position: relative; }
  /* line 293, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_offcanvas.scss */
  a.menu-icon span {
    position: absolute;
    display: block;
    width: 1rem;
    height: 0;
    left: 0.8125rem;
    top: 0.3125rem;
    -webkit-box-shadow: 0 10px 0 1px white, 0 16px 0 1px white, 0 22px 0 1px white;
    box-shadow: 0 10px 0 1px white, 0 16px 0 1px white, 0 22px 0 1px white; }
  /* line 313, /home/bitrock/projects/apachefriends-web/bower_components/foundation/scss/foundation/components/_offcanvas.scss */
  a.menu-icon:hover span {
    -webkit-box-shadow: 0 10px 0 1px #b3b3b3, 0 16px 0 1px #b3b3b3, 0 22px 0 1px #b3b3b3;
    box-shadow: 0 10px 0 1px #b3b3b3, 0 16px 0 1px #b3b3b3, 0 22px 0 1px #b3b3b3; }


  

  /* line 755, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
 }
@media only screen and (min-width: 40.063em) {
  /* line 763, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
  .top-bar-section ul,
  .top-bar-section .dropdown li a,
  .top-bar-section .dropdown li a:not(.button):hover {
    background: #fff; }

  /* line 766, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
  .top-bar .name h1 a {
    font-size: 1em; }

  /* line 769, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */
  .hero h1 span {
    font-size: inherit;
    display: inline; } }
/* line 775, /home/bitrock/projects/apachefriends-web/source-xampp-windows/stylesheets/all.scss */

</style>


  </head>

  <body class="shola">


  
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=204041706711624";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="contain-to-grid">
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1><a href="/dashboard/shola.html"><strong>HOODways</strong></a></h1>
          </li>
          
          <li class="toggle-topbar menu-icon">
            <a href="#">
              <span>Menu</span>
            </a>
          </li>
        </ul>

        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <ul class="right">
              <li class=""><a href="/applications.html">Applications</a></li>
              <li class=""><a href="/dashboard/faq.html">FAQs</a></li>
              <li class=""><a href="/dashboard/howto.html">HOW-TO Guides</a></li>
              <li class=""><a target="_blank" href="/dashboard/phpinfo.php">Contac</a></li>
              <li class=""><a href="/phpmyadmin/">Contac</a></li>
               <li><a href="#news">News</a></li> <li><a href="#news">News</a></li> <li><a href="#news">News</a></li>
          </ul>
        </section>
      </nav>
    </div>

    <div id="wrapper">
      <div class="hero">
  <div class="row">
    <div class="large-12 columns">
      <h1><img src="/dashboard/images/xampp-logo.svg" />TEXT <span>TEXT + TEXT + TEXT + TEXT</span></h1>
    </div>
  </div>
</div>


<div class="row">
 <div class="section group">
          <div class="col span_1_of_2">
          1 of 1
          </div>
          <div class="col span_1_of_21">
       <div  class="form">
        <form id="contactform"  role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform"> 
          <p class="contact"><label for="name">Name</label></p> 
          <input id="name"  placeholder="First and last name" required=""  type="text" name="name"  required value="<?php if($error) echo $name; ?>"> 
            <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>

          <p class="contact"><label for="email">Email</label></p> 
          <input id="email" type="email"  name="email" placeholder="example@domain.com" required value="<?php if($error) echo $email; ?>"> 
          <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                
        <p class="contact"> <label for="password">password</label>
          <input id="password" type="password" name="password" placeholder="" required> 
          <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                <label for="repassword">Confirm password</label>
          <input id="repassword" type="password" name="cpassword" placeholder="" required></p> 
            <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
        
               <fieldset>
                 <label>Birthday</label>
                  <label class="month"> 
                  <select class="select-style" name="BirthMonth">
                  <option value="">Month</option>
                  <option  value="01">January</option>
                  <option value="02">February</option>
                  <option value="03" >March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12" >December</option>
                  </label>
                 </select>    
                <label>Day<input class="birthday" maxlength="2" name="BirthDay"  placeholder="Day" required=""></label>
                <label>Year <input class="birthyear" maxlength="4" name="BirthYear" placeholder="Year" required=""></label>
              </fieldset>
  
            <select class="select-style gender" name="gender">
            <option value="select">sex..</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="others">Other</option>
            </select><br><br>
            
            <p class="contact"><label for="phone">Mobile phone</label></p> 
            <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>
            <input class="buttom" name="signup" id="submit" value="Sign me up!" type="submit"  >  
       


  <div class="fb-comments" data-href="http://localhost/php login and registration kms/best.php" data-width="100%" data-numposts="5"></div>
</div>  
   </form> 

   <div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>  


    <div class="fb-like" data-href="http://localhost/php login and registration kms/best.php" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>


    <div class="fb-like" data-href="http://localhost/php login and registration kms/best.php" 
    data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>     
          </div>
        </div>

</div>

</div>




    <footer>
      <div class="row">
        <div class="large-12 columns">
          <div class="row">
            <div class="large-8 columns">
              <ul class="social">
  <li class="twitter"><a href="https://twitter.com/apachefriends">Follow us on Twitter</a></li>
  <li class="facebook"><a href="https://www.facebook.com/we.are.xampp">Like us on Facebook</a></li>
  <li class="google"><a href="https://plus.google.com/+xampp/posts">Add us to your G+ Circles</a></li>
</ul>

              <ul class="inline-list">
                <li><a href="l">Blog</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li>
<a target="_blank" href="/">                    FUN provided by
                    <img width="48" data-2x="/dashboard/images/fastly-logo@2x.png" src="/dashboard/images/fastly-logo.png" />
</a>                </li>
              </ul>
            </div>
            <div class="large-4 columns">
              <p class="text-right">Copyright (c) 2016, HOODways</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- JS Libraries -->
   <script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
  </body>
</html>



