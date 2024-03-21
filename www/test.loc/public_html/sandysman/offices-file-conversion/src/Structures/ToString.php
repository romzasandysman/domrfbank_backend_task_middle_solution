<?php

namespace OfficesFileConversion\Structures;

/**
 * Поддержка преобразования в строку
 */
interface ToString
{
    public function __toString(): string;
}