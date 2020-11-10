<?php

namespace Drupal\module2\Plugin\Field\ExampleFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 *
 * @FieldFormatter(
 *   id = "field_example_formatter",
 *   label = @Translation("Simple formatter"),
 *   field_types = {
 *     "text_with_summary"
 *   }
 * )
 */
class ExampleFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    return $elements;
  }

}
