# TYPO3 Extension: Tempus Dominus

EXT:tempus_dominus allows you to use [Tempus Dominus](https://getdatepicker.com/) in your extensions.

The extension version only matches the Tempus Dominus library version, it doesn't mean anything else.

## How to use it

You can load the library in your Fluid template.

    <bsdtp:css />
    <bsdtp:js />

You can also load your own libraries.

    <bsdtp:css href="..." />
    <bsdtp:js src="..." />

For more options please refer to &lt;f:asset.css&gt; and &lt;f:asset.script&gt;.

To use other Bootstrap Datetimepicker source, you can register it in `ext_localconf.php` or `AdditionalConfiguration.php`.

    \Dagou\BootstrapDatetimepicker\Utility\ExtensionUtility::registerSource(\Dagou\BootstrapDatetimepicker\Source\CloudFlare::class);