<?php

/**
 * @file
 * Contains \Drupal\dday2015\Plugin\Block\DDay2015Block.
 */

namespace Drupal\dday2015\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'DDay2015Block' block.
 *
 * @Block(
 *  id = "dday2015block",
 *  admin_label = @Translation("DrupalDay 2015 Training"),
 * )
 */
class DDay2015Block extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $builder = \Drupal::formBuilder();
    $form = $builder->getForm('\Drupal\dday2015\Form\NodeGeneratorForm');

    $build['form'] = $form;

    return $build;
  }

}
