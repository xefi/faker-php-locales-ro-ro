<?php

namespace Xefi\Faker\RoRo\Extensions;

use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
{
    private array $companies = [
        'Carpați Construcții S.R.L.', 'Dunărea Logistic S.A.', 'Transilvania Software S.R.L.',
        'Moldova Agro S.R.L.', 'Popescu & Asociații S.R.L.', 'Banatul Energie S.A.',
        'Bucovina Mobila S.R.L.', 'Delta Pescărie S.R.L.', 'Oltenia Transport S.A.',
        'Maramureș Lemn S.R.L.', 'Ionescu și Fiii S.N.C.', 'Argeș Auto S.R.L.',
        'Cetatea Medical S.R.L.', 'Mureș Lactate S.A.', 'Dobrogea Vin S.R.L.',
        'Ceahlău Turism S.R.L.', 'Prahova Petrol S.A.', 'Bărăgan Cereale S.R.L.',
        'Someș Textile S.R.L.', 'Bistrița Panificație S.R.L.', 'Retezat Consult S.R.L.',
        'Codrii Verzi S.C.S.', 'Siret Distribuție S.A.', 'Lazăr & Stoica S.N.C.',
        'Făgăraș Inginerie S.R.L.', 'Mărțișor Design S.R.L.', 'Cozia Farm S.R.L.',
        'Bucegi Imobiliare S.A.', 'Tisa Tech S.R.L.', 'Vrancea Podgorii S.A.',
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
     * Return a random company name.
     *
     * @return string
     */
    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    /**
     * Generate a Romanian fiscal identification code (CUI / CIF) of 8 or 9 digits, the last one being
     * the control digit computed with the 753217532 key.
     *
     * @return string
     */
    public function cui(): string
    {
        $number = $this->randomizer->getInt(1, 9).$this->randomizer->getBytesFromString('0123456789', $this->randomizer->getInt(6, 7));
        $paddedNumber = str_pad($number, 9, '0', STR_PAD_LEFT);

        $sum = 0;
        foreach (str_split('753217532') as $index => $weight) {
            $sum += (int) $paddedNumber[$index] * (int) $weight;
        }

        return $number.($sum * 10 % 11 % 10);
    }

    /**
     * Generate a Romanian VAT number (cod de TVA): "RO" followed by a CUI.
     *
     * @return string
     */
    public function vat(): string
    {
        return 'RO'.$this->cui();
    }
}
