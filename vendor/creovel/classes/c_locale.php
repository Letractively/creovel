<?php
/**
 * Base Locale class for language and location functions.
 *
 * @package     Creovel
 * @subpackage  Core
 * @license     http://creovel.org/license MIT License
 * @since       Class available since Release 0.4.5
 * @author      Nesbert Hidalgo
 **/
class CLocale extends CObject
{
    /**
     * Returns an array of countries and states. Only US and Canada
     * states/provinces for now.
     *
     * @param boolean $more_states
     * @return array
     * @author Nesbert Hidalgo
     **/
    public static function countries_array($more_states = false)
    {
        if (!$more_states && isset($GLOBALS['CREOVEL']['COUNTRIES'])) {
            return $GLOBALS['CREOVEL']['COUNTRIES'];
        }
        
        if ($more_states) {
            $usa = array(
                'AL' => 'Alabama',
                'AK' => 'Alaska',
                'AR' => 'Arkansas',
                'AS' => 'American Samoa',
                'AZ' => 'Arizona',
                'CA' => 'California',
                'CO' => 'Colorado',
                'CT' => 'Connecticut',
                'DE' => 'Delaware',
                'DC' => 'District of Columbia',
                'FL' => 'Florida',
                'FM' => 'Micronesia',
                'GA' => 'Georgia',
                'GU' => 'Guam',
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
                'MH' => 'Marshall Islands',
                'MI' => 'Michigan',
                'MN' => 'Minnesota',
                'MO' => 'Missouri',
                'MP' => 'Marianas',
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
                'PW' => 'Palau',
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
                'AA' => 'Military Americas',
                'AE' => 'Military Europe/ME/Canada',
                'AP' => 'Military Pacific'
                );
        } else {
            $usa = array(
                'AL' => 'Alabama',
                'AK' => 'Alaska',
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
                'RI' => 'Rhode Island',
                'SC' => 'South Carolina',
                'SD' => 'South Dakota',
                'TN' => 'Tennessee',
                'TX' => 'Texas',
                'UT' => 'Utah',
                'VA' => 'Virginia',
                'VT' => 'Vermont',
                'WA' => 'Washington',
                'WI' => 'Wisconsin',
                'WV' => 'West Virginia',
                'WY' => 'Wyoming',
                );
        }

        $canada = array(
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
            );

        return $GLOBALS['CREOVEL']['COUNTRIES'] = array(
            'AF' => array('name' => 'Afghanistan'),
            'AL' => array('name' => 'Albania'),
            'DZ' => array('name' => 'Algeria'),
            'AS' => array('name' => 'American Samoa'),
            'AD' => array('name' => 'Andorra'),
            'AO' => array('name' => 'Angola'),
            'AI' => array('name' => 'Anguilla'),
            'AQ' => array('name' => 'Antarctica'),
            'AG' => array('name' => 'Antigua and Barbuda'),
            'AR' => array('name' => 'Argentina'),
            'AM' => array('name' => 'Armenia'),
            'AW' => array('name' => 'Aruba'),
            'AU' => array('name' => 'Australia'),
            'AT' => array('name' => 'Austria'),
            'AZ' => array('name' => 'Azerbaijan'),
            'BS' => array('name' => 'Bahamas'),
            'BH' => array('name' => 'Bahrain'),
            'BD' => array('name' => 'Bangladesh'),
            'BB' => array('name' => 'Barbados'),
            'BY' => array('name' => 'Belarus'),
            'BE' => array('name' => 'Belgium'),
            'BZ' => array('name' => 'Belize'),
            'BJ' => array('name' => 'Benin'),
            'BM' => array('name' => 'Bermuda'),
            'BT' => array('name' => 'Bhutan'),
            'BO' => array('name' => 'Bolivia'),
            'BA' => array('name' => 'Bosnia and Herzegovina'),
            'BW' => array('name' => 'Botswana'),
            'BV' => array('name' => 'Bouvet Island'),
            'BR' => array('name' => 'Brazil'),
            'IO' => array('name' => 'British Indian Ocean Territory'),
            'BN' => array('name' => 'Brunei Darussalam'),
            'BG' => array('name' => 'Bulgaria'),
            'BF' => array('name' => 'Burkina Faso'),
            'BI' => array('name' => 'Burundi'),
            'KH' => array('name' => 'Cambodia'),
            'CM' => array('name' => 'Cameroon'),
            'CA' => array('name' => 'Canada', 'states' => $canada),
            'CV' => array('name' => 'Cape Verde'),
            'KY' => array('name' => 'Cayman Islands'),
            'CF' => array('name' => 'Central African Republic'),
            'TD' => array('name' => 'Chad'),
            'CL' => array('name' => 'Chile'),
            'CN' => array('name' => 'China'),
            'CX' => array('name' => 'Christmas Island'),
            'CC' => array('name' => 'Cocos (Keeling) Islands'),
            'CO' => array('name' => 'Colombia'),
            'KM' => array('name' => 'Comoros'),
            'CG' => array('name' => 'Congo'),
            'CD' => array('name' => 'Congo, Democratic Republic of the'),
            'CK' => array('name' => 'Cook Islands'),
            'CR' => array('name' => 'Costa Rica'),
            'CI' => array('name' => "Cote d'Ivoire" ),
            'HR' => array('name' => 'Croatia'),
            'CU' => array('name' => 'Cuba'),
            'CY' => array('name' => 'Cyprus'),
            'CZ' => array('name' => 'Czech Republic'),
            'DK' => array('name' => 'Denmark'),
            'DJ' => array('name' => 'Djibouti'),
            'DM' => array('name' => 'Dominica'),
            'DO' => array('name' => 'Dominican Republic'),
            'TP' => array('name' => 'East Timor'),
            'EC' => array('name' => 'Ecuador'),
            'EG' => array('name' => 'Egypt'),
            'SV' => array('name' => 'El Salvador'),
            'GQ' => array('name' => 'Equatorial Guinea'),
            'ER' => array('name' => 'Eritrea'),
            'EE' => array('name' => 'Estonia'),
            'ET' => array('name' => 'Ethiopia'),
            'FK' => array('name' => 'Falkland Islands (Malvinas)'),
            'FO' => array('name' => 'Faroe Islands'),
            'FJ' => array('name' => 'Fiji'),
            'FI' => array('name' => 'Finland'),
            'FR' => array('name' => 'France'),
            'GF' => array('name' => 'French Guiana'),
            'PF' => array('name' => 'French Polynesia'),
            'TF' => array('name' => 'French Southern Territories'),
            'GA' => array('name' => 'Gabon'),
            'GM' => array('name' => 'Gambia'),
            'GE' => array('name' => 'Georgia'),
            'DE' => array('name' => 'Germany'),
            'GH' => array('name' => 'Ghana'),
            'GI' => array('name' => 'Gibraltar'),
            'GR' => array('name' => 'Greece'),
            'GL' => array('name' => 'Greenland'),
            'GD' => array('name' => 'Grenada'),
            'GP' => array('name' => 'Guadeloupe'),
            'GU' => array('name' => 'Guam'),
            'GT' => array('name' => 'Guatemala'),
            'GN' => array('name' => 'Guinea'),
            'GW' => array('name' => 'Guinea-Bissau'),
            'GY' => array('name' => 'Guyana'),
            'HT' => array('name' => 'Haiti'),
            'HM' => array('name' => 'Heard Island and McDonald Islands'),
            'VA' => array('name' => 'Holy See (Vatican City)'),
            'HN' => array('name' => 'Honduras'),
            'HK' => array('name' => 'Hong Kong'),
            'HU' => array('name' => 'Hungary'),
            'IS' => array('name' => 'Iceland'),
            'IN' => array('name' => 'India'),
            'ID' => array('name' => 'Indonesia'),
            'IR' => array('name' => 'Iran, Islamic Republic of'),
            'IQ' => array('name' => 'Iraq'),
            'IE' => array('name' => 'Ireland'),
            'IL' => array('name' => 'Israel'),
            'IT' => array('name' => 'Italy'),
            'JM' => array('name' => 'Jamaica'),
            'JP' => array('name' => 'Japan'),
            'JO' => array('name' => 'Jordan'),
            'KZ' => array('name' => 'Kazakstan'),
            'KE' => array('name' => 'Kenya'),
            'KI' => array('name' => 'Kiribati'),
            'KP' => array('name' => "Korea, Democratic People's Republic of" ),
            'KR' => array('name' => 'Korea, Republic of'),
            'KW' => array('name' => 'Kuwait'),
            'KG' => array('name' => 'Kyrgyzstan'),
            'LA' => array('name' => "Lao People's Democratic Republic" ),
            'LV' => array('name' => 'Latvia'),
            'LB' => array('name' => 'Lebanon'),
            'LS' => array('name' => 'Lesotho'),
            'LR' => array('name' => 'Liberia'),
            'LY' => array('name' => 'Libyan Arab Jamahiriya'),
            'LI' => array('name' => 'Liechtenstein'),
            'LT' => array('name' => 'Lithuania'),
            'LU' => array('name' => 'Luxembourg'),
            'MO' => array('name' => 'Macau'),
            'MK' => array('name' => 'Macedonia, The Former Yugoslav Republic of'),
            'MG' => array('name' => 'Madagascar'),
            'MW' => array('name' => 'Malawi'),
            'MY' => array('name' => 'Malaysia'),
            'MV' => array('name' => 'Maldives'),
            'ML' => array('name' => 'Mali'),
            'MT' => array('name' => 'Malta'),
            'MH' => array('name' => 'Marshall Islands'),
            'MQ' => array('name' => 'Martinique'),
            'MR' => array('name' => 'Mauritania'),
            'MU' => array('name' => 'Mauritius'),
            'YT' => array('name' => 'Mayotte'),
            'MX' => array('name' => 'Mexico'),
            'FM' => array('name' => 'Micronesia, Federated States of'),
            'MD' => array('name' => 'Moldova, Republic of'),
            'MC' => array('name' => 'Monaco'),
            'MN' => array('name' => 'Mongolia'),
            'MS' => array('name' => 'Montserrat'),
            'MA' => array('name' => 'Morocco'),
            'MZ' => array('name' => 'Mozambique'),
            'MM' => array('name' => 'Myanmar'),
            'NA' => array('name' => 'Namibia'),
            'NR' => array('name' => 'Nauru'),
            'NP' => array('name' => 'Nepal'),
            'NL' => array('name' => 'Netherlands'),
            'AN' => array('name' => 'Netherlands Antilles'),
            'NC' => array('name' => 'New Caledonia'),
            'NZ' => array('name' => 'New Zealand'),
            'NI' => array('name' => 'Nicaragua'),
            'NE' => array('name' => 'Niger'),
            'NG' => array('name' => 'Nigeria'),
            'NU' => array('name' => 'Niue'),
            'NF' => array('name' => 'Norfolk Island'),
            'MP' => array('name' => 'Northern Mariana Islands'),
            'NO' => array('name' => 'Norway'),
            'OM' => array('name' => 'Oman'),
            'PK' => array('name' => 'Pakistan'),
            'PW' => array('name' => 'Palau'),
            'PS' => array('name' => 'Palestinian Territory, Occupied'),
            'PA' => array('name' => 'PANAMA'),
            'PG' => array('name' => 'Papua New Guinea'),
            'PY' => array('name' => 'Paraguay'),
            'PE' => array('name' => 'Peru'),
            'PH' => array('name' => 'Philippines'),
            'PN' => array('name' => 'Pitcairn'),
            'PL' => array('name' => 'Poland'),
            'PT' => array('name' => 'Portugal'),
            'PR' => array('name' => 'Puerto Rico'),
            'QA' => array('name' => 'Qatar'),
            'RE' => array('name' => 'Reunion'),
            'RO' => array('name' => 'Romania'),
            'RU' => array('name' => 'Russian Federation'),
            'RW' => array('name' => 'Rwanda'),
            'SH' => array('name' => 'Saint Helena'),
            'KN' => array('name' => 'Saint Kitts and Nevis'),
            'LC' => array('name' => 'Saint Lucia'),
            'PM' => array('name' => 'Saint Pierre and Miquelon'),
            'VC' => array('name' => 'Saint Vincent and the Grenadines'),
            'WS' => array('name' => 'Samoa'),
            'SM' => array('name' => 'San Marino'),
            'ST' => array('name' => 'Sao Tome and Principe'),
            'SA' => array('name' => 'Saudi Arabia'),
            'SN' => array('name' => 'Senegal'),
            'SC' => array('name' => 'Seychelles'),
            'SL' => array('name' => 'Sierra Leone'),
            'SG' => array('name' => 'Singapore'),
            'SK' => array('name' => 'Slovakia'),
            'SI' => array('name' => 'Slovenia'),
            'SB' => array('name' => 'Solomon Islands'),
            'SO' => array('name' => 'Somalia'),
            'ZA' => array('name' => 'South Africa'),
            'GS' => array('name' => 'South Georgia and the South Sandwich Islands'),
            'ES' => array('name' => 'Spain'),
            'LK' => array('name' => 'Sri Lanka'),
            'SD' => array('name' => 'Sudan'),
            'SR' => array('name' => 'Suriname'),
            'SJ' => array('name' => 'Svalbard and Jan Mayen'),
            'SZ' => array('name' => 'Swaziland'),
            'SE' => array('name' => 'Sweden'),
            'CH' => array('name' => 'Switzerland'),
            'SY' => array('name' => 'Syrian Arab Republic'),
            'TW' => array('name' => 'Taiwan, Province of China'),
            'TJ' => array('name' => 'Tajikistan'),
            'TZ' => array('name' => 'Tanzania, United Republic of'),
            'TH' => array('name' => 'Thailand'),
            'TG' => array('name' => 'Togo'),
            'TK' => array('name' => 'Tokelau'),
            'TO' => array('name' => 'Tonga'),
            'TT' => array('name' => 'Trinidad and Tobago'),
            'TN' => array('name' => 'Tunisia'),
            'TR' => array('name' => 'Turkey'),
            'TM' => array('name' => 'Turkmenistan'),
            'TC' => array('name' => 'Turks and Caicos Islands'),
            'TV' => array('name' => 'Tuvalu'),
            'UG' => array('name' => 'Uganda'),
            'UA' => array('name' => 'Ukraine'),
            'AE' => array('name' => 'United Arab Emirates'),
            'GB' => array('name' => 'United Kingdom'),
            'US' => array('name' => 'United States', 'states' => $usa),
            'UM' => array('name' => 'United States Minor Outlying Islands'),
            'UY' => array('name' => 'Uruguay'),
            'UZ' => array('name' => 'Uzbekistan'),
            'VU' => array('name' => 'Vanuatu'),
            'VE' => array('name' => 'Venezuela'),
            'VN' => array('name' => 'Viet Nam'),
            'VG' => array('name' => 'Virgin Islands, British'),
            'VI' => array('name' => 'Virgin Islands, U.S.'),
            'WF' => array('name' => 'Wallis and Futuna'),
            'EH' => array('name' => 'Western Sahara'),
            'YE' => array('name' => 'Yemen'),
            'YU' => array('name' => 'Yugoslavia'),
            'ZM' => array('name' => 'Zambia'),
            'ZW' => array('name' => 'Zimbabwe')
            );
    }

