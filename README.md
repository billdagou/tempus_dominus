# TYPO3 Extension: Tempus Dominus

EXT:tempus_dominus allows you to use [Tempus Dominus](https://getdatepicker.com/) in your extensions.

The extension version only matches the Tempus Dominus library version, it doesn't mean anything else.

## How to use it

You can load the library in your Fluid template easily.

    <f:asset.css identifier="tempus_dominus" href="{td:uri.css()}" />
    <f:asset.script identifier="tempus_dominus" src="{td:uri.js()}" />

And with the plugin or locale.

    <f:asset.script identifier="tempus_dominus.plugin" src="{td:uri.plugin(plugin: '...')}" />
    <f:asset.script identifier="tempus_dominus.locale" src="{td:uri.locale(locale: '...')}" />

To use other Tempus Dominus source, you can register it in `ext_localconf.php` or `AdditionalConfiguration.php`.

    \Dagou\TempusDominus\Utility\ExtensionUtility::registerSource(\Vendor\Extension\Source::class);

## ViewHelper

#### Form/Textfield

- `format` (string) Date format. Default `DateTimeInterface::W3C`.

more options see `TYPO3/Fluid/Form/Textfield`.