<?php
namespace Dagou\TempusDominus\Source;

class JsDelivr extends AbstractSource {
    protected const URL = '//cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@'.self::VERSION.'/dist/';
}