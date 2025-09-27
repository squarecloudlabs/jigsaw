<?php

namespace TightenCo\Jigsaw\Console;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Throwable;
//use TightenCo\Jigsaw\File\ConfigFile;
//use TightenCo\Jigsaw\File\TemporaryFilesystem;
//use TightenCo\Jigsaw\Jigsaw;
//use TightenCo\Jigsaw\PathResolvers\PrettyOutputPathResolver;

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
                InputArgument::REQUIRED,
                'Where should we deploy your site?',
                'ghpages')
            ->addOption('environment',
                'e',
                InputOption::VALUE_OPTIONAL,
                'What environment should we deploy?',
                'production');
    }

    protected function fire()
    {
        $target = $this->input->getOption('target');
        $environment = $this->input->getOption('environment');

        $this->console->info("Starting to deploy your {$environment} site to {$target}");

        return $this->deploy();
    }

    private function deploy()
    {


    }
}
