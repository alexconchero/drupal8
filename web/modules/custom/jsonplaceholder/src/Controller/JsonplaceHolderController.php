<?php

namespace Drupal\jsonplaceholder\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class JsonplaceHolderController.
 *
 * @package Drupal\jsonplaceholder\Controller
 */
class JsonplaceHolderController extends ControllerBase {

  /**
   * Prints the current time.
   *
   * @return array
   *   A render array containing the current time.
   */
  public function render() {

    $jsonplaceholder = \Drupal::service('jsonplaceholder.jsonplaceholder_client');
    $items = $jsonplaceholder->getPosts(10);
    return [
      '#theme' => 'jsonplaceholder_posts',
      '#items' => $items,
    ];
  }

}
