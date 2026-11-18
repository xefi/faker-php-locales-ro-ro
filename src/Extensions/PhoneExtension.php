<?php

namespace Xefi\Faker\RoRo\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $defaultPrefix = '0';

    public string $indicator = '+40';

    protected array $landlineFormats = [
        '21{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '31{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '2{d}{d}{separator}{d}{d}{d}{separator}{d}{d}{d}',
        '3{d}{d}{separator}{d}{d}{d}{separator}{d}{d}{d}',
    ];

    protected array $cellFormats = [
        '72{d}{separator}{d}{d}{d}{separator}{d}{d}{d}',
        '74{d}{separator}{d}{d}{d}{separator}{d}{d}{d}',
        '75{d}{separator}{d}{d}{d}{separator}{d}{d}{d}',
        '76{d}{separator}{d}{d}{d}{separator}{d}{d}{d}',
        '77{d}{separator}{d}{d}{d}{separator}{d}{d}{d}',
        '78{d}{separator}{d}{d}{d}{separator}{d}{d}{d}',
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
     * Generate a phone number, keeping a separator between the indicator and the number.
     *
     * @param string|null $format
     * @param string      $separator
     * @param string|null $prefix
     *
     * @return string
     */
    public function phoneNumber(?string $format = null, string $separator = '', ?string $prefix = null): string
    {
        if ($prefix === $this->indicator) {
            $prefix .= $separator;
        }

        return parent::phoneNumber($format, $separator, $prefix);
    }
}
