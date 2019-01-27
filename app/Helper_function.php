<?php

use Carbon\Carbon;

function money($number)
{
	return "Rp. ".number_format( $number , 0, "," , "." );
}