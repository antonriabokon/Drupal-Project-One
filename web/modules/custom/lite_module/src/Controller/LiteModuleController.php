<?php

declare(strict_types=1);

namespace Drupal\lite_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Lite module routes.
 */
final class LiteModuleController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(): array {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
