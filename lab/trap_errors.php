#!/usr/bin/php
<?php

/* TL;DR

just add this line to the end of your script:

set_error_handler( function( $err_n, $err_str, $err_file, $err_line ){ throw new ErrorException( $err_str, $err_n, $err_n, $err_file, $err_line ); } );

*/
/*

The idea is to prevent coding with the happy path style
Most php functions return certain value when an error ocurred
instead of the expected value

So for example file_get_contents return false if an error happened

The idea is how to modify the error handling to trap this conditions
without requirint to check for errors on each call to file_get_contents

Happy path code looks like this:

$data = file_get_contents('noexiste.txt');
echo "data:\n";
var_dump($data);

When running from CLI will print the warning but the issue is that
the code did validate nothing and does not expect anything could
go wrong and continue the flow

The not happy path code should have result validation like this:

$data = file_get_contents('noexiste.txt');
if ( $data === FALSE ){
	echo "ERROR reading file [noexiste.txt]\n";
	exit(1);
}
echo "data\n";
var_dump(data);

The problem now is the code shoul be plagged with error detection code
ugly some way.

*/

// does this breaks the normal flow on the E_WARNING?
// no, it does not
// so the only way could be probably throwing and exception to break normal flow
set_error_handler( function( $err_n, $err_str, $err_file, $err_line ){
	//echo "err_n: $err_n\n";
	//echo "err_str: $err_str\n";
	//echo "err_file: $err_file\n";
	//echo "err_line: $err_line\n";
	throw new ErrorException( $err_str, $err_n, $err_n, $err_file, $err_line );
} );

// this should print a warning and return false
$data = file_get_contents('noexiste.txt');
echo "data:\n";
var_dump($data);

// something that triggers a warning, will produce an error
// ideal for prevent junior programmers fail
echo "not declared var: $not_declared_var\n";

?>
