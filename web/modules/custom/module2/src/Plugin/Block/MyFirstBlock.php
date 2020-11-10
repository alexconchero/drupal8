<?php

namespace Drupal\module2\Plugin\Block;

  use Drupal\Core\Block\BlockBase;
  use Drupal\Core\Block\BlockPluginInterface;
  use Drupal\Core\Form\FormBuilderInterface;
  use Drupal\Core\Form\FormStateInterface;
  use Drupal\Core\Access\AccessResult;
  use Drupal\Core\Cache\Cache;

  /**
   * Provides a 'Fax' block.
   *
   * @Block(
   *   id = "fax_block",
   *   admin_label = @Translation("Fax block"),
   * )
   */
class MyFirstBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $config = $this->getConfiguration();
    $fax_number = isset($config['fax_number']) ? $config['fax_number'] : '';
    return [
      '#markup' => $this->t('The fax number is @number!', ['@number' => $fax_number]),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    // Retrieve existing configuration for this block.
    $config = $this->getConfiguration();

    // Add a form field to the existing block configuration form.
    $form['fax_number'] = [
      '#type' => 'textfield',
      '#title' => t('Fax number'),
      '#default_value' => isset($config['fax_number']) ? $config['fax_number'] : '',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    // Save our custom settings when the form is submitted.
    $this->setConfigurationValue('fax_number', $form_state->getValue('fax_number'));
  }

  /**
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) {
    $fax_number = $form_state->getValue('fax_number');

    if (!is_numeric($fax_number)) {
      $form_state->setErrorByName('fax_number', t('Needs to be an integer'));
    }
  }


}
