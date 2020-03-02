<?php

declare(strict_types=1);

namespace App\Validators;

use App\Config\Companies;

/**
 * @author matkozikowski@gmail.com
 */
class JourneyValidators
{
    /**
     * @param string $values
     * @return bool
     */
    public function getOrderFromDestination(string $value): int
    {
        $companies = Companies::getList();

        foreach ($companies as $index => $company) {
            $result = $this->checkIfCompanyExists($company, $value);

            if (true === $result) {
                return $index;
            }
        }

        return 0;
    }

    private function checkIfCompanyExists(string $company, string $searchCompany)
    {
        return (strpos($company, $searchCompany) !== false) ? true : false;
    }
}