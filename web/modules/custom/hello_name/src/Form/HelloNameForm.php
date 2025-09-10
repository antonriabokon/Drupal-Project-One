<?php

namespace Drupal\hello_name\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class HelloNameForm extends FormBase {
    public function getFormId() {
        return 'hello_name_form';
    }
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Your Name'),
            '#required' => TRUE,
        ];
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
        ];
        return $form;
    }
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $name = $form_state->getValue('name');
        \Drupal::messenger()->addMessage($this->t('Hello, @name!', ['@name' => $name]));
    }
}