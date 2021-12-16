<?php

declare(strict_types=1);

namespace App\Infrastructure\Http;

use App\Applicaton\Contract\LeadServiceInterface;
use App\Applicaton\DTO\CreateLeadRequest;
use App\Applicaton\DTO\FindLeadRequest;
use App\Applicaton\Service\LeadService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class LeadController extends AbstractFOSRestController
{
    private LeadServiceInterface $leadService;

    /**
     * @param  LeadService  $leadService
     */
    public function __construct(LeadServiceInterface $leadService)
    {
        $this->leadService = $leadService;
    }

    /**
     * @Rest\Post("/api/v1/lead")
     * @ParamConverter("createLeadRequest", converter="fos_rest.request_body")
     * @param  CreateLeadRequest  $createLeadRequest
     * @return Response
     */
    public function createLead(CreateLeadRequest $createLeadRequest): Response
    {
        $response = $this->leadService->createAndSendLead($createLeadRequest);
        $view = $this->view($response, 201);
        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/api/v1/lead/{id}")
     * @param  string  $id
     * @return Response
     */
    public function findLead(string $id): Response
    {
        $request = new FindLeadRequest($id);
        $lead = $this->leadService->findLead($request);
        $view = $this->view($lead, 200);
        return $this->handleView($view);
    }

}
