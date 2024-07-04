<?php

namespace SandysMan\OfficesFileConversion\Structures\Types;

/**
 * Структура офиса преобразующая его в формат json
 */
class Json extends AbstractBase implements \JsonSerializable
{
    public function jsonSerialize(): mixed
    {
       return [
           "type" => $this->getType(),
           "id" => $this->getId(),
           "attributes" => [
               "name" => $this->getName(),
               "address" => [
                   "city" => $this->getAddressParser()->getCityName(),
                   "street" => $this->getAddressParser()->getShortFormatedStreetName(),
                   "house" => $this->getAddressParser()->getHouseNumber(),
                   "officeOrApartment" => $this->getAddressParser()->getOfficeNumber() . $this->getAddressParser()->getApartmentNumber()
               ],
               "phone" => [
                   "countryNumber" => $this->getPhoneParser()->getCountryNumber(),
                   "official" => $this->getPhoneParser()->getOfficialNumber()
               ]
           ]
       ];
    }
}