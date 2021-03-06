<?php
/*
<!--
        @author: Sanjib Narzary
        @email: o-._.-o@live.com or alayaran@gmail.com
        @profession: M. Tech Student
        @colleges: NIT Silchar, B.Tech and NIT Calicut, M.Tech 2012
        @experienced: None
        @license: GNU/GPL
//-->
*/
$email = 'email@gmail.com';
$password = 'gf45_gdf#4hg';
 
// Create a 256 bit (64 characters) long random salt
// Let's add 'something random' and the username
// to the salt as well for added security
$salt = hash('sha256', uniqid(mt_rand(), true) . 'something random' . strtolower($email));
 
// Prefix the password with the salt
$hash = $salt . $password;
 
// Hash the salted password a bunch of times
for ( $i = 0; $i < 100000; $i ++ )
{
    $hash = hash('sha256', $hash);
}
 
// Prefix the hash with the salt so we can find it back later
$hash = $salt . $hash;

echo $hash;
 
/* Value:
 * e31f453ab964ec17e1e68faacbb64f05bccceb179858b4c482c1b182ff1e440e
 * f1e10feb5b86c6d367e4eb8f90f2cde5648a7db3df8526878f20a77eed00c703
 */
 
?>