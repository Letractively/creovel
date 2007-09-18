<?php
/*
	Script: general
	
	General top-level functions.
*/

/*
	Function: print_obj
	
	Prints human-readable information about a variable much prettier.
	
	Parameters:
	
		obj - The value to print out.
		kill - Die after printing.
*/
 
function print_obj($obj, $kill = false)
{
	echo '<pre class="print_obj" style="text-align: left;">'."\n";
	print_r($obj);
	echo "\n</pre>\n";
	if ( $kill ) die;
}

/*
	Function: escape_javascript
	
	Cleans up javascript.
	
	Parameters:
	
		javascript - string
		
	Returns:
	
		String.
*/

function escape_javascript($javascript)
{
	# return preg_replace('/\r\n|\n|\r/', "\\n",
	#       preg_replace_callback('/["\']/', create_function('$m', 'return "\\{$m}";'),
	#       (!is_null($javascript) ? $javascript : '')));
	
	$escape = array(
		"\r\n"	=> '\n',
		"\r"	=> '\n',
		"\n"	=> '\n',
		'"'		=> '\"',
		"'"		=> "\\'"
	);
	
	return str_replace(array_keys($escape), array_values($escape), $javascript);
}

/*
	Function: get_user_defined_constants
	
	Return user definde constats
	
	Returns:
	
		Array.
*/

function get_user_defined_constants()
{
 	$return = get_defined_constants(true);
	return $return['user'];
}
 
/*
	Function: get_filesize
	
	Returns a human readable size or a file or a size
	http://us2.php.net/manual/hk/function.filesize.php#64387
	
	Parameters:
	
		file_or_size - File path or size
	
	Returns:
	
		String.
*/

function get_filesize($file_or_size)
{
	$iec = array("B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB");	
	$size = is_numeric($file_or_size) ? $file_or_size : filesize($file_or_size);
	$i = 0;
	while ( ($size/1024) > 1 ) {
		$size = $size / 1024;
		$i++;
	}
	return substr($size, 0, strpos($size,'.') + 4).' '.$iec[$i];
}

/*
	Function: get_mime_type
	
	Get the mime type of a file (http://www.duke.edu/websrv/file-extensions.html).
	
	Parameters:
	
		file_name - File Name
	
	Returns:
	
		String.
*/ 

