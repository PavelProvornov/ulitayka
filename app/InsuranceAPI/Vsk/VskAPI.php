<?php
/**
 * Created by PhpStorm.
 * User: White
 * Date: 01.02.2018
 * Time: 12:48
 */

namespace App\InsuranceAPI\Vsk;

class VskAPI
{
    private static $wsdl = 'https://newtravel.vsk.ru/test/WS/Policy2.asmx?wsdl';
    private static $asmx = 'https://newtravel.vsk.ru/Front/ExternalWebServices/GetInputParams.asmx?wsdl';
    //private static $wsdl = 'https://ti.alfastrah.ru/TIService/InsuranceAlfaService.svc?wsdl';
    private static $organizationId = '6F470B1B-C484-4FA6-A150-2349211564E5';
    private static $userId  = 'F24230CC-CFC3-4EC5-8D7D-E3D72E0D6DC8';
    //private static $userPSW = '8Pq7YS3V';
    //private static $insuranceProgrammUID = '9afd653e-9b31-4b9c-90dc-0ee0964afb1c';

    /**
     * Метод отправки soap-запрса принимает метод и параметры, возвращает массив с ответом
     */

    private static function soapRequest($method, $params)
    {
        //dd($params);
        try {
            $client = new \SoapClient(self::$asmx);
            $result = @$client->__soapCall($method, $params);
        }
        catch (\SoapFault $e) {
            return null;
        }
        return $result;

    }

    public static function calculate($calcParams)
    {
        $method = 'CALC2';
        return self::soapRequest($method, $calcParams);
    }
    
    /**
     * Метод получения доступных агенту программ страхования
     */
    /*public static function getInsuranceProgramms()
    {
        $method = 'GetInsuranceProgramms';
        $params = [
            [
                'parameters' =>
                    [
                        'OrganizationId' => self::$organizationId
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Запрос списков рисков доступных к страхованию в выбранной программе
     */
    public static function getRisks (
        $programUid = null
    )
    {
        $method = 'GetRisks';
        $params = [
            [
                'parameters' =>
                    [
                        'OrganizationId' => self::$organizationId

                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }

    /**
     * Запрос стран
     */
    public static function getCountries(
        $programUid = null,
        $countryUid = null
    )
    {
        $method = 'GetCountries';
        $params = [
            [
                'parameters' =>
                    [
                        'OrganizationId' => self::$organizationId,

                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }

    /**
     * Запрос справочника дополнительных условий спорт/работа
     */

    /*public static function getAdditionalConditions()
    {
        $method = 'GetAdditionalConditions';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Запрос справочника дополнительных условий скидки/надбавки
     */

    /*public static function getAdditionalConditions2()
    {
        $method = 'GetAdditionalConditions2';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Запрос справочника доступных страховых сумм
     */

    /*public static function getStruhSum(
        $programUid = null,
        $countryUid = null,
        $riskUid = null
    )
    {
        $method = 'GetStruhSum';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid,
                        'programUid' => $programUid,
                        'countryUid' => $countryUid,
                        'riskUid' => $riskUid
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Запрос справочника вариантов франшиз
     */

    /*public static function getFransize(
        $programUid = null,
        $countryUid = null,
        $riskUid = null)
    {
        $method = 'GetFransize';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid,
                        'programUid' => $programUid,
                        'countryUid' => $countryUid,
                        'riskUid' => $riskUid
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Запрос справочника компаний-ассистенсов
     */

    /*public static function getAssistance(
        $assistanceUid = null
    )
    {
        $method = 'GetAssistance';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid,
                        'assistanceUid' => $assistanceUids
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Запрос справочника валют
     */

    /*public static function getCurrency()
    {
        $method = 'GetCurrency';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Запрос справочника территорий
     */

    /*public static function getTerritory()
    {
        $method = 'GetTerritory';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * отбор полисов по дате начала действия полисов попадающим в указанный период времени
     */

    /*public static function getPoliciesByBeginDate($policyPeriodFrom, $policyPeriodTill)
    {
        $method = 'GetPoliciesByBeginDate';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid,
                        'userLogin' => self::$userLogin,
                        'userPSW' => self::$userPSW,
                        'policyPeriodFrom' => $policyPeriodFrom,
                        'policyPeriodTill' => $policyPeriodTill
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Метод отбора полисов по дате создания полиса за указанный период времени
     */

    /*public static function getPoliciesByCreateDate($policyPeriodFrom, $policyPeriodTill)
    {
        $method = 'GetPoliciesByCreateDate';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid,
                        'userLogin' => self::$userLogin,
                        'userPSW' => self::$userPSW,
                        'policyPeriodFrom' => $policyPeriodFrom,
                        'policyPeriodTill' => $policyPeriodTill
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Метод отбора полисов по номеру
     */

    /*public static function getPoliciesByPolicyNumber($policyNumber)
    {
        $method = 'GetPoliciesByPolicyNumber';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid,
                        'userLogin' => self::$userLogin,
                        'userPSW' => self::$userPSW,
                        'policyNumber' => $policyNumber
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Метод аннулирования полиса
     */

    /*public static function setCancelPolicy($number)
    {
        $method = 'SetCancelPolicy';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid,
                        'userLogin' => self::$userLogin,
                        'userPSW' => self::$userPSW,
                        'number' => $number
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Метод акцептации полиса
     */

    /*public static function setAcceptPolicy($number)
    {
        $method = 'SetAcceptPolicy';
        $params = [
            [
                'parameters' =>
                    [
                        'agentUid' => self::$agentUid,
                        'userLogin' => self::$userLogin,
                        'userPSW' => self::$userPSW,
                        'number' => $number
                    ]
            ]
        ];
        return self::soapRequest($method, $params);
    }*/

    /**
     * Метод расчета тарифа и регистрации или только расчета нового полиса (Принимает массив со всеми
     * входными параметрами, за исключением 'agentUid', 'userLogin','userPSW' )
     */

}
