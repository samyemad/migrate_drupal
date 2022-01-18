<?php

namespace Drupal\doctors\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Doctors entity.
 *
 * @ingroup doctors
 *
 * @ContentEntityType(
 *   id = "doctors",
 *   label = @Translation("Doctors"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\doctors\DoctorsListBuilder",
 *     "views_data" = "Drupal\doctors\Entity\DoctorsViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\doctors\Form\DoctorsForm",
 *       "add" = "Drupal\doctors\Form\DoctorsForm",
 *       "edit" = "Drupal\doctors\Form\DoctorsForm",
 *       "delete" = "Drupal\doctors\Form\DoctorsDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\doctors\DoctorsHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\doctors\DoctorsAccessControlHandler",
 *   },
 *   base_table = "doctors",
 *   translatable = FALSE,
 *   admin_permission = "administer doctors entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *     "email" = "email"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/doctors/{doctors}",
 *     "add-form" = "/admin/structure/doctors/add",
 *     "edit-form" = "/admin/structure/doctors/{doctors}/edit",
 *     "delete-form" = "/admin/structure/doctors/{doctors}/delete",
 *     "collection" = "/admin/structure/doctors",
 *   },
 *   field_ui_base_route = "doctors.settings"
 * )
 */
class Doctors extends ContentEntityBase implements DoctorsInterface {

  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getEmail() {
    return $this->get('email')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setEmail($email) {
    $this->set('email', $email);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Doctors entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['status']->setDescription(t('A boolean indicating whether the Doctors is published.'))
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => -3,
      ]);


    $fields['email'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Email'))
      ->setDescription(t('Email Address.'))
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setRequired(TRUE)
      ->setTranslatable(false)
      ->setSettings(array(
        'default_value' => '',
        'max_length' => 255,
      ));

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