function get_mime_type($filename)
{
	$mime_types = array(
		'.ai' => 'application/postscript',
		'.aif' => 'audio/x-aiff',
		'.aifc' => 'audio/x-aiff',
		'.aiff' => 'audio/x-aiff',
		'.asc' => 'text/plain',
		'.au' => 'audio/basic',
		'.avi' => 'video/x-msvideo',
		'.bcpio' => 'application/x-bcpio',
		'.bin' => 'application/octet-stream',
		'.c' => 'text/plain',
		'.cc' => 'text/plain',
		'.ccad' => 'application/clariscad',
		'.cdf' => 'application/x-netcdf',
		'.class' => 'application/octet-stream',
		'.cpio' => 'application/x-cpio',
		'.cpt' => 'application/mac-compactpro',
		'.csh' => 'application/x-csh',
		'.css' => 'text/css',
		'.dcr' => 'application/x-director',
		'.dir' => 'application/x-director',
		'.dms' => 'application/octet-stream',
		'.doc' => 'application/msword',
		'.drw' => 'application/drafting',
		'.dvi' => 'application/x-dvi',
		'.dwg' => 'application/acad',
		'.dxf' => 'application/dxf',
		'.dxr' => 'application/x-director',
		'.eps' => 'application/postscript',
		'.etx' => 'text/x-setext',
		'.exe' => 'application/octet-stream',
		'.ez' => 'application/andrew-inset',
		'.f' => 'text/plain',
		'.f90' => 'text/plain',
		'.fli' => 'video/x-fli',
		'.gif' => 'image/gif',
		'.gtar' => 'application/x-gtar',
		'.gz' => 'application/x-gzip',
		'.h' => 'text/plain',
		'.hdf' => 'application/x-hdf',
		'.hh' => 'text/plain',
		'.hqx' => 'application/mac-binhex40',
		'.htm' => 'text/html',
		'.html' => 'text/html',
		'.ice' => 'x-conference/x-cooltalk',
		'.ief' => 'image/ief',
		'.iges' => 'model/iges',
		'.igs' => 'model/iges',
		'.ips' => 'application/x-ipscript',
		'.ipx' => 'application/x-ipix',
		'.jpe' => 'image/jpeg',
		'.jpeg' => 'image/jpeg',
		'.jpg' => 'image/jpeg',
		'.js' => 'application/x-javascript',
		'.kar' => 'audio/midi',
		'.latex' => 'application/x-latex',
		'.lha' => 'application/octet-stream',
		'.lsp' => 'application/x-lisp',
		'.lzh' => 'application/octet-stream',
		'.m' => 'text/plain',
		'.man' => 'application/x-troff-man',
		'.me' => 'application/x-troff-me',
		'.mesh' => 'model/mesh',
		'.mid' => 'audio/midi',
		'.midi' => 'audio/midi',
		'.mif' => 'application/vnd.mif',
		'.mime' => 'www/mime',
		'.mov' => 'video/quicktime',
		'.movie' => 'video/x-sgi-movie',
		'.mp2' => 'audio/mpeg',
		'.mp3' => 'audio/mpeg',
		'.mpe' => 'video/mpeg',
		'.mpeg' => 'video/mpeg',
		'.mpg' => 'video/mpeg',
		'.mpga' => 'audio/mpeg',
		'.ms' => 'application/x-troff-ms',
		'.msh' => 'model/mesh',
		'.nc' => 'application/x-netcdf',
		'.oda' => 'application/oda',
		'.pbm' => 'image/x-portable-bitmap',
		'.pdb' => 'chemical/x-pdb',
		'.pdf' => 'application/pdf',
		'.php' => 'text/html',
		'.pgm' => 'image/x-portable-graymap',
		'.pgn' => 'application/x-chess-pgn',
		'.png' => 'image/png',
		'.pnm' => 'image/x-portable-anymap',
		'.pot' => 'application/mspowerpoint',
		'.ppm' => 'image/x-portable-pixmap',
		'.pps' => 'application/mspowerpoint',
		'.ppt' => 'application/mspowerpoint',
		'.ppz' => 'application/mspowerpoint',
		'.pre' => 'application/x-freelance',
		'.prt' => 'application/pro_eng',
		'.ps' => 'application/postscript',
		'.qt' => 'video/quicktime',
		'.ra' => 'audio/x-realaudio',
		'.ram' => 'audio/x-pn-realaudio',
		'.ras' => 'image/cmu-raster',
		'.rgb' => 'image/x-rgb',
		'.rm' => 'audio/x-pn-realaudio',
		'.roff' => 'application/x-troff',
		'.rpm' => 'audio/x-pn-realaudio-plugin',
		'.rtf' => 'text/rtf',
		'.rtx' => 'text/richtext',
		'.scm' => 'application/x-lotusscreencam',
		'.set' => 'application/set',
		'.sgm' => 'text/sgml',
		'.sgml' => 'text/sgml',
		'.sh' => 'application/x-sh',
		'.shar' => 'application/x-shar',
		'.silo' => 'model/mesh',
		'.sit' => 'application/x-stuffit',
		'.skd' => 'application/x-koan',
		'.skm' => 'application/x-koan',
		'.skp' => 'application/x-koan',
		'.skt' => 'application/x-koan',
		'.smi' => 'application/smil',
		'.smil' => 'application/smil',
		'.snd' => 'audio/basic',
		'.sol' => 'application/solids',
		'.spl' => 'application/x-futuresplash',
		'.src' => 'application/x-wais-source',
		'.step' => 'application/STEP',
		'.stl' => 'application/SLA',
		'.stp' => 'application/STEP',
		'.sv4cpio' => 'application/x-sv4cpio',
		'.sv4crc' => 'application/x-sv4crc',
		'.swf' => 'application/x-shockwave-flash',
		'.t' => 'application/x-troff',
		'.tar' => 'application/x-tar',
		'.tcl' => 'application/x-tcl',
		'.tex' => 'application/x-tex',
		'.texi' => 'application/x-texinfo',
		'.texinfo' => 'application/x-texinfo',
		'.tif' => 'image/tiff',
		'.tiff' => 'image/tiff',
		'.tr' => 'application/x-troff',
		'.tsi' => 'audio/TSP-audio',
		'.tsp' => 'application/dsptype',
		'.tsv' => 'text/tab-separated-values',
		'.txt' => 'text/plain',
		'.unv' => 'application/i-deas',
		'.ustar' => 'application/x-ustar',
		'.vcd' => 'application/x-cdlink',
		'.vda' => 'application/vda',
		'.viv' => 'video/vnd.vivo',
		'.vivo' => 'video/vnd.vivo',
		'.vrml' => 'model/vrml',
		'.wav' => 'audio/x-wav',
		'.wrl' => 'model/vrml',
		'.xbm' => 'image/x-xbitmap',
		'.xlc' => 'application/vnd.ms-excel',
		'.xll' => 'application/vnd.ms-excel',
		'.xlm' => 'application/vnd.ms-excel',
		'.xls' => 'application/vnd.ms-excel',
		'.xlw' => 'application/vnd.ms-excel',
		'.xml' => 'text/xml',
		'.xpm' => 'image/x-xpixmap',
		'.xwd' => 'image/x-xwindowdump',
		'.xyz' => 'chemical/x-pdb',
		'.zip' => 'application/zip',
	);
	
	$filename = basename($filename);	
	$extension = pathinfo($filename, PATHINFO_EXTENSION);	
	return ( in_array('.'.$extension, array_keys($mime_types)) ? $mime_types['.'.$extension] : false );
}

