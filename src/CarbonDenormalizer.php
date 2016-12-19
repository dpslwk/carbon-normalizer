<?php


namespace Brainrepo\CarbonNormalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Carbon\Carbon;

class CarbonDenormalizer implements DenormalizerInterface
{
    /**
     * @inheritdoc
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (null === $data) {
            return null;
        }
        return new Carbon($data);
    }
    /**
     * @inheritdoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return Carbon::class === $type
        && $this->isValid($data)
            ;
    }
    private function isValid($data)
    {
        return $data === null || is_string($data);
    }
}