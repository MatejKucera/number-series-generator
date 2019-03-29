# Number series generator for PHP

[![Build Status](https://travis-ci.org/MatejKucera/number-series-generator.svg?branch=master)](https://travis-ci.org/MatejKucera/number-series-generator)

## Introduction
Semi-random number series generator for PHP. Intended to use as test data generator, for example for graphs etc.

## Usage

```php

# instantiate generator, only IntegerGenerator available in this moment
/**
 * @param int $rangeFrom        lower boundary
 * @param int $rangeTo          upper boundary
 * @param int $stepFrom         step size lower boundary
 * @param int $stepTo           step size upper boundary
 * @param float $volatility     volatility of the series (how jagged the number series is)
 * @param int $smoothness       smoothness of the series (the bigger, the smoother, use integer values starting at 1)
 */
$generator = new IntegerGenerator(1000, 5000, 1, 50, 1, 10,);

# generate 1000 numbers
for($i = 0; $i<1000; $i++) {
    echo $generator->next() . PHP_EOL;
}

# generate array of 1000 numbers
$array = $generator->array(1000);


```

Example of number serie that can be generated:
![graph](https://i.ibb.co/wMR8ssc/chart.png)