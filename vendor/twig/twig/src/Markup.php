<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twig;

/**
 * Marks a content as safe.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Markup implements \Countable
{
    protected $content;
    protected $charset;

    public function __construct($content, $charset)
    {
        $this->content = (string) $content;
        $this->charset = $charset;
    }

    public function __toString()
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function count() : int
    {
        return \function_exists('mb_get_info') ? mb_strlen($this->content, $this->charset) : \strlen($this->content);
    }
}

class_alias('Twig\Markup', 'Twig_Markup');
