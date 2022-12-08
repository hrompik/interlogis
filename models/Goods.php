<?php

namespace models;

class Goods
{
    private string $_sourceKladr;
    private string $_targetKladr;
    private float $_weight;

    private string $_error = '';

    public function load($params): void
    {
        $this->_sourceKladr = strval($params['sourceKladr'] ?? null);
        $this->_targetKladr = strval($params['targetKladr'] ?? null);
        $this->_weight = floatval($params['weight'] ?? null);
    }

    public function validate(): bool
    {
        $error = '';
        if (empty($sourceKladr)) {
            $error .= 'Не ввели Склад отправления<br>' . PHP_EOL;
        }
        if (empty($targetKladr)) {
            $error .= 'Не ввели Склад Получения<br>' . PHP_EOL;
        }
        if (empty($weight)) {
            $error .= 'Не ввели вес<br>' . PHP_EOL;
        }
        if (empty($error)) {
            $this->_error = $error;
            return false;
        }
        return true;
    }

    public function getError(): string
    {
        return $this->_error;
    }

    public function getAttributes(): array
    {
        return [
            'sourceKladr' => $this->_sourceKladr,
            'targetKladr' => $this->_targetKladr,
            'weight' => $this->_weight,
        ];
    }
}
