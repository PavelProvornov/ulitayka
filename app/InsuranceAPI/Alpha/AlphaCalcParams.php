<?php

namespace App\InsuranceAPI\Alpha;

use Illuminate\Http\Request;
use App\InsuranceAPI\Alpha\AlphaDirect;

class AlphaCalcParams
{
    public $request;

    public $client;
    public $countries;
    public $policyPeriodFrom;
    public $policyPeriodTill;
    public $currency;
    public $risks;
    public $insureds;
    public $additionalConditions;

    function __construct($request)
    {
        $this->request = $request;

        //$this->countries = $request['countries'];
        $this->policyPeriodFrom = $request['dateFrom'] ?? date('Y-m-d') . 'T00:00:00';
        $this->policyPeriodTill = $request['dateTill'] ?? date('Y-m-d', strtotime('+1 month')) . 'T00:00:00';
        $this->client = [
            'name' => 'Testov Petr'
        ];

        $this->insureds = [];
        foreach ($request['travelers'] as $traveler) {
            if (isset($traveler['accept']) && $traveler['accept'] === 'true')

                $this->insureds[] = [
                    'fio' => ($traveler['firstName']  ?? 'Stan').' '.($traveler['lastName'] ?? 'Marsh'),
                    'dateOfBirth' => $traveler['birthDate'] ?? date('Y-m-d', strtotime('-' . $traveler['age'] . ' year')) . 'T00:00:00'
                ];

        }

        $this->countries = [];
        foreach ($request['countries'] ?? [['country_name' => 'SCHENGEN']] as $country) {
            //dd($country);
            $this->countries[] = AlphaDirect::getCountryUID($country['country_name']);
        }

        $this->additionalConditions = [];
        foreach ($request['additionalConditions'] ?? [] as $additionalCondition) {
            if (array_key_exists('accept', $additionalCondition) && (string)$additionalCondition['accept'] === 'true') {
                $this->additionalConditions[] = AlphaDirect::getAdditionalConditionUID($additionalCondition['name']);
            }
        }

        $this->risks = [];
        foreach ($request['risks'] ?? [['name' => 'medical', 'accept' => 'true', 'amountAtRisk' => 50000, 'amountCurrency' => 'EUR']] as $risk) {
            if (array_key_exists('accept', $risk) && (string)$risk['accept'] === 'true') {
                $this->risks[] = [
                    'riskUID' => AlphaDirect::getRiskUID($risk['name']) ?? $risk['name'],
                    'amountAtRisk' => $risk['amountAtRisk'],
                    'amountCurrency' => $risk['amountCurrency'] ?? $request['radio_currency']
                ];
            }
        }
    }

    public function getCalcParams($operation)
    {
        return [
            [
                'policy' => [
                    'common' => [
                        'userId' => '9B724100-83B5-4EA0-9F55-452C07D131AE',
                        'userLogin' => 'AS_test',
                        'userPSW' => '8Pq7YS3V',
                        'insuranceProgrammUID' => 'bae89816-a75b-4d82-8741-409f42de0876',
                        'operation' => $operation,
                        'policyPeriodFrom' => $this->policyPeriodFrom,
                        'policyPeriodTill' => $this->policyPeriodTill,
                        'fio' => $this->client['name'],
                    ],
                    'insureds' => $this->insureds,
                    'risks' => $this->risks,
                    'countryUIDs' => $this->countries,
                    'additionalConditions' => $this->additionalConditions
                ]

            ]
        ];
    }
}