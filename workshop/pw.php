<?php
 $password ="catbatrat";
 echo "$password"."<br/>";
 $password_encoded=md5($password);
 echo "$password_encoded"."<br/>";

 $password_encoded=hash("sha512", $password."1234asdf",false);
 echo "$password_encoded"."<br/>";

 print_r(hash_algos());
?>