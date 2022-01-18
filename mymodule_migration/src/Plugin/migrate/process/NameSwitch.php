<?php
namespace Drupal\mymodule_migration\Plugin\migrate\process;

use Drupal\migrate\MigrateException;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * @MigrateProcessPlugin(
 *   id = "name_switch",
 *   handle_multiples = FALSE
 * )
 */
class NameSwitch extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    if (!isset($this->configuration['token'])) {
      throw new MigrateException('No "token" value specified for the name_switch plugin.');
    }

    return $this->process($value);

  }

  /**
   * Concat value from source to name parameter in our configuration
   * @param string $value
   * @return string
   */
  protected function process(string $value) : string {

    $concat = $value.$this->configuration['token'];
    return $concat;
  }

}
