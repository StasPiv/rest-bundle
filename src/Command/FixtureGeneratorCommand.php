<?php
/**
 * Created by cvident-backend-api.
 * User: ssp
 * Date: 09.09.16
 * Time: 16:37.
 */
namespace NorseDigital\Symfony\RestBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FixtureGeneratorCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('nd:symfony:command:fixtures:generate')
            ->addArgument('pathToFixtures')
            ->setDescription('Generate fixtures');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('nd.symfony.fixtures.generator')
             ->setPathToFixtures($input->getArgument('pathToFixtures'))
             ->generateAllFixtures();

        $output->writeln('Fixtures have been generated');
    }
}
