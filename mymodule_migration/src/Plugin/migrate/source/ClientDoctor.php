<?php
namespace Drupal\mymodule_migration\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Import example for a doctor entity with client source table .
 *
 * @MigrateSource(
 *   id = "migrate_doctor_client",
 * )
 */
class ClientDoctor extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Source data is queried from 'curling_games' table.
    $query = $this->select('clients_test', 'u')
      ->fields('u', [
        'id',
        'email',
        'name',
        'status',
        'api_token'
      ]);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('id' ),
      'email'   => $this->t('email' ),
      'name'   => $this->t('name' ),
      'status'   => $this->t('status' ),
      'api_token'   => $this->t('api_token' ),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'u',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {

    return parent::prepareRow($row);
  }
}
