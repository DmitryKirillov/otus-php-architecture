<?php

declare(strict_types=1);

namespace App\Infrastructure\Http;

use App\Infrastructure\Http\Input\CreateLeadRequest;
use App\Infrastructure\Http\Output\CreateLeadResponse;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class LeadController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/api/v1/lead")
     * @ParamConverter("createLeadRequest", converter="fos_rest.request_body")
     * @param  CreateLeadRequest  $createLeadRequest
     * @return CreateLeadResponse
     */
    public function createLead(CreateLeadRequest $createLeadRequest): CreateLeadResponse
    {
        // todo Реальная отправка лида
        return new CreateLeadResponse("1", "");
    }
}
