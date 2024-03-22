<?php

namespace OfficesFileConversion\BaseInterfaces;

/**
 * Интерфейс для получения полного имени
 */
interface GetFullName
{
    /**
     * Получаем полное имя
     * @return string
     */
    public function getFullName(): string;
}