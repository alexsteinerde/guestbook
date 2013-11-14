<?php
/**
 * This is a demo file.
 * 
* @author Alex Steiner
* @copyright Alex Steiner
* @package Guestbook
* @link http://alexsteiner.de
*/

require_once 'guestbook.class.php';

$guest = new guestbook;
$guest->write("Alex", "Text, Text");
echo $guest->read()[2]['time'];
?>