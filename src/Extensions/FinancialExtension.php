<?php

namespace Xefi\Faker\RoRo\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    /**
     * Romanian bank codes (the first four letters of the bank BIC).
     *
     * @var string[]
     */
    protected array $bankCodes = [
        'BTRL', 'BRDE', 'RNCB', 'INGB', 'RZBR', 'BACX', 'CECE', 'TREZ', 'PIRB', 'OTPV', 'UGBI', 'BREL',
    ];

    /**
     * Returns the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'ro_RO';
    }

    /**
     * Generate a Romanian IBAN (ROkk + 4-letter bank code + 16 alphanumeric characters).
     *
     * @param string|null $countryCode
     * @param string|null $format      [{d} => digit, {l} => letter, {a} => any]
     *
     * @return string
     */
    public function iban(?string $countryCode = 'RO', ?string $format = null): string
    {
        if ($format === null) {
            $format = $this->pickArrayRandomElement($this->bankCodes).str_repeat('{a}', 16);
        }

        return parent::iban($countryCode, $format);
    }
}
