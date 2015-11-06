<?php

class RoboFile extends \Robo\Tasks
{
    /**
     * @param string $name Whom to say hello
     * @option $v Verbose
     */
    public function hello($name = "World", array $opts = ['v' => true])
    {
        return $this->say("Hello, $name!");
    }

    public function serve()
    {
        return $this->taskServer(8000)->run();
    }


    public function composer($production = false)
    {
        $task = $this->taskComposerInstall();

        if($production) {
            $task->noDev();
            $task->preferDist();
        }

        $task->run();
    }

}
