<?php
namespace OSW3\Extension\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class CopyrightExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('copyright', [$this, 'generateCopyright'], ['is_safe' => ['html']]),
        ];
    }

    public function generateCopyright(?int $since=null, ?string $prefix=null, ?string $suffix=null)
    {
        $date = date('Y');

        $str = "&copy; ";
        $str.= null != $prefix ? $prefix." ": null;
        $str.= null != $since && $since < $date ? $since." - ": null;
        $str.= $date;
        $str.= null != $suffix ? " ".$suffix: null;

        return $str;
    }
}