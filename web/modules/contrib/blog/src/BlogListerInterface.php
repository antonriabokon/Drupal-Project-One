<?php

namespace Drupal\blog;

use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\user\UserInterface;

/**
 * Provides an interface defining a blog lister.
 */
interface BlogListerInterface {

  /**
   * Returns a title for a user blog.
   */
  public function userBlogTitle(UserInterface $user) : TranslatableMarkup;

}
