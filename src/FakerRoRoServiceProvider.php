<?php

namespace Xefi\Faker\RoRo;

use Xefi\Faker\RoRo\Extensions\AddressExtension;
use Xefi\Faker\RoRo\Extensions\ColorsExtension;
use Xefi\Faker\RoRo\Extensions\CompanyExtension;
use Xefi\Faker\RoRo\Extensions\FinancialExtension;
use Xefi\Faker\RoRo\Extensions\PersonExtension;
use Xefi\Faker\RoRo\Extensions\PhoneExtension;
use Xefi\Faker\RoRo\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerRoRoServiceProvider extends Provider
{
    /**
     * Register the ro_RO extensions.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            PhoneExtension::class,
            TextExtension::class,
        ]);
    }
}
