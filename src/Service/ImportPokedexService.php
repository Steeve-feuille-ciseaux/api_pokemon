<?php

namespace App\Service;

use App\Entity\Pokedex;
use App\Repository\PokedexRepository;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportPokedexService
{
    public function __construct(private PokedexRepository $pokedexRepository,
                                private EntityManagerInterface $em)
    {

    }
    public function importPokedex(SymfonyStyle $io): void
    {
        $io->title('Importation des pokedexs');

        $pokedexs = $this->readCsvFile();

        $io->progressStart(count($pokedexs));

        foreach ($pokedexs as $arrayPokedex){
            $io->progressAdvance();
            $pokedex = $this->createUpdatePokedex($arrayPokedex);
            $this->em->persist($pokedex);
        }

        $this->em->flush();

        $io->progressFinish();

        $io->success('Importation terminée');
    }

    private function readCsvFile(): Reader
    {
        $csv = Reader::createFromPath('%kernel.root_dir%/../import/pokedex.csv','r');
        $csv->setHeaderOffset(0);

        return $csv;
    }
    private function createUpdatePokedex(array $arrayPokedex): Pokedex
    {
        $pokedex = $this->pokedexRepository->findOneBy(['number' => $arrayPokedex['Number']]);

        if(!$pokedex) {
            $pokedex = new Pokedex();
        }

        $pokedex->setNumber($arrayPokedex['Number'])
                ->setName($arrayPokedex['Name'])
                ->setType1($arrayPokedex['Type 1'])
                ->setType2($arrayPokedex['Type 2'])
                ->setTotal($arrayPokedex['Total'])
                ->setHp($arrayPokedex['HP'])
                ->setAttack($arrayPokedex['Attack'])
                ->setSpatk($arrayPokedex['Sp. Atk'])
                ->setSpdef($arrayPokedex['Sp. Def'])
                ->setSpeed($arrayPokedex['Speed'])
                ->setGeneration($arrayPokedex['Generation'])
                ->setLegendary($arrayPokedex['Legendary'])
                ->setDefense($arrayPokedex['Defense']);

            return $pokedex;
    }
}