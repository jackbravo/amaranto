<?php

/**
 * 
 *
 * @package    axai
 * @subpackage widget
 */
class sfWidgetFormSchemaFormatterSmall extends sfWidgetFormSchemaFormatter
{
  protected
    $rowFormat       = "%field%\n  <div class='description'>%label% %error% %help%</div>\n  %hidden_fields%\n",
    $errorRowFormat  = "<div class='errors'>\n%errors%</div>\n",
    $helpFormat      = "<div class='help-text'>%help%</div>",
    $decoratorFormat = "<div class='doctrine-form'>\n  %content%</div>",
    $errorListFormatInARow     = "  <div class=\"error_list\">\n%errors%  </div>\n",
    $errorRowFormatInARow      = "    <div class='error-item'>%error%</div>\n",
    $namedErrorRowFormatInARow = "    <div class='error-item'>%name%: %error%</div>\n";

  public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
  {
    $prepend = "<div class='";
    $prepend .= (sizeof($errors) > 0) ? ' has-errors' : '';
    $prepend .= "'>";
    $append = '</div>';
    return strtr($prepend . $this->getRowFormat() . $append, array(
      '%label%'         => $label,
      '%field%'         => $field,
      '%error%'         => $this->formatErrorsForRow($errors),
      '%help%'          => $this->formatHelp($help),
      '%hidden_fields%' => is_null($hiddenFields) ? '%hidden_fields%' : $hiddenFields,
    ));
  }
}
