<?php

namespace Drupal\doctors\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Doctors entities.
 *
 * @ingroup doctors
 */
interface DoctorsInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Doctors name.
   *
   * @return string
   *   Name of the Doctors.
   */
  public function getName();

  /**
   * Sets the Doctors name.
   *
   * @param string $name
   *   The Doctors name.
   *
   * @return \Drupal\doctors\Entity\DoctorsInterface
   *   The called Doctors entity.
   */
  public function setName($name);

  /**
   * Gets the Doctors creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Doctors.
   */
  public function getCreatedTime();

  /**
   * Sets the Doctors creation timestamp.
   *
   * @param int $timestamp
   *   The Doctors creation timestamp.
   *
   * @return \Drupal\doctors\Entity\DoctorsInterface
   *   The called Doctors entity.
   */
  public function setCreatedTime($timestamp);

}
