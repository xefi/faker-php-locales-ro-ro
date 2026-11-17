<?php

namespace Xefi\Faker\RoRo\Extensions;

use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
{
    protected $firstNameMale = [
        'Andrei', 'Alexandru', 'Mihai', 'Ion', 'Gheorghe', 'Constantin', 'Vasile', 'Nicolae', 'Ștefan', 'Florin',
        'Cristian', 'Adrian', 'Daniel', 'Marian', 'Ionuț', 'Bogdan', 'Răzvan', 'Cătălin', 'Dumitru', 'Gabriel',
        'Sorin', 'Lucian', 'Radu', 'Emil', 'Ovidiu', 'Petru', 'Tudor', 'Matei', 'Victor', 'Sebastian',
        'Liviu', 'Costel', 'Viorel', 'Mircea', 'Dragoș', 'Horia', 'Teodor', 'Silviu', 'Valentin', 'Octavian',
    ];

    protected $firstNameFemale = [
        'Maria', 'Elena', 'Ioana', 'Ana', 'Mihaela', 'Andreea', 'Cristina', 'Gabriela', 'Alexandra', 'Daniela',
        'Mariana', 'Georgiana', 'Ana-Maria', 'Alina', 'Florentina', 'Nicoleta', 'Ramona', 'Simona', 'Larisa', 'Roxana',
        'Diana', 'Monica', 'Irina', 'Raluca', 'Oana', 'Adriana', 'Bianca', 'Iulia', 'Camelia', 'Loredana',
        'Carmen', 'Lavinia', 'Teodora', 'Ileana', 'Doina', 'Luminița', 'Corina', 'Anca', 'Viorica', 'Smaranda',
    ];

    protected $lastName = [
        'Popescu', 'Ionescu', 'Popa', 'Pop', 'Radu', 'Dumitru', 'Stan', 'Stoica', 'Gheorghe', 'Matei',
        'Ciobanu', 'Constantin', 'Mocanu', 'Ștefan', 'Munteanu', 'Lungu', 'Ion', 'Dobre', 'Florea', 'Moldovan',
        'Barbu', 'Tudor', 'Rusu', 'Nistor', 'Mihai', 'Toma', 'Marin', 'Diaconu', 'Dinu', 'Georgescu',
        'Tănase', 'Lazăr', 'Oprea', 'Cristea', 'Neagu', 'Păun', 'Constantinescu', 'Bălan', 'Sârbu', 'Vasilescu',
    ];

    protected $titleMale = ['Domnul', 'Dr.', 'Prof.', 'Ing.'];

    protected $titleFemale = ['Doamna', 'Domnișoara', 'Dr.', 'Prof.', 'Ing.'];

    /**
     * County codes used in the JJ part of a CNP (01 to 46, then 51 and 52).
     *
     * @var string[]
     */
    protected array $cnpCountyCodes = [
        '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16',
        '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32',
        '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '51', '52',
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
     * Generate a Romanian personal numeric code (CNP), formatted as SYYMMDDJJNNNC.
     *
     * S encodes gender and century (1/2 for 1900-1999, 5/6 for 2000-2099), JJ the county code,
     * NNN a sequence number and C the control digit computed with the 279146358279 key.
     *
     * @param string|null $gender One of static::GENDER_MALE or static::GENDER_FEMALE, random when null.
     *
     * @return string
     */
    public function cnp(?string $gender = null): string
    {
        if ($gender === null) {
            $gender = $this->randomizer->getInt(0, 1) === 0 ? static::GENDER_FEMALE : static::GENDER_MALE;
        }

        $birthDate = $this->randomizer->getInt(gmmktime(0, 0, 0, 1, 1, 1920), gmmktime(0, 0, 0, 12, 31, 2020));
        $sex = ((int) gmdate('Y', $birthDate) >= 2000 ? 5 : 1) + ($gender === static::GENDER_FEMALE ? 1 : 0);

        $cnp = sprintf(
            '%d%s%s%03d',
            $sex,
            gmdate('ymd', $birthDate),
            $this->pickArrayRandomElement($this->cnpCountyCodes),
            $this->randomizer->getInt(1, 999)
        );

        $sum = 0;
        foreach (str_split('279146358279') as $index => $weight) {
            $sum += (int) $cnp[$index] * (int) $weight;
        }

        $controlDigit = $sum % 11;

        return $cnp.($controlDigit === 10 ? 1 : $controlDigit);
    }
}
