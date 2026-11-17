<?php

namespace Xefi\Faker\RoRo\Extensions;

use Xefi\Faker\Extensions\TextExtension as BaseTextExtension;

class TextExtension extends BaseTextExtension
{
    /**
     * Text in format => Paragraphs => Sentences => Words.
     *
     * @var array|array[]
     */
    protected array $paragraphs = [
        [
            ['Calitatea', 'serviciilor', 'rămâne', 'un', 'obiectiv', 'central', 'în', 'întregul', 'sector', 'profesional.'],
            ['Fiecare', 'proiect', 'necesită', 'o', 'planificare', 'atentă', 'și', 'o', 'împărțire', 'clară', 'a', 'responsabilităților.'],
            ['Echipele', 'colaborează', 'strâns', 'pentru', 'a', 'atinge', 'obiectivele', 'comune.'],
            ['Comunicarea', 'deschisă', 'dintre', 'colegi', 'crește', 'productivitatea', 'și', 'încrederea.'],
        ],
        [
            ['Gestionarea', 'resurselor', 'este', 'un', 'element', 'esențial', 'pentru', 'performanța', 'globală.'],
            ['Metodele', 'de', 'lucru', 'evoluează', 'în', 'funcție', 'de', 'nevoi', 'și', 'de', 'noile', 'tehnologii.'],
            ['Capacitatea', 'de', 'adaptare', 'ajută', 'companiile', 'să', 'rămână', 'competitive', 'și', 'inovatoare.'],
            ['Procesele', 'sunt', 'revizuite', 'periodic', 'pentru', 'a', 'optimiza', 'rezultatele', 'și', 'a', 'răspunde', 'cerințelor', 'pieței.'],
        ],
        [
            ['Satisfacția', 'clienților', 'depinde', 'de', 'calitatea', 'serviciului', 'și', 'de', 'rapiditatea', 'reacției.'],
            ['Indicatorii', 'sunt', 'folosiți', 'pentru', 'a', 'măsura', 'performanța', 'și', 'a', 'orienta', 'deciziile', 'strategice.'],
            ['Provocările', 'zilnice', 'sunt', 'depășite', 'datorită', 'unei', 'gestionări', 'eficiente', 'și', 'a', 'competențelor', 'potrivite.'],
            ['Evaluarea', 'periodică', 'a', 'practicilor', 'permite', 'identificarea', 'unor', 'îmbunătățiri', 'posibile.'],
        ],
        [
            ['Formarea', 'și', 'dezvoltarea', 'competențelor', 'sunt', 'priorități', 'pentru', 'orice', 'companie.'],
            ['Angajații', 'sunt', 'încurajați', 'să', 'dobândească', 'noi', 'abilități', 'și', 'să', 'inoveze.'],
            ['Strategiile', 'de', 'îmbunătățire', 'continuă', 'cresc', 'eficiența', 'și', 'reduc', 'riscurile.'],
            ['Programele', 'de', 'formare', 'personalizate', 'sprijină', 'dezvoltarea', 'individuală', 'și', 'colectivă.'],
        ],
        [
            ['Analiza', 'datelor', 'ajută', 'la', 'identificarea', 'zonelor', 'de', 'creștere', 'și', 'de', 'progres.'],
            ['Obiectivele', 'se', 'ajustează', 'în', 'funcție', 'de', 'evoluția', 'pieței', 'și', 'de', 'așteptările', 'clienților.'],
            ['Monitorizarea', 'regulată', 'a', 'progresului', 'favorizează', 'o', 'adaptare', 'rapidă', 'la', 'schimbări.'],
            ['Deciziile', 'se', 'bazează', 'pe', 'date', 'fiabile', 'și', 'pe', 'analize', 'precise.'],
            ['Revizuirile', 'periodice', 'permit', 'reevaluarea', 'strategiilor', 'și', 'aplicarea', 'măsurilor', 'corective.'],
        ],
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
