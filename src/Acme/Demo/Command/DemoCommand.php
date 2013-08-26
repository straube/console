<?php

namespace Acme\Demo\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Simple demo command.
 *
 * A random name can be specified to be displayed.
 *
 * @author Gustavo Straube <gustavo@codekings.com.br>
 * @since 0.1
 */
class DemoCommand extends Command
{

    /**
     * @see \Symfony\Component\Console\Command\Command::configure()
     */
    protected function configure()
    {
        $this
            ->setName('demo')
            ->setDescription('Simple demo command.')
            ->addArgument('name', InputArgument::OPTIONAL, 'Random name.');
    }

    /**
     * @see \Symfony\Component\Console\Command\Command::execute(InputInterface $input, OutputInterface $output)
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<comment>Hello world...</comment>');

        $name = $input->getArgument('name');
        if (!empty($name)) {
            $output->writeln(sprintf('Random name: <info>%s</info>', $name));
        }

        return 0;
    }

}
