<?php
namespace Sellastica\Events;

class EventDispatcher
{
	/** @var \Contributte\EventDispatcher\EventDispatcher */
	private $eventDispatcher;
	/** @var array */
	private $events = [];


	/**
	 * @param \Contributte\EventDispatcher\EventDispatcher $eventDispatcher
	 */
	public function __construct(\Contributte\EventDispatcher\EventDispatcher $eventDispatcher)
	{
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * @param string $eventName
	 * @param \Symfony\Component\EventDispatcher\Event $event
	 */
	public function dispatchEvent(string $eventName, \Symfony\Component\EventDispatcher\Event $event = null): void
	{
		$this->events[$eventName][] = $event;
		$this->eventDispatcher->dispatch($eventName, $event);
	}

	/**
	 * Returns all events called durring application life cycle
	 * @return array
	 */
	public function getEvents(): array
	{
		return $this->events;
	}
}