<?php

class RoboFile extends \Robo\Tasks
{
    private static $sync_paths = ['app', 'vendor', 'public'];

    /**
     * Sync the app to a path or remote server
     *
     * @param array $targets List of paths or user@host:/path
     * @param array $opts
     * @option $dry-run Fake it.
     */
    public function sync(array $targets, array $opts = ['dry-run' => true])
    {
        $sync = $this->taskParallelExec();

        foreach($targets as $target)
        {
            $sync->process($this->taskAppSync($target, $opts));
        }

        $sync->run();
    }

    private function taskAppSync($target, array $opts)
    {
        list($path, $host, $user) = $this->parseTarget($target);

        $path = rtrim($path, '/') . '/';

        $task = $this->taskRsync()
            ->fromPath(implode(' ', static::$sync_paths))
            ->toPath($path)
            ->compress()
            ->stats()
            ->delete()
            ->humanReadable()
            ->arg('--include=.gitkeep')
            ->excludeVcs()
            ->exclude('/app/storage/logs/*')
            ->exclude('/vendor/bin/')
            ->recursive();

        if ($host) {
            $task->toHost($host);
        }

        if ($user) {
            $task->toUser($user);
        }

        if ($opts['dry-run']) {
            $task->dryRun();
        }

        if ($opts['verbose']) {
            $task->verbose();
        }

        return $task;
    }
}
