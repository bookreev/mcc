<?php

namespace Bookreev\Mcc;

use Bookreev\Mcc\Entity\Group;
use Bookreev\Mcc\Entity\Mcc;

class MccService
{
    private static array $storage = [];

    public function getMcc(int $code, string $language): Mcc
    {
        $item = $this->getStorage()[$code];

        return new Mcc(
            (int)$item['mcc'],
            new Group($item['group']['type'], $item['group']['description'][$language]),
            $item['shortDescription'][$language],
            $item['fullDescription'][$language]
        );
    }

    private function getStorage(): array
    {
        if (empty($this->storage)) {
            self::$storage = $this->getDataFile();
        }

        return self::$storage;
    }

    private function getDataFile(): array
    {
        $result = [];
        $content = file_get_contents(
            __DIR__ . DIRECTORY_SEPARATOR .
            'database' . DIRECTORY_SEPARATOR .
            'mcc.json'
        );

        foreach (json_decode($content, true) as $row) {
            $result[(int)$row['mcc']] = $row;
        }

        return $result;
    }
}