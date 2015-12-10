<?php
/**
 * Created by PhpStorm.
 * User: adrianocori
 * Date: 05/12/15
 * Time: 13:22
 */

namespace Drupal\dday2015\Controller;

/**
 * Class Dday2015Controller
 *
 * @package Drupal\dday2015\Controller
 */
class Dday2015Controller {

  /**
   * @return array
   */
  public function testPageCallback() {
    $config = \Drupal::config('dday2015.dday2015');

    $tags = array('config:dday2015.dday2015');
    $element['content'] = array(
      '#markup' => $config->get('body'),
      '#cache' => array(
        'tags' => $tags,
      ),
    );

    return $element;
  }
}
