<?php

declare(strict_types=1);

namespace Drupal\budova;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining an applications entity type.
 */
interface ApplicationsInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
