<?php

declare(strict_types=1);

namespace Drupal\budova;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining an events entity type.
 */
interface EventsInterface extends ContentEntityInterface, EntityOwnerInterface {

}
