<?php

/**
 * Whitestone eXtended PHP Library
 * 
 * @copyright (c) 2019, Whitestone Oy
 * @author Niko Hujanen <niko@whitestone.fi>
 */
namespace Whitestone\Xpl;

use \ReflectionClass;

trait Pathkit
{
    /**
     * Get current context's path
     * 
     * @return string
     */
    public function myFileLocation()
    {
        $reflection = new ReflectionClass($this);

        return dirname($reflection->getFileName());
    }

    /**
     * Get current context's filename
     * 
     * @return string
     */
    public function myFilename()
    {
        $reflection = new ReflectionClass($this);

        return $reflection->getFileName();
    }
}