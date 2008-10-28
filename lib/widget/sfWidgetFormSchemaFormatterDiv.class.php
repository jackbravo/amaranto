<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * 
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormSchemaFormatterTable.class.php 5995 2007-11-13 15:50:03Z fabien $
 */
class sfWidgetFormSchemaFormatterDiv extends sfWidgetFormSchemaFormatter
{
  protected
    $rowFormat       = "%label%\n  %field%\n  <div class='description'>%error%%help%</div>\n  %hidden_fields%\n",
    $errorRowFormat  = "<div class='errors'>\n%errors%</div>\n",
    $helpFormat      = "<div class='help-text'>%help%</div>",
    $decoratorFormat = "<div class='doctrine-form'>\n  %content%</div>",
    $errorListFormatInARow     = "  <div class=\"error_list\">\n%errors%  </div>\n",
    $errorRowFormatInARow      = "    <div class='error-item'>%error%</div>\n",
    $namedErrorRowFormatInARow = "    <div class='error-item'>%name%: %error%</div>\n";

  public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
  {
    $prepend = "<div class='form-item";
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
