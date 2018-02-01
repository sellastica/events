<?php
namespace Sellastica\Events;

class EventDispatcher
{
	/** @var \Bazo\Events\EventDispatcher */
	private $eventDispatcher;
	/** @var array */
	private $events = [];


	/**
	 * @param \Bazo\Events\EventDispatcher $eventDispatcher
	 */
	public function __construct(\Bazo\Events\EventDispatcher $eventDispatcher)
	{
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * @param string $eventName
	 * @param array $eventArgs
	 */
	public function dispatchEvent(string $eventName, array $eventArgs = []): void
	{
		$this->events[$eventName][] = $eventArgs;
		$this->eventDispatcher->dispatchEvent($eventName, $eventArgs);
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