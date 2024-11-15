<?php

declare(strict_types=1);

namespace Drupal\budpersonal;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a budcustomers entity type.
 */
interface BudCustomersInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
