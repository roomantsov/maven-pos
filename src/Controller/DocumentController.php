<?php

namespace App\Controller;

use App\Service\DocumentBuilderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DocumentController extends AbstractController
{
    /**
     * @Route("/get_document/{orderId}", name="getDocumentAction", methods={"GET"})
     * @param string $orderId
     * @param DocumentBuilderService $documentBuilderService
     * @return Response
     */
    public function getDocumentAction(
        DocumentBuilderService $documentBuilderService,
        string $orderId
    ): Response
    {
        return new Response(
            $documentBuilderService->prepareOrderRequestData($orderId),
            Response::HTTP_OK,
            [
                'Content-Type'        => 'file/xml',
                'Content-Disposition' => 'inline; filename="PurchaseOrder.xml"'
            ]
        );
    }
}