<?php
/**
 * Created by PhpStorm.
 * User: CTAC
 * Date: 08.02.2018
 * Time: 10:55
 */
namespace App\InsuranceAPI\Advant;

/**
 * Содержит массив со странами и их id для адванта
 */
class AdvantDirect
{
    private static $advantCountriesList = [
        'ABKHAZIA'=>'54494',
        'AFGHANISTAN'=>'54507',
        'ALBANIA'=>'54497',
        'ALGERIA'=>'54498',
        'AMERICAN SAMOA'=>'54499',
        'ANDORRA'=>'54502',
        'ANGOLA'=>'54501',
        'ANGUILLA'=>'54500',
        'ANTARCTICA'=>'54503',
        'ANTIGUA AND BARBUDA'=>'54504',
        'ARGENTINA'=>'54505',
        'ARMENIA'=>'54736',
        'ARUBA'=>'54506',
        'AUSTRALIA'=>'54495',
        'AUSTRIA'=>'54496',
        'AZERBAIJAN'=>'54735',
        'BAHAMAS'=>'54508',
        'BAHRAIN'=>'54511',
        'BANGLADESH'=>'54509',
        'BARBADOS'=>'54510',
        'BELORUSSIA'=>'54737',
        'BELGIUM'=>'54513',
        'BELIZE'=>'54512',
        'BENIN'=>'54514',
        'BERMUDA'=>'54515',
        'BHUTAN'=>'54526',
        'BOLIVIA, PLURINATIONAL STATE OF'=>'54517',
        'BONAIRE, SINT EUSTATIUS AND SABA'=>'54518',
        'BOSNIA AND HERZEGOVINA'=>'54519',
        'BOTSWANA'=>'54520',
        'BOUVET ISLAND'=>'54636',
        'BRAZIL'=>'54521',
        'BRITISH INDIAN OCEAN TERRITORY'=>'54522',
        'BRUNEI DARUSSALAM'=>'54523',
        'BULGARIA'=>'54516',
        'BURKINA FASO'=>'54524',
        'BURMA'=>'54622',
        'BURUNDI'=>'54525',
        'CAMBODIA'=>'54573',
        'CAMEROON'=>'54574',
        'CANADA'=>'54575',
        'CAPE VERDE'=>'54572',
        'CAYMAN ISLANDS'=>'54641',
        'CENTRAL AFRICAN REPUBLIC'=>'54713',
        'CHAD'=>'54714','CHILE'=>'54717',
        'CHINA'=>'54580',
        'CHRISTMAS ISLAND'=>'54639',
        'COCOS (KEELING) ISLANDS'=>'54581',
        'COLOMBIA'=>'54582',
        'COMOROS'=>'54583',
        'CONGO'=>'54584',
        'CONGO, DEMOCRATIC REPUBLIC OF\u00a0THE'=>'54585',
        'COOK ISLANDS'=>'54642',
        'COSTA RICA'=>'54588',
        'COTE DIVOIRE'=>'54589',
        'CROATIA'=>'54712',
        'CUBA'=>'54590',
        'CYPRUS'=>'54578',
        'DENMARK'=>'54552',
        'DJIBOUTI'=>'54554',
        'DOMINICA'=>'54555',
        'DOMINICAN REPUBLIC'=>'54556',
        'ECUADOR'=>'54722',
        'EGYPT'=>'54557',
        'EL SALVADOR'=>'54725',
        'EQUATORIAL GUINEA'=>'54723',
        'ERITREA'=>'54726',
        'ETHIOPIA'=>'54728',
        'FALKLAND ISLANDS (MALVINAS)'=>'54707',
        'FAROE ISLANDS'=>'54703',
        'FIJI'=>'54704',
        'FRENCH GUIANA'=>'54709',
        'FRENCH POLYNESIA'=>'54710',
        'FRENCH SOUTHERN TERRITORIES'=>'54711',
        'GABON'=>'54533',
        'GAMBIA'=>'54536',
        'GEORGIA'=>'54550',
        'GERMANY'=>'54542',
        'GHANA'=>'54537',
        'GIBRALTAR'=>'54544',
        'GREENLAND'=>'54548',
        'GRENADA'=>'54547',
        'GREECE'=>'54549',
        'GUADELOUPE'=>'54538',
        'GUAM'=>'54551',
        'GUATEMALA'=>'54539',
        'GUERNSEY'=>'54543',
        'GUINEA'=>'54540',
        'GUINEA-BISSAU'=>'54541',
        'GUYANA'=>'54535',
        'HAITI'=>'54534',
        'HEARD ISLAND AND MCDONALD ISLANDS'=>'54640',
        'HONDURAS'=>'54545',
        'HONG KONG'=>'54546',
        'HUNGARY'=>'54528',
        'INDIA'=>'54562',
        'INDONESIA'=>'54563',
        'IRAN, ISLAMIC REPUBLIC OF'=>'54566',
        'IRAQ'=>'54565',
        'IRELAND'=>'54567',
        'ICELAND'=>'54568',
        'SPAIN'=>'54569',
        'ITALY'=>'54570',
        'LATVIA'=>'54594',
        'LIECHTENSTEIN'=>'54599',
        'LITHUANIA'=>'54600',
        'LUXEMBOURG'=>'54601',
        'MALTA'=>'54612',
        'MONACO'=>'54619',
        'NETHERLAND'=>'54628',
        'NORWAY'=>'54633',
        'POLAND'=>'54653',
        'PORTUGAL'=>'54654',
        'SLOVAKIA'=>'54680',
        'SLOVENIA'=>'54681',
        'FINLAND'=>'54706',
        'FRANCE'=>'54708',
        'CZECH'=>'54716',
        'SWITZERLAND'=>'54718',
        'SWEDEN'=>'54719',
        'ESTONIA'=>'54727',
        'ISLE OF MAN'=>'54637',
        'ISRAEL'=>'54561',
        'JAMAICA'=>'54733',
        'JAPAN'=>'54734',
        'JERSEY'=>'54553',
        'JORDAN'=>'54564',
        'KAZAKHSTAN'=>'54738',
        'KENYA'=>'54577',
        'KIRIBATI'=>'54579',
        'KOREA, DEMOCRATIC PEOPLES REPUBLIC OF'=>'54586',
        'KOREA, REPUBLIC OF'=>'54587',
        'KUWAIT'=>'54591',
        'KYRGYZSTAN'=>'54739',
        'LAO PEOPLES DEMOCRATIC REPUBLIC'=>'54593',
        'LEBANON'=>'54596',
        'LESOTHO'=>'54595',
        'LIBERIA'=>'54598',
        'LIBYAN ARAB JAMAHIRIYA'=>'54597',
        'MACAO'=>'54606',
        'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF'=>'54656',
        'MADAGASCAR'=>'54604',
        'MALAWI'=>'54607',
        'MALAYSIA'=>'54608',
        'MALDIVES'=>'54611',
        'MALI'=>'54609',
        'MARSHALL ISLANDS'=>'54615',
        'MARTINIQUE'=>'54614',
        'MAURITANIA'=>'54603',
        'MAURITIUS'=>'54602',
        'MAYOTTE'=>'54605',
        'MEXICO'=>'54616',
        'MICRONESIA, FEDERATED STATES OF'=>'54617',
        'MOLDOVA'=>'54740',
        'MONGOLIA'=>'54620',
        'MONTENEGRO'=>'54715',
        'MONTSERRAT'=>'54621',
        'MOROCCO'=>'54613',
        'MOZAMBIQUE'=>'54618',
        'NAMIBIA'=>'54623',
        'NAURU'=>'54624',
        'NEPAL'=>'54625',
        'NEW CALEDONIA'=>'54632',
        'NEW ZEALAND'=>'54631',
        'NICARAGUA'=>'54629',
        'NIGER'=>'54626',
        'NIGERIA'=>'54627',
        'NIUE'=>'54630',
        'NORFOLK ISLAND'=>'54638',
        'NORTHERN MARIANA ISLANDS'=>'54667',
        'OMAN'=>'54635',
        'PAKISTAN'=>'54644',
        'PALAU'=>'54645',
        'PALESTINIAN TERRITORY, OCCUPIED'=>'54646',
        'PANAMA'=>'54647',
        'PAPUA NEW GUINEA'=>'54649',
        'PARAGUAY'=>'54650',
        'PERU'=>'54651',
        'PHILIPPINES'=>'54705',
        'PITCAIRN'=>'54652',
        'PUERTO RICO'=>'54655',
        'QATAR'=>'54576',
        'REUNION'=>'54657',
        'ROMANIA'=>'54660',
        'RUSSIA'=>'54658',
        'RWANDA'=>'54659',
        'SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA'=>'54666',
        'SAINT KITTS AND NEVIS'=>'54672',
        'SAINT LUCIA'=>'54673',
        'SAINT MARTIN (FRENCH PART)'=>'54669',
        'SAINT PIERRE AND MIQUELON'=>'54674',
        'SAINT VINCENT AND THE GRENADINES'=>'54671',
        'SAMOA'=>'54661',
        'SAN MARINO'=>'54662',
        'SAO TOME AND PRINCIPE'=>'54663',
        'SAUDI ARABIA'=>'54664',
        'SCHENGEN'=>'54727',
        'SENEGAL'=>'54670',
        'SERBIA'=>'54675',
        'SEYCHELLES'=>'54676',
        'SIERRA LEONE'=>'54688',
        'SINGAPORE'=>'54677',
        'SINT MAARTEN'=>'54678',
        'SOLOMON ISLANDS'=>'54684',
        'SOMALIA'=>'54685',
        'SOUTH AFRICA'=>'54729',
        'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'=>'54730',
        'SOUTH OSSETIA'=>'54731',
        'SOUTH SUDAN'=>'54732',
        'SRI LANKA'=>'54721',
        'SUDAN'=>'54686',
        'SURINAME'=>'54687',
        'SVALBARD AND JAN MAYEN'=>'54720',
        'SWAZILAND'=>'54665',
        'SYRIAN ARAB REPUBLIC'=>'54679',
        'TAIWAN, PROVINCE OF CHINA'=>'54690',
        'TAJIKISTAN'=>'54741',
        'TANZANIA, UNITED REPUBLIC OF'=>'54691',
        'THAILAND'=>'54689',
        'TIMOR-LESTE'=>'54692',
        'TOGO'=>'54693',
        'TOKELAU'=>'54694',
        'TONGA'=>'54695',
        'TRINIDAD AND TOBAGO'=>'54696',
        'TUNISIA'=>'54698',
        'TURKEY'=>'54699',
        'TURKMENISTAN'=>'54742',
        'TURKS AND CAICOS ISLANDS'=>'54643',
        'TUVALU'=>'54697','UGANDA'=>'54700',
        'UKRAINE'=>'54744',
        'UNITED ARAB EMIRATES'=>'54634',
        'UNITED KINGDOM'=>'54682',
        'UNITED STATES MINOR OUTLYING ISLANDS'=>'54610',
        'URUGUAY'=>'54702','USA'=>'54683',
        'UZBEKISTAN'=>'54743',
        'VANUATU'=>'54527',
        'VENEZUELA'=>'54529',
        'VIETNAM'=>'54532',
        'VIRGIN ISLANDS, BRITISH'=>'54530',
        'VIRGIN ISLANDS, U.S.'=>'54531',
        'WALLIS AND FUTUNA'=>'54701',
        'WESTERN SAHARA'=>'54559',
        'YEMEN'=>'54571',
        'ZAMBIA'=>'54558',
        'ZIMBABWE'=>'54560'
    ];

