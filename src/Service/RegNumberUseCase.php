<?php


namespace App\Service;


use App\Interfaces\QuoteUseCase;
use App\Interfaces\RatingFactorInterface;
use App\Repository\AbiCodeRatingRepository;

/**
 * Class RegNumberUseCase
 * @package App\Service
 */
class RegNumberUseCase implements QuoteUseCase
{
    /**
     * @var AbiCodeLookup
     */
    private $abiCodeLookup;
    /**
     * @var AbiCodeRatingRepository
     */
    private $abiCodeRatingRepository;


    /**
     * regNumberUseCase constructor.
     * @param AbiCodeLookup $abiCodeLookup
     */
    public function __construct(AbiCodeLookup $abiCodeLookup, AbiCodeRatingRepository $abiCodeRatingRepository)
    {
        $this->abiCodeLookup = $abiCodeLookup;
        $this->abiCodeRatingRepository = $abiCodeRatingRepository;
    }

    /**
     * @return RatingFactorInterface|null
     */
    public function handle(): ?RatingFactorInterface
    {
        $response = $this->abiCodeLookup->getResponse();
        $content = json_decode($response->getContent(),true);
        $ratingFactor = $this->abiCodeRatingRepository->findByAbiCode($content["abi_code"]);
        return $ratingFactor;
    }

}