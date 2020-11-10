<?php

namespace Drupal\module2\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class WidgetExample
 *
 * @FieldWidget(
 *   id = "widget_example",
 *   label = @Translation("Mi primer string widget"),
 *   field_types = {
 *     "string"
 *   }
 * )
 **/
class WidgetExample extends WidgetBase {
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
  {
    $value=isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element += [
      '#type' => 'textfield',
      '#default_value' => $value,
      '#size' => 20,
    ];
    return ['value' => $element];
  }
}