    /**
     * Returns an array of countries.
     *
     * @param boolean $us_first
     * @param boolean $show_abbr
     * @return array
     * @author Nesbert Hidalgo
     **/
    public static function countries($us_first = false, $show_abbr = false)
    {
        if ($us_first) {
            $countries = array(
                'US' => 'United States',
                'CA' => 'Canada',
                'MX' => 'Mexico',
                '   ' => '-----------------'
            );
        }
        foreach (self::countries_array() as $k => $v) {
            $countries[$k] = ($show_abbr ? $k . ' - ' : '') . $v['name'];
        }
        return $countries;
    }

    /**
     * Returns an array of states/provinces.
     *
     * @param boolean $country Default is 'US'
     * @param boolean $show_abbr
     * @param boolean $more_states
     * @return array
     * @author Nesbert Hidalgo
     **/
    public static function states($country = 'US', $show_abbr = false, $more_states = false)
    {
        static $states;
        static $selected;
        if ($selected != $country
            || ($show_abbr != false || $more_states != false)) {
            $selected = $country;
            $states = array();
            $countries = self::countries_array($more_states);
            if (!empty($countries[$country]['states'])) {
                $states = $countries[$country]['states'];
                if ($show_abbr) {
                    foreach ($states as $k => $v) {
                        $states[$k] = $k . ' - ' . $v;
                    }
                } else {
                    if (!$more_states) asort($states);
                }
            }
        }
        return $states;
    }

