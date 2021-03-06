<?php


namespace SunValley\TaskManager;


use React\EventLoop\LoopInterface;
use React\Promise\PromiseInterface;

interface TaskStorageInterface
{

    /**
     * Get the loop for task queue
     *
     * @return LoopInterface
     */
    public function getLoop(): LoopInterface;
    
    /**
     * Find and return the task from storage by its identifier and returns a promise for the result
     *
     * @param string $taskId
     *
     * @return PromiseInterface<ProgressReporter>
     */
    public function findById(string $taskId): PromiseInterface;


    /**
     * returns a promise resolving into an array ProgressReporter instances
     * for all the tasks in the storage which are currently in any of the states
     *
     * @parameter string[] $states
     * @return PromiseInterface<array>
     *
     */
    public function findAllInStates(array $states): PromiseInterface;


    /**
     * Find and return the count of total tasks in this storage
     *
     * @return PromiseInterface<int>
     */
    public function count(): PromiseInterface;

    /**
     * Update the given task to this storage
     *
     * @param ProgressReporter $reporter
     *
     * @return PromiseInterface
     */
    public function update(ProgressReporter $reporter): PromiseInterface;

    /**
     * Insert given task to the storage
     * 
     * @param TaskInterface $task
     *
     * @return PromiseInterface
     */
    public function insert(TaskInterface $task): PromiseInterface;

    /**
     * Mark task as cancelled
     *
     * @param TaskInterface $task
     *
     * @return PromiseInterface
     */
    public function cancel(TaskInterface $task): PromiseInterface;

    /**
     * Delete the given task from this storage
     *
     * @param string $taskId
     *
     * @return PromiseInterface
     */
    public function delete(string $taskId): PromiseInterface;
}