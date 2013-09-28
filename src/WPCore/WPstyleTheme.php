<?php
/*
 * This file is part of WPCore project.
 *
 * (c) Louis-Michel Raynauld <louismichel@pweb.ca>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WPCore;

/**
 * WP style theme
 *
 * @author Louis-Michel Raynauld <louismichel@pweb.ca>
 */
class WPstyleTheme extends WPstyle
{
    protected $load_condition = true;

    public function __construct($load_condition, $handle, $src = "", $deps = array(), $ver = false, $media = 'all')
    {
        parent::__construct($handle, $src, $deps, $ver, $media);

        $this->load_condition = $load_condition;
    }

    //This is unsafe but will do for now
    public function isNeeded()
    {
        $isNeeded = $this->load_condition;
        eval("\$isNeeded = $isNeeded;");

        return $isNeeded;
    }

    public function enqueue()
    {
        if ($this->isNeeded()) {
            parent::enqueue();
        }
    }
}
