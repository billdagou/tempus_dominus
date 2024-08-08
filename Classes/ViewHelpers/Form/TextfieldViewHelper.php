<?php
namespace Dagou\TempusDominus\ViewHelpers\Form;

use TYPO3\CMS\Fluid\ViewHelpers\Form\AbstractFormFieldViewHelper;

class TextfieldViewHelper extends AbstractFormFieldViewHelper {
    /**
     * @var string
     */
    protected $tagName = 'input';

    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerTagAttribute('autofocus', 'string', 'Specifies that an input should automatically get focus when the page loads');
        $this->registerTagAttribute('disabled', 'string', 'Specifies that the input element should be disabled when the page loads');
        $this->registerTagAttribute('maxlength', 'int', 'The maxlength attribute of the input field (will not be validated)');
        $this->registerTagAttribute('readonly', 'string', 'The readonly attribute of the input field');
        $this->registerTagAttribute('size', 'int', 'The size of the input field');
        $this->registerTagAttribute('placeholder', 'string', 'The placeholder of the textfield');
        $this->registerTagAttribute('pattern', 'string', 'HTML5 validation pattern');
        $this->registerArgument('errorClass', 'string', 'CSS class to set if there are errors for this ViewHelper', false, 'f3-form-error');
        $this->registerUniversalTagAttributes();
        $this->registerArgument('required', 'bool', 'If the field is required or not', false, false);
        $this->registerArgument('type', 'string', 'The field type, e.g. "text", "email", "url" etc.', false, 'text');
        $this->registerArgument('format', 'string', 'Date format', FALSE, \DateTimeInterface::W3C);
    }

    /**
     * @return string
     */
    public function render(): string {
        $required = $this->arguments['required'];
        $type = $this->arguments['type'];

        $name = $this->getName();
        $this->registerFieldNameForFormTokenGeneration($name);
        $this->setRespectSubmittedDataValue(true);

        $this->tag->addAttribute('type', $type);
        $this->tag->addAttribute('name', $name);

        $value = $this->getValueAttribute();

        if ($value !== null) {
            $this->tag->addAttribute('value', $value);
        }

        if ($required !== false) {
            $this->tag->addAttribute('required', 'required');
        }

        $this->addAdditionalIdentityPropertiesIfNeeded();
        $this->setErrorClassAttribute();

        return $this->tag->render();
    }

    /**
     * @return string
     */
    protected function getValueAttribute(): string {
        $value = parent::getValueAttribute();

        return $value instanceof \DateTimeInterface ? $value->format($this->arguments['format']) : $value;
    }
}