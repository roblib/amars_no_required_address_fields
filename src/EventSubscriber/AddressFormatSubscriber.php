<?php
namespace Drupal\amars_no_required_address_fields\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\address\Event\AddressEvents;

class AddressFormatSubscriber implements EventSubscriberInterface {

  static function getSubscribedEvents() {
    $events[AddressEvents::ADDRESS_FORMAT][] = array('onGetDefinition', 0);
    return $events;
  }

  public function onGetDefinition($event) {
    $definition = $event->getDefinition();

	  // Make city (locality) field required.
    //$definition['required_fields'] = ['administrativeArea'];

	  // No required Address fields.
	  unset($definition['required_fields']);
        
	  $event->setDefinition($definition);
  }
}