/*
	Function: strip_slashes
	
	Deep cleans arrays, objects, and strings.
	
	Parameters:
	
		data - array, string or object
		
	Returns:
	
		Array, String or Object.
*/

function strip_slashes($data)
{
	
	switch ( true ) {
		
		// clean data array
		case ( is_array($data) ):
			$clean_values = array();
			foreach ($data as $name => $value) $clean_values[$name] = is_array($value) ? array_map('strip_slashes', $value) : stripslashes(trim($value));
		break;
		
		// get vars from object -> clean data -> update and return object
		case ( is_object($data) ):
			$clean_values = $this->strip_slashes(get_object_vars($data));
			foreach ($clean_values as $name => $value) $data->$name = is_array($value) ? array_map('strip_slashes', $value) : stripslashes(trim($value));
			$clean_values = $data;
		break;
		
		// clean data
		default:
			$clean_values = stripslashes(trim($data));
		break;
		
	}
	
	return $clean_values;
	
}

/*
	Function str_replace_array
	
	String replaces a string using array_key with array_val
	
	Parameters:
	
		string - string
		array - associative array
	
	Returns:
	
		String.
*/

function str_replace_array($str, $array)
{
	return str_replace(array_keys($array), array_values($array), $str);
}

/*
	Function: urlencode_array
	
	Performs urlencode on an N dimensional array
	
	Parameters:
	
		var - the array value
		var_name - variable name to be used in the query string
		seperator - what separating character to use in the query string
	
	Retruns:
	
		String.
*/

function urlencode_array($array)
{
	foreach ($array as $key => $value ) {
		if (is_array($value)) {
			$params .= http_build_query(array($key=>$value)) .'&';
		} else if ($key == '#') {
			$params	.= '#' . $value .'&';
		} else {
			$params	.= ( $key ? $key : '' ).( $key && ($value !== '') ? '='.$value : $value ).'&';
		}
	}
		
	return substr($params, 0, -1);
}

/*
	Function: countries_array
	
	Returns an array of countries. Only US and Canada for now.
	
	Retruns:
	
		Array. 
*/