    private static $advantTerritoryList = [
        'ABKHAZIA' => '54489',
        'AFGHANISTAN' => '54489',
        'ALBANIA' => '54489',
        'ALGERIA' => '54489',
        'AMERICAN SAMOA' => '54489',
        'ANDORRA' => '54489',
        'ANGOLA' => '54489',
        'ANGUILLA' => '54489',
        'ANTARCTICA' => '54489',
        'ANTIGUA AND BARBUDA' => '54489',
        'ARGENTINA' => '54489',
        'ARMENIA' => '54492',
        'ARUBA' => '54489',
        'AUSTRALIA' => '54487',
        'AZERBAIJAN' => '54492',
        'BAHAMAS' => '54489',
        'BAHRAIN' => '54489',
        'BANGLADESH' => '54489',
        'BARBADOS' => '54489',
        'BELARUS' => '54492',
        'BELIZE' => '54489',
        'BENIN' => '54489',
        'BERMUDA' => '54489',
        'BHUTAN' => '54489',
        'BOLIVIA, PLURINATIONAL STATE OF' => '54489',
        'BONAIRE, SINT EUSTATIUS AND SABA' => '54489',
        'BOSNIA AND HERZEGOVINA' => '54489',
        'BOTSWANA' => '54489',
        'BOUVET ISLAND' => '54489',
        'BRAZIL' => '54489',
        'BRITISH INDIAN OCEAN TERRITORY' => '54489',
        'BRUNEI DARUSSALAM' => '54490',
        'BULGARIA' => '54486',
        'BURKINA FASO' => '54489',
        'BURMA' => '54490',
        'BURUNDI' => '54489',
        'CAMBODIA' => '54490',
        'CAMEROON' => '54489',
        'CANADA' => '54487',
        'CAPE VERDE' => '54489',
        'CAYMAN ISLANDS' => '54489',
        'CENTRAL AFRICAN REPUBLIC' => '54489',
        'CHAD' => '54489','CHILE' => '54489',
        'CHINA' => '54489',
        'CHRISTMAS ISLAND' => '54489',
        'COCOS (KEELING) ISLANDS' => '54489',
        'COLOMBIA' => '54489',
        'COMOROS' => '54489',
        'CONGO' => '54489',
        'COOK ISLANDS' => '54489',
        'COSTA RICA' => '54489',
        'COTE DIVOIRE' => '54489',
        'CROATIA' => '54489',
        'CUBA' => '54489',
        'CURA\u00e7AO' => '54489',
        'CYPRUS' => '54489',
        'DJIBOUTI' => '54489',
        'DOMINICA' => '54489',
        'DOMINICAN REPUBLIC' => '54489',
        'ECUADOR' => '54489',
        'EGYPT' => '54491',
        'EL SALVADOR' => '54489',
        'EQUATORIAL GUINEA' => '54489',
        'ERITREA' => '54489',
        'ETHIOPIA' => '54489',
        'FALKLAND ISLANDS (MALVINAS)' => '54489',
        'FAROE ISLANDS' => '54489',
        'FIJI' => '54489',
        'FRENCH GUIANA' => '54489',
        'FRENCH POLYNESIA' => '54489',
        'FRENCH SOUTHERN TERRITORIES' => '54489',
        'GABON' => '54489',
        'GAMBIA' => '54489',
        'GEORGIA' => '54489',
        'GHANA' => '54489',
        'GIBRALTAR' => '54489',
        'GREENLAND' => '54489',
        'GRENADA' => '54489',
        'GUADELOUPE' => '54489',
        'GUAM' => '54489',
        'GUATEMALA' => '54489',
        'GUERNSEY' => '54489',
        'GUINEA' => '54489',
        'GUINEA-BISSAU' => '54489',
        'GUYANA' => '54489',
        'HAITI' => '54489',
        'HEARD ISLAND AND MCDONALD ISLANDS' => '54489',
        'HONDURAS' => '54489',
        'HONG KONG' => '54489',
        'INDIA' => '54489',
        'INDONESIA' => '54490',
        'IRAN, ISLAMIC REPUBLIC OF' => '54489',
        'IRAQ' => '54489',
        'IRELAND' => '54489',
        'ISLE OF MAN' => '54489',
        'ISRAEL' => '54489',
        'JAMAICA' => '54489',
        'JAPAN' => '54487',
        'JERSEY' => '54489',
        'JORDAN' => '54489',
        'KAZAKHSTAN' => '54492',
        'KENYA' => '54489',
        'KIRIBATI' => '54489',
        'KOREA, DEMOCRATIC PEOPLES REPUBLIC OF' => '54489',
        'KOREA, REPUBLIC OF' => '54489',
        'KUWAIT' => '54489',
        'KYRGYZSTAN' => '54492',
        'LAO PEOPLES DEMOCRATIC REPUBLIC' => '54490',
        'LEBANON' => '54489',
        'LESOTHO' => '54489',
        'LIBERIA' => '54489',
        'LIBYAN ARAB JAMAHIRIYA' => '54489',
        'MACAO' => '54489',
        'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF' => '54489',
        'MADAGASCAR' => '54489',
        'MALAWI' => '54489',
        'MALAYSIA' => '54490',
        'MALDIVES' => '54489',
        'MALI' => '54489',
        'MARSHALL ISLANDS' => '54489',
        'MARTINIQUE' => '54489',
        'MAURITANIA' => '54489',
        'MAURITIUS' => '54489',
        'MAYOTTE' => '54489',
        'MEXICO' => '54489',
        'MICRONESIA, FEDERATED STATES OF' => '54489',
        'MOLDOVA' => '54492',
        'MONGOLIA' => '54489',
        'MONTENEGRO' => '54489',
        'MONTSERRAT' => '54489',
        'MOROCCO' => '54489',
        'MOZAMBIQUE' => '54489',
        'NAMIBIA' => '54489',
        'NAURU' => '54489',
        'NEPAL' => '54489',
        'NEW CALEDONIA' => '54489',
        'NEW ZEALAND' => '54487',
        'NICARAGUA' => '54489',
        'NIGER' => '54489',
        'NIGERIA' => '54489',
        'NIUE' => '54489',
        'NORFOLK ISLAND' => '54489',
        'NORTHERN MARIANA ISLANDS' => '54489',
        'OMAN' => '54489',
        'PAKISTAN' => '54489',
        'PALAU' => '54489',
        'PALESTINIAN TERRITORY, OCCUPIED' => '54489',
        'PANAMA' => '54489',
        'PAPUA NEW GUINEA' => '54489',
        'PARAGUAY' => '54489',
        'PERU' => '54489',
        'PHILIPPINES' => '54490',
        'PITCAIRN' => '54489',
        'PUERTO RICO' => '54489',
        'QATAR' => '54489',
        'REUNION' => '54489',
        'ROMANIA' => '54489',
        'RUSSIA' => '54493',
        'RWANDA' => '54489',
        'SAINT BARTH\u00e9LEMY' => '54489',
        'SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA' => '54489',
        'SAINT KITTS AND NEVIS' => '54489',
        'SAINT LUCIA' => '54489',
        'SAINT MARTIN (FRENCH PART)' => '54489',
        'SAINT PIERRE AND MIQUELON' => '54489',
        'SAINT VINCENT AND THE GRENADINES' => '54489',
        'SAMOA' => '54489','SAN MARINO' => '54489',
        'SAO TOME AND PRINCIPE' => '54489',
        'SAUDI ARABIA' => '54489',
        'SCHENGEN' => '54488',
        'SENEGAL' => '54489',
        'SERBIA' => '54489',
        'SEYCHELLES' => '54489',
        'SIERRA LEONE' => '54489',
        'SINGAPORE' => '54490',
        'SINT MAARTEN' => '54489',
        'SOLOMON ISLANDS' => '54489',
        'SOMALIA' => '54489',
        'SOUTH AFRICA' => '54489',
        'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS' => '54489',
        'SOUTH OSSETIA' => '54489',
        'SOUTH SUDAN' => '54489',
        'SRI LANKA' => '54489',
        'SUDAN' => '54489',
        'SURINAME' => '54489',
        'SVALBARD AND JAN MAYEN' => '54489',
        'SWAZILAND' => '54489',
        'SYRIAN ARAB REPUBLIC' => '54489',
        'TAIWAN, PROVINCE OF CHINA' => '54489',
        'TAJIKISTAN' => '54492',
        'TANZANIA, UNITED REPUBLIC OF' => '54489',
        'THAILAND' => '54490',
        'TIMOR-LESTE' => '54490',
        'TOGO' => '54489',
        'TOKELAU' => '54489',
        'TONGA' => '54489',
        'TRINIDAD AND TOBAGO' => '54489',
        'TUNISIA' => '54491',
        'TURKEY' => '54491',
        'TURKMENISTAN' => '54492',
        'TURKS AND CAICOS ISLANDS' => '54489',
        'TUVALU' => '54489',
        'UGANDA' => '54489',
        'UKRAINE' => '54492',
        'UNITED ARAB EMIRATES' => '54491',
        'UNITED KINGDOM' => '54489',
        'UNITED STATES MINOR OUTLYING ISLANDS' => '54489',
        'URUGUAY' => '54489','USA' => '54487',
        'UZBEKISTAN' => '54492',
        'VANUATU' => '54489',
        'VENEZUELA' => '54489',
        'VIETNAM' => '54490',
        'VIRGIN ISLANDS, BRITISH' => '54489',
        'VIRGIN ISLANDS, U.S.' => '54489',
        'WALLIS AND FUTUNA' => '54489',
        'WESTERN SAHARA' => '54489',
        'YEMEN' => '54489',
        'ZAMBIA' => '54489',
        'ZIMBABWE' => '54489'
    ];

