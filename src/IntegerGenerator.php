<?php
namespace MatejKucera\NumberSeriesGenerator;

/**
 * Class IntegerGenerator
 * This class serves as random integer series generator.
 * Use method next() in while cycle to get number sequence
 * @package MatejKucera\NumberSeriesGenerator
 */
class IntegerGenerator extends AbstractGenerator
{

    private $_current;
    private $_tendency;
    private $_tendencyOfTendency;

    /**
     * IntegerGenerator constructor.
     * @param int $rangeFrom        lower boundary
     * @param int $rangeTo          upper boundary
     * @param int $stepFrom         step size lower boundary
     * @param int $stepTo           step size upper boundary
     * @param float $volatility     volatility of the series (how jagged the number series is)
     * @param int $smoothness       smoothness of the series (the bigger, the smoother, use integer values starting at 1)
     */
    public function __construct(int $rangeFrom, int $rangeTo, int $stepFrom, int $stepTo, float $volatility = 1, int $smoothness = 10)
    {
		parent::__construct($rangeFrom, $rangeTo, $stepFrom, $stepTo, $volatility, $smoothness);

		$this->reset();
    }

    public function next() {
        $step = rand($this->getStepFrom(), $this->getStepTo()/2);

        // Twist tendency randomly (makes spikes)
        if(rand(1,$this->getSmoothness())==1) $this->_tendency *= -1;

        // Change tendency
        $this->_tendency = ($this->_tendency + (rand(-10, 10)/10)*$this->getVolatility());

        // Limit the tendency, because it has the tendency to run out of control :-)))
        if($this->_tendency > 2) $this->_tendency = 2;
        if($this->_tendency < -2) $this->_tendency = -2;

        // Tendence the step
        $tendencedStep = round ($step * $this->_tendency);

        $this->_current = $this->_current + $tendencedStep;

        // Check if tendenced step is in the required bounds, if not, limit it and set new bounced tendency
        if($this->_current > $this->getRangeTo()) {
            $this->_current = $this->getRangeTo();
            $this->_tendency = -1;
        }
        if($this->_current < $this->getRangeFrom()) {
            $this->_current = $this->getRangeFrom();
            $this->_tendency = 1;
        }

        return $this->_current;
    }

    public function array($length) {
        $result = [];
        for($i = 0; $i<$length; $i++) {
            $result[] = $this->next();
        }
        return $result;
    }

    private function reset() {
        $this->_current = rand($this->getRangeFrom(), $this->getRangeTo());
        $this->_tendency = 0;
        $this->_tendencyOfTendency;
    }


}