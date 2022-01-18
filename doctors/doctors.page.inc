<?php

/**
 * @file
 * Contains doctors.page.inc.
 *
 * Page callback for Doctors entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Doctors templates.
 *
 * Default template: doctors.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_doctors(array &$variables) {
  // Fetch Doctors Entity Object.
  $doctors = $variables['elements']['#doctors'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
