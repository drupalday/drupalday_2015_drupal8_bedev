<?php
/**
 * Created by PhpStorm.
 * User: adrianocori
 * Date: 05/12/15
 * Time: 15:51
 */

namespace Drupal\dday2015\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

/**
 * Class NodeGeneratorForm
 *
 * @package Drupal\dday2015\Form
 */
class NodeGeneratorForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'node_generator_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#required' => TRUE,
    );

    $form['body'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Body'),
      '#required' => TRUE,
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Generate Node'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $node = Node::create([
      'title' => $form_state->getValue('title'),
      'body' => $form_state->getValue('body'),
      'type' => 'article',
      'uid' => \Drupal::currentUser()->id(),
    ]);

    $node->save();
    $form_state->setRedirectUrl($node->toUrl());
  }
}
