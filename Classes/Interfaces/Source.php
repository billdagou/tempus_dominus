<?php
namespace Dagou\TempusDominus\Interfaces;

interface Source {
    /**
     * @return string
     */
    public function getCss(): string;

    /**
     * @return string
     */
    public function getJs(): string;

    /**
     * @param string $plugin
     *
     * @return string
     */
    public function getPlugin(string $plugin): string;

    /**
     * @param string $locale
     *
     * @return string
     */
    public function getLocale(string $locale): string;
}