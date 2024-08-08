<?php
namespace Dagou\TempusDominus\ViewHelpers\Uri;

use Dagou\TempusDominus\Interfaces\Source;
use Dagou\TempusDominus\Source\Local;
use Dagou\TempusDominus\Utility\ExtensionUtility;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class LocaleViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        $this->registerArgument('locale', 'string', 'Locale code.');
    }

    public function render(): string {
        if ($this->arguments['locale']) {
            $locale = $this->arguments['locale'];
        } elseif ($GLOBALS['TYPO3_REQUEST'] instanceof ServerRequestInterface) {
            /** @var \TYPO3\CMS\Core\Site\Entity\SiteLanguage $siteLanguage */
            if ($siteLanguage = $GLOBALS['TYPO3_REQUEST']->getAttribute('language')) {
                $locale = str_replace(
                    '_',
                    '-',
                    explode('.', $siteLanguage->getLocale())[0]
                );
            }
        }

        if (is_subclass_of(($className = ExtensionUtility::getSource()), Source::class)) {
            $source = GeneralUtility::makeInstance($className);
        } else {
            $source = GeneralUtility::makeInstance(Local::class);
        }

        return $source->getLocale($locale ?? '');
    }
}