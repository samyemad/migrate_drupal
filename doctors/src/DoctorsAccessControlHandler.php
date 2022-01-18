<?php

namespace Drupal\doctors;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Doctors entity.
 *
 * @see \Drupal\doctors\Entity\Doctors.
 */
class DoctorsAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\doctors\Entity\DoctorsInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished doctors entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published doctors entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit doctors entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete doctors entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add doctors entities');
  }


}
