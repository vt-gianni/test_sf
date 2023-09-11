<?php

namespace App\Service;

class IndexService
{
    const _LIMIT = 10;

    /**
     *
     * @return array
     */
    public function getNumbers(): array
    {
        $numbers = [];
        for ($i = 0 ; $i < self::_LIMIT; $i++) {
            $numbers[] = $i;
        }

        return $numbers;
    }
}