<?php
namespace Dagou\TempusDominus\ViewHelpers\Uri;

use Dagou\TempusDominus\Interfaces\Source;
use Dagou\TempusDominus\Source\Local;
use Dagou\TempusDominus\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class PluginViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('plugin', 'string', 'Plugin name.', TRUE);
    }

    /**
     * @return string
     */
    public function render(): string {
        if (is_subclass_of(($className = ExtensionUtility::getSource()), Source::class)) {
            $source = GeneralUtility::makeInstance($className);
        } else {
            $source = GeneralUtility::makeInstance(Local::class);
        }

        return $source->getPlugin($this->arguments['plugin']);
    }
}