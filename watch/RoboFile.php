<?php

class RoboFile extends \Robo\Tasks
{
    public function autotest()
    {
        return $this->taskWatch()
                    ->monitor('src',   function() { $this->test(); })
                    ->monitor('tests', function() { $this->test(); })
                    ->run();
    }

    public function test()
    {
        return $this->taskPHPUnit()->run();
    }

    public function autolog()
    {
        $log_event = function() {
            $this->say(sprintf("Something changed and I got %d args!", count(func_get_args())));
        };

        return $this->taskWatch()->monitor(__DIR__, $log_event)->run();
    }
}
