<?php

declare(strict_types=1);

namespace App\Applicaton\UseCase;

use App\Applicaton\Contract\FindLeadInterface;
use App\Applicaton\DTO\FindLeadRequest;
use App\Applicaton\DTO\FindLeadResponse;
use App\Domain\Contract\LeadRepositoryInterface;

/**
 * Use Case: поиск лида.
 */
class FindLeadUseCase implements FindLeadInterface
{
    /** @var LeadRepositoryInterface */
    private LeadRepositoryInterface $leadRepository;

    /**
     * @param  LeadRepositoryInterface  $leadRepository
     */
    public function __construct(LeadRepositoryInterface $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }

    /**
     * @inheritDoc
     */
    public function findLead(FindLeadRequest $findLeadRequest): FindLeadResponse
    {
        $lead = $this->leadRepository->findLeadById($findLeadRequest->getId());
        // todo Обработка ситуации, когда лид не найден
        return new FindLeadResponse(
            $lead->getName()->getValue(),
            $lead->getPhone()->getValue(),
            $lead->getDescription()
        );
    }
}