    private static $advantRisksList = [
        'medical' => '4315533d-e4b2-4609-b4e4-df598cdd9705',
        'public' => '22e49815-4f76-4b84-a655-a9c19424c4b7',
        'cancel' => 'e041e5b7-6567-4210-8702-6a29e3fef229',
        'accident' => '1d71999c-be21-4bc9-a55d-d6af8129c3bf',
        'property' => '6c37f82b-82a0-4ceb-8af6-d7f3e8c752f3',
        'laggage' => '9f1bbb12-e28d-4f36-92ba-ecf225af967e',
    ];

    private static $advantAdditionalConditions = [
        'leisure' => '06cae2f2-49cf-4045-85a6-abe95ef650e1',
        'competition' => '1c3021d0-305b-4233-91e2-92c1f695e51a',
        'extreme' => 'bbea6fd7-020e-44de-97ff-64f8804afaaa'
    ];

    private static $advantCurrency = [
        'EUR' => '46212',
        'USD' => '46213',
        'RUB' => '46211'
    ];

    public static function getCurrencyUID($currency)
    {
        return self::$advantCurrency[$currency] ?? null;
    }

    public static function getCountryUID($country)
    {
        return self::$advantCountriesList[$country] ?? null;
    }

    public static function getRiskUID($risk)
    {
        return self::$advantRisksList[$risk] ?? null;
    }

    public static function getAdditionalConditionUID($advantAdditionalCondition)
    {
        return self::$advantAdditionalConditions[$advantAdditionalCondition] ?? null;
    }

}