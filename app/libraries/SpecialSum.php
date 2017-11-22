<?php

namespace app\libraries;

class SpecialSumException extends \Exception
{
    public static function isNegative($i)
    {
        return new static(
            sprintf('Negative', $i)
        );
    }
}

class SpecialSum
{
    private $k;
    private $n;
    private $data;

    /**
     * SpecialSum constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param $k
     */
    public function setK($k)
    {
        $this->checkisPositive($k);
        $this->k = $k;
    }

    /**
     * @param $n
     */
    public function setN($n)
    {
        $this->checkIsPositive($n);
        $this->n = $n;
    }

    /**
     * @param int $i
     * @throws SpecialSumException
     */
    private function checkIsPositive($i)
    {
        if (is_numeric($i) and $i < 0) {
            throw SpecialSumException::isNegative($i);
        }
    }

    /**
     * @return static
     */
    public static function start()
    {
        return new static();
    }

    /**
     * @param $k
     * @param $n
     * @return string
     */
    public function calculate($k, $n)
    {
        $this->setK($k);
        $this->setN($n);
        $this->data = array();
        $this->calculating($this->k, $this->n);
        for ($kk = 0; $kk <= $this->k - 1; $kk++) {
            for ($nn = 1; $nn <= $this->n; $nn++) {
                if (!array_key_exists($kk . ' @ ' . $nn, $this->data)) {
                    $this->data[$kk . ' @ ' . $nn] = $this->calculating($kk, $nn);
                }
            }
        }
        $sum = 0;
        for ($i = 1; $i <= $this->n; $i++) {
            $sum += $this->data[($this->k - 1) . ' @ ' . $i];
        }
        return number_format($sum, 0, '', '');
    }

    /**
     * @param $k
     * @param $n
     * @return float|int
     */
    private function calculating($k, $n)
    {
        if ($k == 0) {
            return $n;
        }
        if ($n == 1) {
            return 1;
        }
        if ($k == 1) {
            return (array_sum(range(1, $n)));
        }
        $sum = 0;
        for ($i = 1; $i <= $n; $i++) {
            if (array_key_exists(($k - 1) . ' @ ' . ($i), $this->data)) {
                $sum += $this->data[($k - 1) . ' @ ' . ($i)];
            }
        }
        return $sum;
    }

}