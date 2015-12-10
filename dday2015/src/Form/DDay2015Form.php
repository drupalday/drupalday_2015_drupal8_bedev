<?php

/**
 * @file
 * Contains \Drupal\dday2015\Form\DDay2015Form.
 */

namespace Drupal\dday2015\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DDay2015Form.
 *
 * @package Drupal\dday2015\Form
 */
class DDay2015Form extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'dday2015.dday2015'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dday2015_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('dday2015.dday2015');
    $form['body'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Body'),
      '#description' => $this->t('Questo è il body'),
      '#default_value' => $config->get('body'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('dday2015.dday2015')
      ->set('body', $form_state->getValue('body'))
      ->save();
  }

}
