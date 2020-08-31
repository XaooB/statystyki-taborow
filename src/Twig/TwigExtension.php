<?php


namespace App\Twig;


use App\Services\TextDictionary;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
    /**
     * @var TextDictionary
     */
    protected $dictionary;

    public function __construct(TextDictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('getText', [$this, 'getText']),
        ];
    }

    public function getText($key) {
        return $this->dictionary->getText($key);
    }
}