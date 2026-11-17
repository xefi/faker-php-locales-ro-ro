<?php

namespace Xefi\Faker\RoRo\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
{
    protected $regions = [
        'Nord-Est', 'Sud-Est', 'Sud-Muntenia', 'Sud-Vest Oltenia', 'Vest', 'Nord-Vest', 'Centru', 'București-Ilfov',
    ];

    protected $counties = [
        ['AB' => 'Alba'], ['AR' => 'Arad'], ['AG' => 'Argeș'], ['BC' => 'Bacău'], ['BH' => 'Bihor'],
        ['BN' => 'Bistrița-Năsăud'], ['BT' => 'Botoșani'], ['BV' => 'Brașov'], ['BR' => 'Brăila'], ['BZ' => 'Buzău'],
        ['CS' => 'Caraș-Severin'], ['CL' => 'Călărași'], ['CJ' => 'Cluj'], ['CT' => 'Constanța'], ['CV' => 'Covasna'],
        ['DB' => 'Dâmbovița'], ['DJ' => 'Dolj'], ['GL' => 'Galați'], ['GR' => 'Giurgiu'], ['GJ' => 'Gorj'],
        ['HR' => 'Harghita'], ['HD' => 'Hunedoara'], ['IL' => 'Ialomița'], ['IS' => 'Iași'], ['IF' => 'Ilfov'],
        ['MM' => 'Maramureș'], ['MH' => 'Mehedinți'], ['MS' => 'Mureș'], ['NT' => 'Neamț'], ['OT' => 'Olt'],
        ['PH' => 'Prahova'], ['SM' => 'Satu Mare'], ['SJ' => 'Sălaj'], ['SB' => 'Sibiu'], ['SV' => 'Suceava'],
        ['TR' => 'Teleorman'], ['TM' => 'Timiș'], ['TL' => 'Tulcea'], ['VS' => 'Vaslui'], ['VL' => 'Vâlcea'],
        ['VN' => 'Vrancea'], ['B' => 'București'],
    ];

    protected $cities = [
        'București', 'Cluj-Napoca', 'Timișoara', 'Iași', 'Constanța', 'Craiova', 'Brașov', 'Galați', 'Ploiești',
        'Oradea', 'Brăila', 'Arad', 'Pitești', 'Sibiu', 'Bacău', 'Târgu Mureș', 'Baia Mare', 'Buzău', 'Botoșani',
        'Satu Mare', 'Râmnicu Vâlcea', 'Suceava', 'Piatra Neamț', 'Drobeta-Turnu Severin', 'Focșani', 'Târgoviște',
        'Tulcea', 'Bistrița', 'Reșița', 'Alba Iulia',
    ];

    protected $streetTypes = [
        'Strada', 'Bulevardul', 'Calea', 'Aleea', 'Piața', 'Șoseaua', 'Splaiul', 'Intrarea',
    ];

    protected $streetNames = [
        'Mihai Eminescu', 'Ștefan cel Mare', 'Unirii', 'Independenței', 'Libertății', 'Victoriei', 'Republicii',
        'Mihai Viteazul', 'Avram Iancu', 'Tudor Vladimirescu', 'Nicolae Bălcescu', 'Alexandru Ioan Cuza',
        'Ion Creangă', 'George Coșbuc', 'Lucian Blaga', 'Decebal', 'Traian', 'Florilor', 'Teilor', 'Trandafirilor',
        'Plopilor', 'Morii', 'Gării', 'Școlii', 'Bisericii', 'Păcii', 'Primăverii', 'Zorilor', 'Mărășești',
        'Revoluției', 'Carpați', 'Dacia', 'Eroilor', 'Nicolae Iorga', 'Vasile Alecsandri', 'George Enescu',
        'Constantin Brâncuși', 'Horea', 'Observatorului', 'Castanilor',
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
     * Return a random Romanian development region (regiune de dezvoltare).
     *
     * @return string
     */
    public function region(): string
    {
        return $this->pickArrayRandomElement($this->regions);
    }

    /**
     * Return a random Romanian county (județ) as [code => name], e.g. ['CJ' => 'Cluj'].
     *
     * @return array
     */
    public function county(): array
    {
        return $this->pickArrayRandomElement($this->counties);
    }

    /**
     * Return a random Romanian city.
     *
     * @return string
     */
    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cities);
    }

    /**
     * Return a random 6-digit Romanian postal code (cod poștal).
     *
     * @return string
     */
    public function postcode(): string
    {
        return sprintf('%06d', $this->randomizer->getInt(10000, 999999));
    }

    /**
     * Return a random house number.
     *
     * @return int
     */
    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 200);
    }

    /**
     * Return a random street name, e.g. "Strada Mihai Eminescu".
     *
     * @return string
     */
    public function streetName(): string
    {
        $streetType = $this->pickArrayRandomElement($this->streetTypes);
        $name = $this->pickArrayRandomElement($this->streetNames);

        return sprintf('%s %s', $streetType, $name);
    }

    /**
     * Return a random street address, e.g. "Strada Mihai Eminescu nr. 12".
     *
     * @return string
     */
    public function streetAddress(): string
    {
        return sprintf('%s nr. %d', $this->streetName(), $this->houseNumber());
    }

    /**
     * Return a full address on one line: street address, postal code and city.
     *
     * @return string
     */
    public function fullAddress(): string
    {
        return sprintf('%s, %s %s', $this->streetAddress(), $this->postcode(), $this->city());
    }
}
