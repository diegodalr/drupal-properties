<?php

namespace Drupal\isobar_dev\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\taxonomy\Entity\Term;

/**
 * Returns responses for isobar_dev routes.
 */
class IsobarPropertyTypeController extends ControllerBase {

  /**
   * Builds the response.
   *
   * @param \Drupal\taxonomy\Entity\Term $taxonomy_term
   *  The term object.
   *
   * @return mixed
   *  The  response.
   */
  public function build(Term $taxonomy_term) {
    $build['content'] = [
      '#theme' => 'property_type',
      '#id' => $taxonomy_term->id(),
      '#title' => $taxonomy_term->getName(),
      '#description' => $taxonomy_term->getDescription(),
    ];
    return $build;
  }

}
