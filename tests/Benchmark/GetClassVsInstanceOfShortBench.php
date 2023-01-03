<?php

namespace Acme\Tests\Benchmark;

use \Acme\Exception\{A, B, C};

/*
	./vendor/bin/phpbench run tests/Benchmark --filter="GetClass" --iterations=3 --revs=10000 --report=aggregate

	method 順序由快到慢 (PHP version 7.3.29)
*/
class GetClassVsInstanceOfShortBench
{
	public function benchInstanceOf()
	{
		$c = new C();

		if ($c instanceof A) {
		} else if ($c instanceof B) {
		} else if ($c instanceof C) {
		}
	}

	public function benchGetClass()
	{
		$c = new C();

		switch (get_class($c)) {
			case A::class:
				break;
			case B::class:
				break;
			case C::class:
				break;
		}
	}

	public function benchGetClassString()
	{
		$c = new C();

		switch (get_class($c)) {
			case 'Acme\Exception\A':
				break;
			case 'Acme\Exception\B':
				break;
			case 'Acme\Exception\C':
				break;
		}
	}
}
