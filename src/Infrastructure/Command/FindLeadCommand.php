<?php

declare(strict_types=1);

namespace App\Infrastructure\Command;

use App\Applicaton\Contract\FindLeadInterface;
use App\Applicaton\Contract\LeadServiceInterface;
use App\Applicaton\DTO\FindLeadRequest;
use App\Applicaton\Service\LeadService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FindLeadCommand extends Command
{
    private FindLeadInterface $findLeadService;

    /**
     * @param  LeadService  $leadService
     */
    public function __construct(FindLeadInterface $leadService)
    {
        $this->findLeadService = $leadService;
        parent::__construct();
    }

    protected static $defaultName = 'app:lead:find';

    protected function configure()
    {
        $this->addArgument('id', InputArgument::REQUIRED, 'The Lead ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $findLeadRequest = new FindLeadRequest($id);
        $findLeadResponse = $this->findLeadService->findLead($findLeadRequest);

        $output->writeln($findLeadResponse->getName());
        $output->writeln($findLeadResponse->getPhone());
        $output->writeln($findLeadResponse->getDescription());

        return Command::SUCCESS;
    }

}
