Outline
=======

- Written by Codeception guys
- It is a task runner, related to phing, make, grunt, gulp, ant, capistrano
- Easy to install
    - composer global require codegyre/robo
    - wget http://robo.li/robo.phar
    - curl -OL http://robo.li/robo.phar

- Easy To start
    - robo init
    - $this->say("Hello, World!");
    - How is this better than <?php echo "Hello, World!\n"
    - Then add @param for name (still not much better)
    - Then add basic help (ah, better)

- But I can do this with artisan, symfony console, the shell
    - Use robo to bootstrap
    - Some projects don't use a framework with a console
        - better than shell or make due to common language and built-in helpers
    - run ci commands
    - in places where the application commands don't make sense.

- Robo provides nice things:
    - Tasks
        - Run a php server: $this->taskServer(8000)->run();
        - Show documentation: Development Tasks, PhpServer, add background(), dir()
        - robo setup
            - $task = $this->taskComposerInstall()
            - if ($production) $task->noDev()->optimizeAutoloader()
            - $task->run();
        - Task Stacks
            - Show docs for filesystem Stacks
    - Parallel exec
        - Show docs
        - Show real world example.
    - Watch
        - Show code
        - Demo autolog, show easy source nav

- We use it for
    - repository setup (permissions, etc)
    - asset building
    - refresh
    - ci jobs
        - test in docker container
        - deploy

- Just another tool in your belt
