<?php

namespace OfficesFileConversion\Structures\Types;

/**
 * Поддержка преобразования в строку
 */
interface ToString
{
    public function __toString(): string;
}