function countries_array()
{
	if ( isset($_ENV['countries']) ) {
		return $_ENV['countries'];
	} else {
		return $_ENV['countries'] = array(
			'AF' => array( 'name' => 'Afghanistan' ),
			'AL' => array( 'name' => 'Albania' ),
			'DZ' => array( 'name' => 'Algeria' ),
			'AS' => array( 'name' => 'American Samoa' ),
			'AD' => array( 'name' => 'Andorra' ),
			'AO' => array( 'name' => 'Angola' ),
			'AI' => array( 'name' => 'Anguilla' ),
			'AQ' => array( 'name' => 'Antarctica' ),
			'AG' => array( 'name' => 'Antigua and Barbuda' ),
			'AR' => array( 'name' => 'Argentina' ),
			'AM' => array( 'name' => 'Armenia' ),
			'AW' => array( 'name' => 'Aruba' ),
			'AU' => array( 'name' => 'Australia' ),
			'AT' => array( 'name' => 'Austria' ),
			'AZ' => array( 'name' => 'Azerbaijan' ),
			'BS' => array( 'name' => 'Bahamas' ),
			'BH' => array( 'name' => 'Bahrain' ),
			'BD' => array( 'name' => 'Bangladesh' ),
			'BB' => array( 'name' => 'Barbados' ),
			'BY' => array( 'name' => 'Belarus' ),
			'BE' => array( 'name' => 'Belgium' ),
			'BZ' => array( 'name' => 'Belize' ),
			'BJ' => array( 'name' => 'Benin' ),
			'BM' => array( 'name' => 'Bermuda' ),
			'BT' => array( 'name' => 'Bhutan' ),
			'BO' => array( 'name' => 'Bolivia' ),
			'BA' => array( 'name' => 'Bosnia and Herzegovina' ),
			'BW' => array( 'name' => 'Botswana' ),
			'BV' => array( 'name' => 'Bouvet Island' ),
			'BR' => array( 'name' => 'Brazil' ),
			'IO' => array( 'name' => 'British Indian Ocean Territory' ),
			'BN' => array( 'name' => 'Brunei Darussalam' ),
			'BG' => array( 'name' => 'Bulgaria' ),
			'BF' => array( 'name' => 'Burkina Faso' ),
			'BI' => array( 'name' => 'Burundi' ),
			'KH' => array( 'name' => 'Cambodia' ),
			'CM' => array( 'name' => 'Cameroon' ),
			'CA' => array( 'name' => 'Canada', 'states' => array(
																'AB' => 'Alberta',
																'MB' => 'Manitoba',
																'AB' => 'Alberta',
																'BC' => 'British Columbia',
																'MB' => 'Manitoba',
																'NB' => 'New Brunswick',
																'NL' => 'Newfoundland and Labrador',
																'NS' => 'Nova Scotia',
																'NT' => 'Northwest Territories',
																'NU' => 'Nunavut',
																'ON' => 'Ontario',
																'PE' => 'Prince Edward Island',
																'QC' => 'Quebec',
																'SK' => 'Saskatchewan',
																'YT' => 'Yukon Territory',
															)
					),
			'CV' => array( 'name' => 'Cape Verde' ),
			'KY' => array( 'name' => 'Cayman Islands' ),
			'CF' => array( 'name' => 'Central African Republic' ),
			'TD' => array( 'name' => 'Chad' ),
			'CL' => array( 'name' => 'Chile' ),
			'CN' => array( 'name' => 'China' ),
			'CX' => array( 'name' => 'Christmas Island' ),
			'CC' => array( 'name' => 'Cocos (Keeling) Islands' ),
			'CO' => array( 'name' => 'Colombia' ),
			'KM' => array( 'name' => 'Comoros' ),
			'CG' => array( 'name' => 'Congo' ),
			'CD' => array( 'name' => 'Congo, Democratic Republic of the' ),
			'CK' => array( 'name' => 'Cook Islands' ),
			'CR' => array( 'name' => 'Costa Rica' ),
			'CI' => array( 'name' => "Cote d'Ivoire" ),
			'HR' => array( 'name' => 'Croatia' ),
			'CU' => array( 'name' => 'Cuba' ),
			'CY' => array( 'name' => 'Cyprus' ),
			'CZ' => array( 'name' => 'Czech Republic' ),
			'DK' => array( 'name' => 'Denmark' ),
			'DJ' => array( 'name' => 'Djibouti' ),
			'DM' => array( 'name' => 'Dominica' ),
			'DO' => array( 'name' => 'Dominican Republic' ),
			'TP' => array( 'name' => 'East Timor' ),
			'EC' => array( 'name' => 'Ecuador' ),
			'EG' => array( 'name' => 'Egypt' ),
			'SV' => array( 'name' => 'El Salvador' ),
			'GQ' => array( 'name' => 'Equatorial Guinea' ),
			'ER' => array( 'name' => 'Eritrea' ),
			'EE' => array( 'name' => 'Estonia' ),
			'ET' => array( 'name' => 'Ethiopia' ),
			'FK' => array( 'name' => 'Falkland Islands (Malvinas)' ),
			'FO' => array( 'name' => 'Faroe Islands' ),
			'FJ' => array( 'name' => 'Fiji' ),
			'FI' => array( 'name' => 'Finland' ),
			'FR' => array( 'name' => 'France' ),
			'GF' => array( 'name' => 'French Guiana' ),
			'PF' => array( 'name' => 'French Polynesia' ),
			'TF' => array( 'name' => 'French Southern Territories' ),
			'GA' => array( 'name' => 'Gabon' ),
			'GM' => array( 'name' => 'Gambia' ),
			'GE' => array( 'name' => 'Georgia' ),
			'DE' => array( 'name' => 'Germany' ),
			'GH' => array( 'name' => 'Ghana' ),
			'GI' => array( 'name' => 'Gibraltar' ),
			'GR' => array( 'name' => 'Greece' ),
			'GL' => array( 'name' => 'Greenland' ),
			'GD' => array( 'name' => 'Grenada' ),
			'GP' => array( 'name' => 'Guadeloupe' ),
			'GU' => array( 'name' => 'Guam' ),
			'GT' => array( 'name' => 'Guatemala' ),
			'GN' => array( 'name' => 'Guinea' ),
			'GW' => array( 'name' => 'Guinea-Bissau' ),
			'GY' => array( 'name' => 'Guyana' ),
			'HT' => array( 'name' => 'Haiti' ),
			'HM' => array( 'name' => 'Heard Island and McDonald Islands' ),
			'VA' => array( 'name' => 'Holy See (Vatican City)' ),
			'HN' => array( 'name' => 'Honduras' ),
			'HK' => array( 'name' => 'Hong Kong' ),
			'HU' => array( 'name' => 'Hungary' ),
			'IS' => array( 'name' => 'Iceland' ),
			'IN' => array( 'name' => 'India' ),
			'ID' => array( 'name' => 'Indonesia' ),
			'IR' => array( 'name' => 'Iran, Islamic Republic of' ),
			'IQ' => array( 'name' => 'Iraq' ),
			'IE' => array( 'name' => 'Ireland' ),
			'IL' => array( 'name' => 'Israel' ),
			'IT' => array( 'name' => 'Italy' ),
			'JM' => array( 'name' => 'Jamaica' ),
			'JP' => array( 'name' => 'Japan' ),
			'JO' => array( 'name' => 'Jordan' ),
			'KZ' => array( 'name' => 'Kazakstan' ),
			'KE' => array( 'name' => 'Kenya' ),
			'KI' => array( 'name' => 'Kiribati' ),
			'KP' => array( 'name' => "Korea, Democratic People's Republic of" ),
			'KR' => array( 'name' => 'Korea, Republic of' ),
			'KW' => array( 'name' => 'Kuwait' ),
			'KG' => array( 'name' => 'Kyrgyzstan' ),
			'LA' => array( 'name' => "Lao People's Democratic Republic" ),
			'LV' => array( 'name' => 'Latvia' ),
			'LB' => array( 'name' => 'Lebanon' ),
			'LS' => array( 'name' => 'Lesotho' ),
			'LR' => array( 'name' => 'Liberia' ),
			'LY' => array( 'name' => 'Libyan Arab Jamahiriya' ),
			'LI' => array( 'name' => 'Liechtenstein' ),
			'LT' => array( 'name' => 'Lithuania' ),
			'LU' => array( 'name' => 'Luxembourg' ),
			'MO' => array( 'name' => 'Macau' ),
			'MK' => array( 'name' => 'Macedonia, The Former Yugoslav Republic of' ),
			'MG' => array( 'name' => 'Madagascar' ),
			'MW' => array( 'name' => 'Malawi' ),
			'MY' => array( 'name' => 'Malaysia' ),
			'MV' => array( 'name' => 'Maldives' ),
			'ML' => array( 'name' => 'Mali' ),
			'MT' => array( 'name' => 'Malta' ),
			'MH' => array( 'name' => 'Marshall Islands' ),
			'MQ' => array( 'name' => 'Martinique' ),
			'MR' => array( 'name' => 'Mauritania' ),
			'MU' => array( 'name' => 'Mauritius' ),
			'YT' => array( 'name' => 'Mayotte' ),
			'MX' => array( 'name' => 'Mexico' ),
			'FM' => array( 'name' => 'Micronesia, Federated States of' ),
			'MD' => array( 'name' => 'Moldova, Republic of' ),
			'MC' => array( 'name' => 'Monaco' ),
			'MN' => array( 'name' => 'Mongolia' ),
			'MS' => array( 'name' => 'Montserrat' ),
			'MA' => array( 'name' => 'Morocco' ),
			'MZ' => array( 'name' => 'Mozambique' ),
			'MM' => array( 'name' => 'Myanmar' ),
			'NA' => array( 'name' => 'Namibia' ),
			'NR' => array( 'name' => 'Nauru' ),
			'NP' => array( 'name' => 'Nepal' ),
			'NL' => array( 'name' => 'Netherlands' ),
			'AN' => array( 'name' => 'Netherlands Antilles' ),
			'NC' => array( 'name' => 'New Caledonia' ),
			'NZ' => array( 'name' => 'New Zealand' ),
			'NI' => array( 'name' => 'Nicaragua' ),
			'NE' => array( 'name' => 'Niger' ),
			'NG' => array( 'name' => 'Nigeria' ),
			'NU' => array( 'name' => 'Niue' ),
			'NF' => array( 'name' => 'Norfolk Island' ),
			'MP' => array( 'name' => 'Northern Mariana Islands' ),
			'NO' => array( 'name' => 'Norway' ),
			'OM' => array( 'name' => 'Oman' ),
			'PK' => array( 'name' => 'Pakistan' ),
			'PW' => array( 'name' => 'Palau' ),
			'PS' => array( 'name' => 'Palestinian Territory, Occupied' ),
			'PA' => array( 'name' => 'PANAMA' ),
			'PG' => array( 'name' => 'Papua New Guinea' ),
			'PY' => array( 'name' => 'Paraguay' ),
			'PE' => array( 'name' => 'Peru' ),
			'PH' => array( 'name' => 'Philippines' ),
			'PN' => array( 'name' => 'Pitcairn' ),
			'PL' => array( 'name' => 'Poland' ),
			'PT' => array( 'name' => 'Portugal' ),
			'PR' => array( 'name' => 'Puerto Rico' ),
			'QA' => array( 'name' => 'Qatar' ),
			'RE' => array( 'name' => 'Reunion' ),
			'RO' => array( 'name' => 'R omania' ),
			'RU' => array( 'name' => 'Russian Federation' ),
			'RW' => array( 'name' => 'Rwanda' ),
			'SH' => array( 'name' => 'Saint Helena' ),
			'KN' => array( 'name' => 'Saint Kitts and Nevis' ),
			'LC' => array( 'name' => 'Saint Lucia' ),
			'PM' => array( 'name' => 'Saint Pierre and Miquelon' ),
			'VC' => array( 'name' => 'Saint Vincent and the Grenadines' ),
			'WS' => array( 'name' => 'Samoa' ),
			'SM' => array( 'name' => 'San Marino' ),
			'ST' => array( 'name' => 'Sao Tome and Principe' ),
			'SA' => array( 'name' => 'Saudi Arabia' ),
			'SN' => array( 'name' => 'Senegal' ),
			'SC' => array( 'name' => 'Seychelles' ),
			'SL' => array( 'name' => 'Sierra Leone' ),
			'SG' => array( 'name' => 'Singapore' ),
			'SK' => array( 'name' => 'Slovakia' ),
			'SI' => array( 'name' => 'Slovenia' ),
			'SB' => array( 'name' => 'Solomon Islands' ),
			'SO' => array( 'name' => 'Somalia' ),
			'ZA' => array( 'name' => 'South Africa' ),
			'GS' => array( 'name' => 'South Georgia and the South Sandwich Islands' ),
			'ES' => array( 'name' => 'Spain' ),
			'LK' => array( 'name' => 'Sri Lanka' ),
			'SD' => array( 'name' => 'Sudan' ),
			'SR' => array( 'name' => 'Suriname' ),
			'SJ' => array( 'name' => 'Svalbard and Jan Mayen' ),
			'SZ' => array( 'name' => 'Swaziland' ),
			'SE' => array( 'name' => 'Sweden' ),
			'CH' => array( 'name' => 'Switzerland' ),
			'SY' => array( 'name' => 'Syrian Arab Republic' ),
			'TW' => array( 'name' => 'Taiwan, Province of China' ),
			'TJ' => array( 'name' => 'Tajikistan' ),
			'TZ' => array( 'name' => 'Tanzania, United Republic of' ),
			'TH' => array( 'name' => 'Thailand' ),
			'TG' => array( 'name' => 'Togo' ),
			'TK' => array( 'name' => 'Tokelau' ),
			'TO' => array( 'name' => 'Tonga' ),
			'TT' => array( 'name' => 'Trinidad and Tobago' ),
			'TN' => array( 'name' => 'Tunisia' ),
			'TR' => array( 'name' => 'Turkey' ),
			'TM' => array( 'name' => 'Turkmenistan' ),
			'TC' => array( 'name' => 'Turks and Caicos Islands' ),
			'TV' => array( 'name' => 'Tuvalu' ),
			'UG' => array( 'name' => 'Uganda' ),
			'UA' => array( 'name' => 'Ukraine' ),
			'AE' => array( 'name' => 'United Arab Emirates' ),
			'GB' => array( 'name' => 'United Kingdom' ),
			'US' => array( 'name' => 'United States', 'states' => array(
																		'AK' => 'Alaska',
																		'AL' => 'Alabama',
																		'AR' => 'Arkansas',
																		'AZ' => 'Arizona',
																		'CA' => 'California',
																		'CO' => 'Colorado',
																		'CT' => 'Connecticut',
																		'DE' => 'Delaware',
																		'FL' => 'Florida',
																		'GA' => 'Georgia',
																		'HI' => 'Hawaii',
																		'IA' => 'Iowa',
																		'ID' => 'Idaho',
																		'IL' => 'Illinois',
																		'IN' => 'Indiana',
																		'KS' => 'Kansas',
																		'KY' => 'Kentucky',
																		'LA' => 'Louisiana',
																		'MA' => 'Massachusetts',
																		'MD' => 'Maryland',
																		'ME' => 'Maine',
																		'MI' => 'Michigan',
																		'MN' => 'Minnesota',
																		'MO' => 'Missouri',
																		'MS' => 'Mississippi',
																		'MT' => 'Montana',
																		'NC' => 'North Carolina',
																		'ND' => 'North Dakota',
																		'NE' => 'Nebraska',
																		'NH' => 'New Hampshire',
																		'NJ' => 'New Jersey',
																		'NM' => 'New Mexico',
																		'NV' => 'Nevada',
																		'NY' => 'New York',
																		'OH' => 'Ohio',
																		'OK' => 'Oklahoma',
																		'OR' => 'Oregon',
																		'PA' => 'Pennsylvania',
																		'PR' => 'Puerto Rico',
																		'RI' => 'Rhode Island',
																		'SC' => 'South Carolina',
																		'SD' => 'South Dakota',
																		'TN' => 'Tennessee',
																		'TX' => 'Texas',
																		'UT' => 'Utah',
																		'VA' => 'Virginia',
																		'VI' => 'Virgin Islands',
																		'VT' => 'Vermont',
																		'WA' => 'Washington',
																		'WI' => 'Wisconsin',
																		'WV' => 'West Virginia',
																		'WY' => 'Wyoming',
																	)
					),
			'UM' => array( 'name' => 'United States Minor Outlying Islands' ),
			'UY' => array( 'name' => 'Uruguay' ),
			'UZ' => array( 'name' => 'Uzbekistan' ),
			'VU' => array( 'name' => 'Vanuatu' ),
			'VE' => array( 'name' => 'Venezuela' ),
			'VN' => array( 'name' => 'Viet Nam' ),
			'VG' => array( 'name' => 'Virgin Islands, British' ),
			'VI' => array( 'name' => 'Virgin Islands, U.S.' ),
			'WF' => array( 'name' => 'Wallis and Futuna' ),
			'EH' => array( 'name' => 'Western Sahara' ),
			'YE' => array( 'name' => 'Yemen' ),
			'YU' => array( 'name' => 'Yugoslavia' ),
			'ZM' => array( 'name' => 'Zambia' ),
			'ZW' => array( 'name' => 'Zimbabwe' )		
		);
		
	}
}


/*
	Function: countries
	
	Assoc. array of countries.
	
	Parameters:
	
		us_first - Boolean default is false
		show_abbr - Boolean default is false
		
	Returns:
	
		Associative array.
*/

function countries($us_first = false, $show_abbr = false)
{
	if ($us_first) {
		$countries = array(
			'US' => 'United States',
			'CA' => 'Canada',
			'MX' => 'Mexico',
			' ' => '-----------------'
		);
	}

	foreach (countries_array() as $k => $v) $countries[$k] = ( $show_abbr ? $k . ' - ' : '' ) . $v['name'];
	return $countries;
}

/*
	Function: states
	
	Assoc. array of states.
	
	Parameters:
	
		country - Boolean default is 'US'
		show_abbr - Boolean default is false
		
	Returns:
	
		Associative array.
*/

function states($country = 'US', $show_abbr = false)
{
	$countries = countries_array();
	$states = $countries[$country]['states'];
	
	if ($show_abbr) {
		foreach ($states as $k => $v) $states[$k] = $k . ' - ' . $v;
	}
	
	return $states;
}

?>