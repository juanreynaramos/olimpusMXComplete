<?php 
    function getPaisesArray(){
        $a = [
            'MEX' => 'México',
            'CAN' => 'Canadá',
            'USA' => 'Estados Unidos (USA)',
            'ARG' => 'Argentina',
            'CHN' => 'China',
            'DEU' => 'Alemania',
            'ESP' => 'España',
            'GBR' => 'Reino Unido',
            'AFG' => 'Afganistán',
            'ALA' => 'Islas de Åland',
            'ALB' => 'Albania',
            'DZA' => 'Argelia',
            'ASM' => 'Samoa Americana',
            'AND' => 'Andorra',
            'AGO' => 'Angola',
            'AIA' => 'Anguila',
            'ATA' => 'Antártida',
            'ATG' => 'Antigua y Barbuda',
            'ARM' => 'Armenia',
            'ABW' => 'Aruba',
            'AUS' => 'Australia',
            'AUT' => 'Austria',
            'AZE' => 'Azerbaiyán',
            'BHS' => 'Bahamas',
            'BHR' => 'Baréin',
            'BGD' => 'Bangladesh',
            'BRB' => 'Barbados',
            'BLR' => 'Bielorrusia',
            'BEL' => 'Bélgica',
            'BLZ' => 'Belice',
            'BEN' => 'Benín',
            'BMU' => 'Bermuda',
            'BTN' => 'Bután',
            'BOL' => 'Bolivia',
            'BES' => 'Bonaire, San Eustaquio y Saba',
            'BIH' => 'Bosnia y Herzegovina',
            'BWA' => 'Botsuana',
            'BVT' => 'Isla Bouvet',
            'BRA' => 'Brasil',
            'IOT' => 'Territorio Británico del Océano Índico',
            'VGB' => 'Islas Vírgenes Británicas',
            'BRN' => 'Brunei',
            'BGR' => 'Bulgaria',
            'BFA' => 'Burkina Faso',
            'BDI' => 'Burundi',
            'KHM' => 'Camboya',
            'CMR' => 'Camerún',
            'CPV' => 'Cabo Verde',
            'CYM' => 'Islas Caimán',
            'CAF' => 'República de África Central',
            'TCD' => 'Chad',
            'CHL' => 'Chile',
            'CHN' => 'China',
            'CXR' => 'Isla de Pascua',
            'CCK' => 'Islas Cocos',
            'COL' => 'Colombia',
            'COM' => 'Comoras',
            'COK' => 'Islas Cook',
            'CRI' => 'Costa Rica',
            'HRV' => 'Croacia',
            'CUB' => 'Cuba',
            'CUW' => 'Curazao',
            'CYP' => 'Chipre',
            'CZE' => 'República Checa',
            'COD' => 'República Democrática del Congo',
            'DNK' => 'Dinamarca',
            'DJI' => 'Yibuti',
            'DMA' => 'Dominica',
            'DOM' => 'República Dominicana',
            'TLS' => 'Timor Oriental',
            'ECU' => 'Ecuador',
            'EGY' => 'Egipto',
            'SLV' => 'El Salvador',
            'GNQ' => 'Guinea Ecuatorial',
            'ERI' => 'Eritrea',
            'EST' => 'Estonia',
            'ETH' => 'Etiopía',
            'FLK' => 'Islas Malvinas',
            'FRO' => 'Islas Faroe',
            'FJI' => 'Fiji',
            'FIN' => 'Finlandia',
            'FRA' => 'Francia',
            'GUF' => 'Guayana Francesa',
            'PYF' => 'Polinesia Francesa',
            'ATF' => 'Territorios del sur Franceses',
            'GAB' => 'Gabón',
            'GMB' => 'Gambia',
            'GEO' => 'Georgia',
            'DEU' => 'Alemania',
            'GHA' => 'Ghana',
            'GIB' => 'Gibraltar',
            'GRC' => 'Grecia',
            'GRL' => 'Groenlandia',
            'GRD' => 'Granada',
            'GLP' => 'Guadalupe',
            'GUM' => 'Guam',
            'GTM' => 'Guatemala',
            'GGY' => 'Guernsey',
            'GIN' => 'Guinea',
            'GNB' => 'Guinea Bissau',
            'GUY' => 'Guyana',
            'HTI' => 'Haití',
            'HMD' => 'Islas Heard y McDonald',
            'HND' => 'Honduras',
            'HKG' => 'Hong Kong',
            'HUN' => 'Hungría',
            'ISL' => 'Islandia',
            'IND' => 'India',
            'IDN' => 'Indonesia',
            'IRN' => 'Irán',
            'IRQ' => 'Irak',
            'IRL' => 'Irlanda',
            'IMN' => 'Isla de Man',
            'ISR' => 'Israel',
            'ITA' => 'Italia',
            'CIV' => 'Costa de Marfil',
            'JAM' => 'Jamaica',
            'JPN' => 'Japón',
            'JEY' => 'Jersey',
            'JOR' => 'Jordania',
            'KAZ' => 'Kazajistán',
            'KEN' => 'Kenia',
            'KIR' => 'Kiribati',
            'XXK' => 'Kosovo',
            'KWT' => 'Kuwait',
            'KGZ' => 'Kirguistán',
            'LAO' => 'Laos',
            'LVA' => 'Letonia',
            'LBN' => 'Líbano',
            'LSO' => 'Lesoto',
            'LBR' => 'Liberia',
            'LBY' => 'Libia',
            'LIE' => 'Liechtenstein',
            'LTU' => 'Lituania',
            'LUX' => 'Luxemburgo',
            'MAC' => 'Macao',
            'MKD' => 'Macedonia',
            'MDG' => 'Madagascar',
            'MWI' => 'Malaui',
            'MYS' => 'Malasia',
            'MDV' => 'Maldivas',
            'MLI' => 'Malí',
            'MLT' => 'Malta',
            'MHL' => 'Islas Marshall',
            'MTQ' => 'Martinica',
            'MRT' => 'Mauritania',
            'MUS' => 'Mauricio',
            'MYT' => 'Mayotte',
            'FSM' => 'Micronesia',
            'MDA' => 'Moldavia',
            'MCO' => 'Mónaco',
            'MNG' => 'Mongolia',
            'MNE' => 'Montenegro',
            'MSR' => 'Montserrat',
            'MAR' => 'Marruecos',
            'MOZ' => 'Mozambique',
            'MMR' => 'Myanmar',
            'NAM' => 'Namibia',
            'NRU' => 'Nauru',
            'NPL' => 'Nepal',
            'NLD' => 'Países Bajos',
            'ANT' => 'Antillas Holandesas',
            'NCL' => 'Nueva Caledonia',
            'NZL' => 'Nueva Zelanda',
            'NIC' => 'Nicaragua',
            'NER' => 'Níger',
            'NGA' => 'Nigeria',
            'NIU' => 'Niue',
            'NFK' => 'Isla Norfolk',
            'PRK' => 'Corea del Norte',
            'MNP' => 'Islas Marianas del Norte',
            'NOR' => 'Noruega',
            'OMN' => 'Omán',
            'PAK' => 'Pakistán',
            'PLW' => 'Palaos',
            'PSE' => 'Territorios Palestinos',
            'PAN' => 'Panamá',
            'PNG' => 'Papúa Nueva Guinea',
            'PRY' => 'Paraguay',
            'PER' => 'Perú',
            'PHL' => 'Filipinas',
            'PCN' => 'Islas Pitcairn',
            'POL' => 'Polonia',
            'PRT' => 'Portugal',
            'PRI' => 'Puerto Rico',
            'QAT' => 'Catar',
            'COG' => 'República del Congo',
            'REU' => 'Reunión',
            'ROU' => 'Rumanía',
            'RUS' => 'Rusia',
            'RWA' => 'Ruanda',
            'BLM' => 'San Bartolomé',
            'SHN' => 'Santa Elena',
            'KNA' => 'San Cristóbal y Nieves',
            'LCA' => 'Santa Lucía',
            'MAF' => 'San Martín',
            'SPM' => 'San Pedro y Miguelón',
            'VCT' => 'San Vicente y las Granadinas',
            'WSM' => 'Samoa Occidental',
            'SMR' => 'San Marino',
            'STP' => 'Santo Tomé y Príncipe',
            'SAU' => 'Arabia Saudita',
            'SEN' => 'Senegal',
            'SRB' => 'Serbia',
            'SCG' => 'Serbia y Montenegro',
            'SYC' => 'Seychelles',
            'SLE' => 'Sierra Leona',
            'SGP' => 'Singapur',
            'SXM' => 'San Martín',
            'SVK' => 'Eslovaquia',
            'SVN' => 'Eslovenia',
            'SLB' => 'Islas Salomón',
            'SOM' => 'Somalia',
            'ZAF' => 'Sudáfrica',
            'SGS' => 'Islas Georgia del Sur y Sandwich del Sur',
            'KOR' => 'Corea del Sur',
            'SSD' => 'Sudán del Sur',
            'LKA' => 'Sri Lanka',
            'SDN' => 'Sudán',
            'SUR' => 'Surinam',
            'SJM' => 'Islas Svalbard y Jan Mayen',
            'SWZ' => 'Suazilandia',
            'SWE' => 'Suecia',
            'CHE' => 'Suiza',
            'SYR' => 'Siria',
            'TWN' => 'Taiwán',
            'TJK' => 'Tayikistán',
            'TZA' => 'Tanzania',
            'THA' => 'Tailandia',
            'TGO' => 'República Togolesa',
            'TKL' => 'Islas Tokelau',
            'TON' => 'Tonga',
            'TTO' => 'Trinidad y Tobago',
            'TUN' => 'Túnez',
            'TUR' => 'Turquía',
            'TKM' => 'Turkmenistán',
            'TCA' => 'Islas Turcos y Caicos',
            'TUV' => 'Tuvalu',
            'VIR' => 'Islas Vírgenes de los EE.UU.',
            'UGA' => 'Uganda',
            'UKR' => 'Ucrania',
            'ARE' => 'Emiratos Árabes Unidos',
            'UMI' => 'Islas menores alejadas de los Estados Unidos',
            'URY' => 'Uruguay',
            'UZB' => 'Uzbekistán',
            'VUT' => 'Vanuatu',
            'VAT' => 'Vaticano',
            'VEN' => 'Venezuela',
            'VNM' => 'Vietnam',
            'WLF' => 'Wallis y Futuna',
            'ESH' => 'Sahara Occidental',
            'YEM' => 'Yemen',
            'ZMB' => 'Zambia',
            'ZWE' => 'Zimbabue'
        ];
        return $a;
    }
    function getStatesArray(){
        $a = [
            '0' => 'Descuento',
            '1' => 'Nuevo',
            '2' => 'Oferta',
            '3' => 'Rebaja',
            '4' => 'Destacado',
            '5' => 'Ofertas especiales',
            '6' => 'Ofertas 2',
        ];
        return $a;
    }
?>
