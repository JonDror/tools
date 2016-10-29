<?php
    echo "<html><body>\n";

    /*
     *  include class and create object
     */
    include_once 'isbntest.class.php';
    $currISBN = new ISBNtest;


    /*
     *  input form
     */
	 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html lang='en'> 
<head> 
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'> 
<META name="description" content=""> 
<meta name="keywords" content=""> 
<title>Untitled</title> 
<!-- link rel='stylesheet' href='/include/style.css' type='text/css' --> 
<style type="text/css"> 
<!-- 
--> 
</style> 
</head> 
<body> 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
<fieldset> 
<legend>Add ISBNs in a seperate line</legend> 
<textarea name="test" cols="60" rows="10"></textarea><br> 
<input type="submit" value="Submit"> 
</fieldset> 
</form> 
<?php 
if(count($_POST)) 
{ 
   echo "<p>Cheking...</p>\n<ul>\n"; 
   $array = preg_split('/(\r?\n)+/', $_POST['test']); 
   foreach($array as $line) 
   { 
          /*
     *    did we get an ISBN?
     */
        $currISBN->set_isbn($line);
        if ($currISBN->valid_isbn10() === TRUE) {
            //echo "<p>The ISBN-10 " . $currISBN->get_isbn10() . " is <span style=\"color: green;\">valid</span>.</p>\n";
        } else {
            echo "<p>The ISBN-10 " . $currISBN->get_isbn10() . " is <span style=\"color: red;\">invalid</span>.</p>\n";
            echo "<p>The error reported is:<br /> " . $currISBN->get_error() . "</p>\n";
        }
        if ($currISBN->valid_isbn13() === TRUE) {
            //echo "<p>The ISBN-13 " . $currISBN->get_isbn13() . " is <span style=\"color: green;\">valid</span>.</p>\n";
        } else {
            echo "<p>The ISBN-13 " . $currISBN->get_isbn13() . " is <span style=\"color: red;\">invalid</span>.</p>\n";
            echo "<p>The error reported is:<br /> " . $currISBN->get_error() . "</p>\n";
        }
   } 
   echo "</ul>\n"; 
} 
?> 
</body> 
</html>
