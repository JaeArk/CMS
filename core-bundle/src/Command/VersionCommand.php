<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Outputs the Contao version.
 *
 * @author Leo Feyer <https://github.com/leofeyer>
 *
 * @deprecated Using the contao:version command has been deprecated and will no longer work in Contao 5.0; use
 *             "composer show contao/core-bundle | grep versions | awk '{ print $4 }'" instead
 */
class VersionCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('contao:version')
            ->setDescription('Outputs the contao/core-bundle version (deprecated).')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $packages = $this->getContainer()->getParameter('kernel.packages');

        if (isset($packages['contao/core-bundle'])) {
            $output->writeln($packages['contao/core-bundle']);
        } else {
            $output->writeln($packages['contao/contao']);
        }

        return 0;
    }
}
