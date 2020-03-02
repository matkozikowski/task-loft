<?php

declare(strict_types=1);

namespace App\Validators;

/**
 * @author matkozikowski@gmail.com
 */
class JsonValidators
{
    /**
     * @param array $values
     * @return bool
     */
    public function valid(array $values): bool
    {
        return (empty($values)) ? false : true;
    }
}