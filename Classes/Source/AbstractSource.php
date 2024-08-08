<?php
namespace Dagou\TempusDominus\Source;

use Dagou\TempusDominus\Interfaces\Source;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements Source, SingletonInterface {
    protected const URL = '';
    protected const VERSION = '6.9.10';

    /**
     * @return string
     */
    public function getCss(): string {
        return static::URL.'css/'.$this->getCssBuild();
    }

    /**
     * @return string
     */
    protected function getCssBuild(): string {
        return 'tempus-dominus.min.css';
    }

    /**
     * @return string
     */
    public function getJs(): string {
        return static::URL.'js/'.$this->getJsBuild();
    }

    /**
     * @return string
     */
    protected function getJsBuild(): string {
        return 'tempus-dominus.min.js';
    }

    /**
     * @param string $plugin
     *
     * @return string
     */
    public function getPlugin(string $plugin): string {
        return static::URL.'plugins/'.$this->getPluginBuild($plugin);
    }

    /**
     * @param string $plugin
     *
     * @return string
     */
    protected function getPluginBuild(string $plugin): string {
        return $plugin.'.js';
    }

    /**
     * @param string $locale
     *
     * @return string
     */
    public function getLocale(string $locale): string {
        return static::URL.'locales/'.$this->getLocaleBuild($locale);
    }

    /**
     * @param string $locale
     *
     * @return string
     */
    protected function getLocaleBuild(string $locale): string {
        return $locale.'.js';
    }
}