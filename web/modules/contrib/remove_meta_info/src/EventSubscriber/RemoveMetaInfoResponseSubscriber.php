<?php

namespace Drupal\remove_meta_info\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Response subscriber to remove thes X-Generator header tag.
 */
class RemoveMetaInfoResponseSubscriber implements EventSubscriberInterface
{

  /**
   * Remove extra X-Generator header on successful responses.
   *
   * @param Symfony\Component\HttpKernel\Event\ResponseEvent $event
   *   The event to process.
   */
  public function HeadersManagerOptions(ResponseEvent $event)
  {
    $response = $event->getResponse();
    $response->headers->remove('X-Generator');
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents()
  {
    $events[KernelEvents::RESPONSE][] = ['HeadersManagerOptions', -10];
    return $events;
  }
}
