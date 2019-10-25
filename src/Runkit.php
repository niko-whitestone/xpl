<?php

/**
 * Whitestone eXtended PHP Library
 * 
 * @copyright (c) 2019, Whitestone Oy
 * @author Niko Hujanen <niko@whitestone.fi>
 */
namespace Whitestone\Xpl;

trait Runkit
{
    /**
     * Run callback in current object's context with given parameters.
     * 
     * @param callable $runtime
     * @param mixed $param1
     * @param mixed $param2
     * @param mixed $paramN
     * @return self
     */
    public function with(callable $runtime, ...$parameters)
    {
        $runtime->call($this, ...$parameters);
        return $this;
    }
}