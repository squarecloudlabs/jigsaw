<?php

namespace TightenCo\Jigsaw\Console;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;
use TightenCo\Jigsaw\File\ConfigFile;
use TightenCo\Jigsaw\File\TemporaryFilesystem;
use TightenCo\Jigsaw\Jigsaw;
use TightenCo\Jigsaw\PathResolvers\PrettyOutputPathResolver;

class DeployCommand extends Command
{
    private $app;

    private $consoleOutput;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->consoleOutput = $app->consoleOutput;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('deploy')
            ->setDescription('Deploy your site.')
            ->addArgument('target',
                InputArgument::OPTIONAL,
                'Where should we deploy your site?',
                'ghpages')
            ->addOption('environment',
                'e',
                InputArgument::OPTIONAL,
                'What environment should we deploy?',
                'production');
//            ->addOption('watch', 'w', InputOption::VALUE_NONE, 'Should watch for file changes and rebuild?')
//            ->addOption('cache', 'c', InputOption::VALUE_OPTIONAL, 'Should a cache be used when building the site?', 'false');
        ;
    }


    protected function fire()
    {
        // set up things
        return $this->deploy();
    }

    private function deploy()
    {
         $startTime = microtime(true);

    }
}
