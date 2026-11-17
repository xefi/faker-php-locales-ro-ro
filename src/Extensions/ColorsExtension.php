<?php

namespace Xefi\Faker\RoRo\Extensions;

use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;

class ColorsExtension extends BaseColorsExtension
{
    protected array $safeColorNames = [
        'Negru', 'Grena', 'Verde', 'Bleumarin', 'Măsliniu',
        'Mov', 'Verde albăstrui', 'Verde lămâie', 'Albastru', 'Argintiu',
        'Gri', 'Galben', 'Fucsia', 'Acvamarin', 'Alb',
    ];

    protected array $colorNames = [
        'Negru', 'Grena', 'Verde', 'Bleumarin', 'Măsliniu',
        'Mov', 'VerdeAlbăstrui', 'VerdeLămâie', 'Albastru', 'Argintiu',
        'Gri', 'Galben', 'Fucsia', 'Acvamarin', 'Alb',
        'Bej', 'Ciocolatiu', 'Coral', 'Cian', 'Carmin',
        'AlbastruÎnchis', 'PortocaliuÎnchis', 'Cărămiziu', 'VerdeMarin', 'AlbFloral',
        'VerdePădure', 'Auriu', 'Roz', 'Indigo', 'Kaki',
        'Lavandă', 'AlbastruDeschis', 'CoralDeschis', 'VerdeDeschis', 'SomonDeschis',
        'AlbIn', 'Magenta', 'AlbastruMediu', 'OrhideeMediu', 'Mocasin',
        'Portocaliu', 'Roșu', 'Prună', 'Peru', 'AlbastruRegal',
        'Somon', 'MaroNisipiu', 'BleuCer', 'Zăpadă', 'Turcoaz',
        'Violet', 'AlbFum',
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
}
