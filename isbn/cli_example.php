#!/usr/bin/php
<?php
    // basic usage check
    if ( ! isset ($argv[1]) )
    {
        echo "USAGE: " . $argv[0] . " {ISBN-10 or ISBN-13}\n";
    }
    /*
     *  include class and create object
     */
    include_once 'isbntest.class.php';
    $currISBN = new ISBNtest;

    /*
     *    did we get an ISBN?
     */
    if ($argv[1]) {
        if ( FALSE == $currISBN->set_isbn($argv[1]) )
        {
            echo "The error reported is:\n\t" . $currISBN->get_error() . "\n";
        }
        if ($currISBN->valid_isbn10($argv[1]) === TRUE) {
            echo "success\n";
            echo "The ISBN-10 " . $currISBN->get_isbn10() . " is valid.\n";
            echo "The ISBN-13 would be " . $currISBN->get_isbn13() . ".\n";
        } else {
            echo "failure\n";
            echo "The ISBN-10 (" . $currISBN->get_isbn10() . ") is invalid.\n";
            echo "The error reported is:\n\t" . $currISBN->get_error() . "\n";
        }
        /*
        if ($currISBN->valid_isbn13($argv[1]) === TRUE) {
            echo "The ISBN-13 " . $currISBN->get_isbn13() . " is valid.\n";
            echo "The ISBN-10 would be " . $currISBN->get_isbn10() . ".\n";
        } else {
            echo "The ISBN-13 (" . $currISBN->get_isbn13() . ") is invalid.\n";
            echo "The error reported is:\n\t" . $currISBN->get_error() . "\n";
        }
        */
    }

?>
