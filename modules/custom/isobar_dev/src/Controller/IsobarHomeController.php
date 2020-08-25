<?php

namespace Drupal\isobar_dev\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;

/**
 * Returns responses for isobar_dev routes.
 */
class IsobarHomeController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {
    $terms = $this->entityManager()
      ->getStorage('taxonomy_term')
      ->loadTree('property_type');
    $term_items = [];
    foreach ($terms as $term) {
      $term_items[] = Link::createFromRoute($term->name, 'isobar_dev.property_type', [
        'taxonomy_term' => $term->tid,
      ])->toString();
    }

    $build['property_types'] = [
      '#theme' => 'item_list',
      '#list_type' => 'ul',
      '#title' => t('Property types'),
      '#items' => $term_items,
      '#attributes' => ['class' => 'home--property-types'],
      '#wrapper_attributes' => ['class' => 'container'],
    ];
    $build['latest_properties'] = [
      '#type' => 'item',
      '#markup' => $this->t('Latest properties:') . '<div class="home--latest-properties"></div>',
    ];
    $build['latest_properties']['#attached']['library'][] = 'isobar_dev/resources.rest';
    return $build;
  }

}