    /**
     * Returns an array of timezone with GMT labels for keys and
     * timezone name as value.
     *
     * @return void
     * @author Nesbert Hidalgo
     **/
    public static function timezones()
    {
        if (isset($GLOBALS['CREOVEL']['TIMEZONES'])) {
            return $GLOBALS['CREOVEL']['TIMEZONES'];
        } else {
            return $GLOBALS['CREOVEL']['TIMEZONES'] = array(
                "US & Canada" => "US/Pacific",
                "-10:00 Hawaii" => "US/Hawaii",
                "-09:00 Alaska" => "US/Alaska",
                "-08:00 Pacific Time" => "US/Pacific",
                "-08:00 Pacific Time (Yukon)" =>"Canada/Yukon",
                "-07:00 Arizona" => "US/Arizona",
                "-07:00 Mountain Time" => "US/Mountain",
                "-06:00 Central Time" => "US/Central",
                "-06:00 Saskatchewan" => "Canada/Saskatchewan",
                "-06:00 Saskatchewan (East)" => "Canada/East-Saskatchewan",
                "-05:00 Eastern Time" => "US/Eastern",
                "-05:00 Eastern Time (Michigan)" => "US/Michigan",
                "-05:00 Indiana (East)" => "US/East-Indiana",
                "-05:00 Indiana (Starke)" => "US/Indiana-Starke",
                "-04:00 Atlantic Time (Canada)" => "Canada/Atlantic",
                "-03:30 Newfoundland" => "Canada/Newfoundland",
                "International" => "GMT",
                "-12:00 Eniwetok, Kwajalein" => "Pacific/Kwajalein",
                "-11:00 Midway Island, Samoa" => "US/Samoa",
                "-06:00 Central America" => "Etc/GMT-6",
                "-06:00 Mexico City" => "America/Mexico_City",
                "-05:00 Bogota, Lima, Quito" => "America/Bogota",
                "-04:00 Caracas, La Paz" => "America/Caracas",
                "-04:00 Santiago" => "America/Santiago",
                "-03:00 Brasilia" => "Brazil/West",
                "-03:00 Greenland" => "Etc/GMT-3",
                "-02:00 Mid-Atlantic" => "Etc/GMT-2",
                "-01:00 Azores" => "Atlantic/Azores",
                "-01:00 Cape Verde Is." => "Atlantic/Cape_Verde",
                "GMT Casablanca, Monrovia" => "Africa/Casablanca",
                "Greenwich Mean Time GMT: Dublin, Edinburgh, Lisbon, London" => "GMT",
                "+01:00 Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna" =>
                    "Etc/GMT+1",
                "+01:00 Belgrade, Bratislava, Budapest, Ljubljana, Prague" =>
                    "Etc/GMT+1",
                "+01:00 Brussels, Copenhagen, Madrid, Paris" => "Etc/GMT+1",
                "+01:00 Sarajevo, Skopje, Sofija, Vilnius, Warsaw, Zagreb" =>
                    "Etc/GMT+1",
                "+01:00 West Central Africa" => "Etc/GMT+1",
                "+02:00 Athens, Istanbul, Minsk" => "Etc/GMT+2",
                "+02:00 Bucharest" => "Etc/GMT+2",
                "+02:00 Cairo" => "Etc/GMT+2",
                "+02:00 Harare, Pretoria" => "Etc/GMT+2",
                "+02:00 Helsinki, Riga, Tallinn" => "Etc/GMT+2",
                "+02:00 Jerusalem" => "Etc/GMT+2",
                "+03:00 Baghdad" => "Etc/GMT+3",
                "+03:00 Kuwait, Riyadh" => "Etc/GMT+3",
                "+03:00 Moscow, St. Petersburg, Volgograd" => "Etc/GMT+3",
                "+03:00 Nairobi"=> "Etc/GMT+3",
                "+03:30 Tehran" => "Etc/GMT+3",
                "+04:00 Abu Dhabi, Muscat" => "Etc/GMT+4",
                "+04:00 Baku, bilisi, erevan" => "Etc/GMT+4",
                "+04:30 Kabul" => "Asia/Kabul",
                "+05:00 Ekaterinburg" => "Etc/GMT+5",
                "+05:00Islamabad, Karachi, Tashkent" => "Etc/GMT+5",
                "+05:30 Calcutta, Chennai, Mumbai, New Delhi" =>
                    "Asia/Calcutta",
                "+05:45 Kathmandu" => "Asia/Katmandu",
                "+06:00 Almatay, Novosibirsk" => "Etc/GMT+6",
                "+06:00 Astana, Dhaki" => "Etc/GMT+6",
                "+06:00 Sri Jayawardenepura" => "Etc/GMT+6",
                "+06:30 Rangoon" => "Asia/Rangoon",
                "+07:00 Bangkok, Hanoi, Jakarta" => "Etc/GMT+7",
                "+07:00 Krasnoyarsk" => "Etc/GMT+7",
                "+08:00Beijing, Chongqing, Hong Kong, Urumqi" => "Etc/GMT+8",
                "+08:00 Irkutsk, Ulaan Bataar" => "Etc/GMT+8",
                "+08:00 Kuala Lumpur, Singapore" => "Etc/GMT+8",
                "+08:00 Perth" => "Etc/GMT+8",
                "+08:00Taipei" => "Etc/GMT+8",
                "+09:00 Osaka, Sapporo, Tokyo" => "Etc/GMT+9",
                "+09:00 Seoul" => "Etc/GMT+9",
                "+09:00 Yakutsk" => "Etc/GMT+9",
                "+09:30 Adelaide" => "Etc/GMT+9",
                "+09:30 Darwin" => "Australia/Darwin",
                "+10:00 Brisbane" => "Etc/GMT+10",
                "+10:00 Canberra, Melbourne, Sydney" => "Etc/GMT+10",
                "+10:00 Guam, Port Moresby" => "Etc/GMT+10",
                "+10:00 Hobart" => "Etc/GMT+10",
                "+10:00 Vladivostok" => "Etc/GMT+10",
                "+11:00 Magadan, Solomon Is., New Caledonia" => "Etc/GMT+11",
                "+12:00 Auckland, ellington" => "Etc/GMT+12",
                "+12:00 Fiji, Kamchatka, Marshall Is." => "Etc/GMT+12"
                );
        }
    }
} // END class CLocale extends CObject