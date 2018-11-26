<?php

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AgeCalculatorCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'app:age:calculator';

    protected function configure()
    {
        $this
            ->setDescription("Returns person is an adult or not")
            ->addArgument('birthDate', InputArgument::REQUIRED, 'Birth date  (ex. 1985-03-25)')
          ->addOption('adult', null, InputOption::VALUE_NONE, 'If you would enter --adult I would say you are adult or not!')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $birthDateString = $input->getArgument('birthDate');

        if ($input->getOption('adult'))
        {
            /** @var \App\AgeCalculator\AgeCalculatorManager $ageCalculatorManager */
            $ageCalculatorManager = $this->getContainer()->get('app.age_calculator.age_calculator_manager');

            $age = $ageCalculatorManager->getAge($birthDateString);
            $io->note(sprintf('I am %d years old', $age));
            $adult= $ageCalculatorManager->isAdult($age);

            if ($adult){
                $io->success(sprintf('Am I and adult ?  ----- YES !!!'));
            } else {
                $io->warning(sprintf('Am I and adult ?  ----- NO !!!'));
            }
        }
    }
}
