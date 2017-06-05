<?php

namespace CliBundle\Command;

use ApiBundle\Entity\Gif;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GifGetTagsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gif:get-tags')
            ->setDescription('Get the tags in Json format for the specified gif')
            ->addArgument('gif-id', InputArgument::REQUIRED, 'Gif id, is full numeric')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('gif-id');
        /** @var \Doctrine\Bundle\DoctrineBundle\Registry $doctrine */
        $doctrine = $this->getContainer()->get('doctrine');
        /** @var Gif[] $gif */
        $gif = $doctrine->getManager()->getRepository('ApiBundle:Gif')->findByFileName($filename);
        if($gif != null && count($gif) > 0) {
            $output->writeln(json_encode($gif[0]->getTagScores()));
            return;
        }
        $output->writeln("[]");
    }

}
