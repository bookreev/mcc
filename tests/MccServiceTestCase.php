<?php

class MccServiceTestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * @param $code
     * @param $language
     * @param $result
     * @return void
     * @dataProvider getDataProvider
     */
    public function testGetMcc($code, $language, $result): void
    {
        $mcc = (new \Bookreev\Mcc\MccService())->getMcc($code, $language);
        $this->assertInstanceOf(\Bookreev\Mcc\Entity\Mcc::class, $mcc, 'InstanceOf Mcc');
        $this->assertInstanceOf(\Bookreev\Mcc\Entity\Group::class, $mcc->getGroup(), 'InstanceOf Group');
        $this->assertEquals($result['code'], $mcc->getCode());
        $this->assertEquals($result['group']['type'], $mcc->getGroup()->getType());
        $this->assertEquals($result['group']['description'], $mcc->getGroup()->getDescription());
        $this->assertEquals($result['shortDescription'], $mcc->getShortDescription());
        $this->assertEquals($result['fullDescription'], $mcc->getFullDescription());
    }

    public function getDataProvider()
    {
        return [
            [
                'code' => 742,
                'language' => 'uk',
                'result' => [
                    'code' => 742,
                    'group' => [
                        'type' => 'AS',
                        'description' => 'Сільськогосподарські послуги'
                    ],
                    'shortDescription' => 'Ветеринарні послуги',
                    'fullDescription' => 'Ветеринарні послуги'
                ]
            ],
            [
                'code' => 1711,
                'language' => 'en',
                'result' => [
                    'code' => 1711,
                    'group' => [
                        'type' => 'CS',
                        'description' => 'Contract services'
                    ],
                    'shortDescription' => 'Heating, Plumbing, A/C',
                    'fullDescription' => 'Air Conditioning Contractors - Sales and Installation, Heating Contractors - Sales, Service, Installation'
                ]
            ]
        ];
    }
}