<?php

namespace BotMan\Studio;

use Illuminate\Support\Arr;
use Illuminate\Support\Composer as BaseComposer;

class Composer extends BaseComposer
{
    /**
     * Install a composer package.
     *
     * @param $package
     * @param callable $callback
     */
    public function install($package, callable $callback)
    {
        $process = $this->getProcess(array_merge($this->findComposer(), ['require', $package]));

        $process->run($callback);

        return $process->isSuccessful();
    }
}
