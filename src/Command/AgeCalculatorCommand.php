<?php

namespace App\Command;

use App\AgeCalculator\AgeCalculatorManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AgeCalculatorCommand extends Command
{
    protected static $defaultName = 'app:age:calculator';
    
    private $ageCalculatorManager;

    /**
     * AgeCalculatorCommand constructor.
     */
    public function __construct(AgeCalculatorManager $ageCalculatorManager)
    {
        $this->ageCalculatorManager = $ageCalculatorManager;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription("Returns person is an adult or not")
            ->addArgument('birthDate', InputArgument::REQUIRED, 'Birth date  (ex. 1985-03-25)')
        ;
    }
    
    

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $birthDateString = $input->getArgument('birthDate');
        
        $io->note(sprintf('You passed an argument: %s', $birthDateString));

        //calculate stage
        
        $growthStage = $this->ageCalculatorManager->adultOrNot($birthDateString);
        $io->success(sprintf('You are: %s', $growthStage));
            
    }
}
