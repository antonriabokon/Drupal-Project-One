<?php

namespace Drupal\palindrome_checker\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PalindromeCheckerController extends ControllerBase {

  public function check(Request $request) {
    $word = $request->query->get('word');
    $message = '';

    if (!empty($word)) {
      $clean = strtolower(preg_replace('/[^a-z0-9]/', '', $word));
      if ($clean === strrev($clean)) {
        $message = $this->t('✅ "@word" is a palindrome!', ['@word' => $word]);
      } else {
        $message = $this->t('❌ "@word" is NOT a palindrome.', ['@word' => $word]);
      }
    }

    return [
      '#markup' => '
        <form method="get">
          <label>Enter a word:</label>
          <input type="text" name="word" value="' . htmlspecialchars($word ?? '') . '">
          <input type="submit" value="Check">
        </form>
        <p>' . $message . '</p>
      ',
    ];
  }
}
