<?php
/**
 * Created by PhpStorm.
 * User: xmat
 * Date: 28.3.19
 * Time: 11:51
 */

namespace MatejKucera\NumberSeriesGenerator;


abstract class AbstractGenerator
{
    private $_rangeFrom;
    private $_rangeTo;

    private $_stepFrom;
    private $_stepTo;

    private $_volatility;
    private $_smoothness;

    protected function __construct(int $rangeFrom, int $rangeTo, int $stepFrom, int $stepTo, float $volatility, int $smoothness) {
        $this->_rangeFrom   = $rangeFrom;
        $this->_rangeTo     = $rangeTo;
        $this->_stepFrom    = $stepFrom;
        $this->_stepTo      = $stepTo;
        $this->_volatility = $volatility;
        $this->_smoothness = $smoothness;
    }

    public function getRangeFrom() {
        return $this->_rangeFrom;
    }

    public function getRangeTo() {
        return $this->_rangeTo;
    }

    public function getStepFrom() {
        return $this->_stepFrom;
    }

    public function getStepTo() {
        return $this->_stepTo;
    }

    public function getVolatility() {
        return $this->_volatility;
    }

    public function getSmoothness() {
        return $this->_smoothness;
    }


}