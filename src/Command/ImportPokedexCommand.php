<?php

namespace App\Command;

use App\Service\ImportPokedexService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'app:import-pokedex')]
class ImportPokedexCommand extends Command
{
    public function __construct(private ImportPokedexService $importPokedexService,)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $this->importPokedexService->importPokedex($io);

        return Command::SUCCESS;
    }

}