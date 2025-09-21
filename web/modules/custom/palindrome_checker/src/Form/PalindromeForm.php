<?php

namespace Drupal\palindrome_checker\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class PalindromeForm extends FormBase {

  public function getFormId(): string {
    return 'palindrome_checker_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['word'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter a word'),
      '#required' => TRUE,
    ];

    $form['actions'] = ['#type' => 'actions'];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Check'),
    ];

    // If we already have a result, show it.
    if ($result = $form_state->get('pal_result')) {
      $form['result'] = [
        '#type' => 'markup',
        '#markup' => '<p>' . $result . '</p>',
      ];
    }

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $word = $form_state->getValue('word');
    $clean = strtolower(preg_replace('/[^a-z0-9]/', '', $word));
    $is_pal = ($clean === strrev($clean));

    $message = $is_pal
      ? $this->t('✅ "@word" is a palindrome!', ['@word' => $word])
      : $this->t('❌ "@word" is NOT a palindrome.', ['@word' => $word]);

    // Store result to display after submit.
    $form_state->set('pal_result', $message);
    // Rebuild so result appears without redirect.
    $form_state->setRebuild();
  }

}
