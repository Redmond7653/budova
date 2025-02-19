<?php

declare(strict_types=1);

namespace Drupal\budova\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\budova\ApplicationsInterface;
use Drupal\user\EntityOwnerTrait;

/**
 * Defines the applications entity class.
 *
 * @ContentEntityType(
 *   id = "budova_applications",
 *   label = @Translation("Applications"),
 *   label_collection = @Translation("Applicationss"),
 *   label_singular = @Translation("applications"),
 *   label_plural = @Translation("applicationss"),
 *   label_count = @PluralTranslation(
 *     singular = "@count applicationss",
 *     plural = "@count applicationss",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\budova\ApplicationsListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "form" = {
 *       "add" = "Drupal\budova\Form\ApplicationsForm",
 *       "edit" = "Drupal\budova\Form\ApplicationsForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *       "delete-multiple-confirm" = "Drupal\Core\Entity\Form\DeleteMultipleForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\budova\Routing\ApplicationsHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "budova_applications",
 *   admin_permission = "administer budova_applications",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "owner" = "uid",
 *   },
 *   links = {
 *     "collection" = "/admin/content/applications",
 *     "add-form" = "/applications/add",
 *     "canonical" = "/applications/{budova_applications}",
 *     "edit-form" = "/applications/{budova_applications}",
 *     "delete-form" = "/applications/{budova_applications}/delete",
 *     "delete-multiple-form" = "/admin/content/applications/delete-multiple",
 *   },
 *   field_ui_base_route = "entity.budova_applications.settings",
 * )
 */
final class Applications extends ContentEntityBase implements ApplicationsInterface {

  use EntityChangedTrait;
  use EntityOwnerTrait;

  /**
   * {@inheritdoc}
   */
  public function preSave(EntityStorageInterface $storage): void {
    parent::preSave($storage);
    if (!$this->getOwnerId()) {
      // If no owner has been set explicitly, make the anonymous user the owner.
      $this->setOwnerId(0);
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type): array {

    $fields = parent::baseFieldDefinitions($entity_type);


    $fields['status'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Status'))
      ->setDefaultValue(TRUE)
      ->setSetting('on_label', 'Enabled')
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'settings' => [
          'display_label' => FALSE,
        ],
        'weight' => 0,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'type' => 'boolean',
        'label' => 'above',
        'weight' => 0,
        'settings' => [
          'format' => 'enabled-disabled',
        ],
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['uid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Хто створив'))
      ->setSetting('target_type', 'user')
      ->setDefaultValueCallback(self::class . '::getDefaultEntityOwner')
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => 60,
          'placeholder' => '',
        ],
        'weight' => 15,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'author',
        'weight' => 15,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Коли створено'))
      ->setDescription(t('The time that the applications was created.'))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'timestamp',
        'weight' => 20,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('form', [
        'type' => 'datetime_timestamp',
        'weight' => 20,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the applications was last edited.'));

    return $fields;
  }

}
