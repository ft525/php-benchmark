<?php

namespace Acme\Tests\Benchmark;

/*
	./vendor/bin/phpbench run tests/Benchmark --filter="GetClass" --iterations=3 --revs=10000 --report=aggregate

	method 順序由快到慢 (PHP version 7.3.29)
*/
class GetClassVsInstanceOfBench
{
	public function benchInstanceOf()
	{
		$c = new \Acme\Exception\C();

		if ($c instanceof \Acme\Exception\A) {
		} else if ($c instanceof \Acme\Exception\B) {
		} else if ($c instanceof \Acme\Exception\C) {
		}
	}

	public function benchGetClassString()
	{
		$c = new \Acme\Exception\C();

		switch (get_class($c)) {
			case 'Acme\Exception\A':
				break;
			case 'Acme\Exception\B':
				break;
			case 'Acme\Exception\C':
				break;
		}
	}

	public function benchGetClass()
	{
		$c = new \Acme\Exception\C();

		switch (get_class($c)) {
			case \Acme\Exception\A::class:
				break;
			case \Acme\Exception\B::class:
				break;
			case \Acme\Exception\C::class:
				break;
		}
	}
}
