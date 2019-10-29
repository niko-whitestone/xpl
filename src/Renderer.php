<?php

/**
 * Whitestone eXtended PHP Library
 * 
 * @copyright (c) 2019, Whitestone Oy
 * @author Niko Hujanen <niko@whitestone.fi>
 */
namespace Whitestone\Xpl;

trait Renderer
{
    public function scopedRender($fileToRender, array $data = [], array $includePaths = null)
    {
        $renderer = function() {
            extract( func_get_arg(1) );
            require_once func_get_arg(0);
        };

        if (is_array($includePaths)) {
            $oldIncludePaths = \get_include_path();
            set_include_path(implode(PATH_SEPARATOR, $includePaths));
        }

        ob_start();
        $renderer->call($this, $fileToRender, $data);
        $result = ob_get_clean();

        if (is_array($includePaths)) {
            set_include_path($oldIncludePaths);
        }

        return $result;
    }
}