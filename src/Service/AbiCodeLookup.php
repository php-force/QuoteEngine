<?php
namespace App\Service;

use GuzzleHttp\ClientInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class AbiCodeLookup
 * @package App\Service
 */
class AbiCodeLookup
{
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * AbiCodeLookup constructor.
     * @param ClientInterface $client
     * @param RequestStack $requestStack
     */
    public function __construct(ClientInterface $client, RequestStack $requestStack)
    {
        $this->client = $client;
        $this->requestStack = $requestStack;
    }

    /**
     * @return JsonResponse
     */
    public static function getResponse(): JsonResponse
    {
//        $regNo = $this->requestStack->getCurrentRequest()->get('regNo');
        // handle request to third party api to get response t
        // hat would include API code
        $response = new JsonResponse(["abi_code"=>"22529902"],200);
        return $response;
    }
}