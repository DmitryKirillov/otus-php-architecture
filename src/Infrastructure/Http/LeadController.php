<?php

declare(strict_types=1);

namespace App\Infrastructure\Http;

use App\Applicaton\Contract\CreateLeadInterface;
use App\Applicaton\Contract\FindLeadInterface;
use App\Applicaton\DTO\CreateLeadRequest;
use App\Applicaton\DTO\FindLeadRequest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class LeadController extends AbstractFOSRestController
{
    private CreateLeadInterface $createLeadService;
    private FindLeadInterface $findLeadService;

    /**
     * @param  CreateLeadInterface  $createLeadService
     * @param  FindLeadInterface  $findeLeadService
     */
    public function __construct(CreateLeadInterface $createLeadService, FindLeadInterface $findeLeadService)
    {
        $this->createLeadService = $createLeadService;
        $this->findLeadService = $findeLeadService;
    }

    /**
     * @Rest\Post("/api/v1/lead")
     * @ParamConverter("createLeadRequest", converter="fos_rest.request_body")
     * @param  CreateLeadRequest  $createLeadRequest
     * @return Response
     */
    public function createLead(CreateLeadRequest $createLeadRequest): Response
    {
        $response = $this->createLeadService->createAndSendLead($createLeadRequest);
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
        $findLeadRequest = new FindLeadRequest($id);
        $findLeadResponse = $this->findLeadService->findLead($findLeadRequest);
        $view = $this->view($findLeadResponse, 200);
        return $this->handleView($view);
    }

}
